<?php

namespace App\Support;

use GeoIp2\Database\Reader;
use Illuminate\Http\Request;

/**
 * Déduit des informations sur le visiteur à partir de la requête :
 * localisation approximative (via l'IP, base GeoLite2 locale), appareil, navigateur, système, provenance.
 * Aucune donnée n'est envoyée à un service extérieur.
 */
class InfosVisiteur
{
    /** Emplacement de la base GeoLite2 (téléchargée gratuitement sur maxmind.com) */
    public const FICHIER_GEO = 'app/geoip/GeoLite2-City.mmdb';

    private static ?Reader $lecteur = null;
    private static bool $lecteurIndisponible = false;

    public static function depuis(Request $request): array
    {
        $ua = (string) $request->userAgent();

        return array_merge(
            self::localiser((string) $request->ip()),
            [
                'appareil'   => self::appareil($ua),
                'navigateur' => self::navigateur($ua),
                'systeme'    => self::systeme($ua),
                'source'     => self::source($request),
            ]
        );
    }

    public static function geolocalisationActive(): bool
    {
        return is_file(storage_path(self::FICHIER_GEO));
    }

    private static function localiser(string $ip): array
    {
        $vide = ['pays' => null, 'code_pays' => null, 'region' => null, 'ville' => null];

        if (self::$lecteurIndisponible || ! filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_NO_PRIV_RANGE | FILTER_FLAG_NO_RES_RANGE)) {
            return $vide;
        }

        try {
            if (! self::$lecteur) {
                if (! self::geolocalisationActive()) {
                    self::$lecteurIndisponible = true;
                    return $vide;
                }
                self::$lecteur = new Reader(storage_path(self::FICHIER_GEO), ['fr', 'en']);
            }

            $r = self::$lecteur->city($ip);

            return [
                'pays'      => $r->country->name,
                'code_pays' => $r->country->isoCode,
                'region'    => $r->mostSpecificSubdivision->name,
                'ville'     => $r->city->name,
            ];
        } catch (\Throwable $e) {
            // IP inconnue de la base ou fichier illisible : on enregistre la visite sans localisation
            return $vide;
        }
    }

    private static function appareil(string $ua): string
    {
        if (preg_match('/iPad|Tablet|PlayBook|Silk|(Android(?!.*Mobile))/i', $ua)) {
            return 'Tablette';
        }
        if (preg_match('/Mobi|iPhone|iPod|Android|Windows Phone|Opera Mini/i', $ua)) {
            return 'Mobile';
        }
        return 'Ordinateur';
    }

    private static function navigateur(string $ua): string
    {
        // L'ordre compte : Edge, Opera et Samsung contiennent aussi « Chrome »
        $liste = [
            'Edge'             => '/Edg(e|A|iOS)?\//',
            'Opera'            => '/OPR\/|Opera/',
            'Samsung Internet' => '/SamsungBrowser/',
            'Facebook (appli)' => '/FBAN|FBAV/',
            'Instagram (appli)'=> '/Instagram/',
            'Chrome'           => '/Chrome|CriOS/',
            'Firefox'          => '/Firefox|FxiOS/',
            'Safari'           => '/Safari/',
        ];
        foreach ($liste as $nom => $motif) {
            if (preg_match($motif, $ua)) {
                return $nom;
            }
        }
        return 'Autre';
    }

    private static function systeme(string $ua): string
    {
        $liste = [
            'Android' => '/Android/',
            'iOS'     => '/iPhone|iPad|iPod/',
            'Windows' => '/Windows/',
            'macOS'   => '/Mac OS X|Macintosh/',
            'Linux'   => '/Linux/',
        ];
        foreach ($liste as $nom => $motif) {
            if (preg_match($motif, $ua)) {
                return $nom;
            }
        }
        return 'Autre';
    }

    private static function source(Request $request): string
    {
        // Paramètre utm_source d'un lien de campagne, s'il existe
        if ($utm = $request->query('utm_source')) {
            return mb_substr(ucfirst((string) $utm), 0, 60);
        }

        $hote = strtolower((string) parse_url((string) $request->headers->get('referer'), PHP_URL_HOST));
        if ($hote === '' || $hote === strtolower($request->getHost())) {
            return 'Accès direct';
        }

        $connues = [
            'Google'    => 'google.',
            'Bing'      => 'bing.',
            'Facebook'  => 'facebook.',
            'Instagram' => 'instagram.',
            'LinkedIn'  => 'linkedin.',
            'WhatsApp'  => 'whatsapp.',
            'TikTok'    => 'tiktok.',
            'YouTube'   => 'youtube.',
            'X (Twitter)' => 't.co',
        ];
        foreach ($connues as $nom => $motif) {
            if (str_contains($hote, $motif)) {
                return $nom;
            }
        }
        return mb_substr(preg_replace('/^www\./', '', $hote), 0, 60);
    }
}
