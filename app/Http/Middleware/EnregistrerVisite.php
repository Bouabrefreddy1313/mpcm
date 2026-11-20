<?php

namespace App\Http\Middleware;

use App\Support\InfosVisiteur;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;

/**
 * Enregistre chaque page publique consultée, pour les statistiques de visites du dashboard.
 * Ne compte pas : l'administration, les utilisateurs connectés, les robots, les requêtes AJAX.
 */
class EnregistrerVisite
{
    private const PAGES_EXCLUES = [
        'dashboard', 'dashboard/*', 'admin', 'admin/*', 'commercial', 'commercial/*',
        'login', 'register', 'logout', 'profile', 'profile/*', 'password/*',
        'forgot-password', 'reset-password/*', 'verify-email', 'verify-email/*',
        'confirm-password', '*/create', '*/edit', 'up',
    ];

    private const ROBOTS = '/bot|crawl|spider|slurp|facebookexternalhit|whatsapp|preview|curl|wget|python|headless|lighthouse|monitor/i';

    public function handle(Request $request, Closure $next): Response
    {
        $response = $next($request);

        try {
            if ($this->doitEtreCompte($request, $response)) {
                DB::table('visites')->insert(array_merge([
                    'visiteur'   => hash('sha256', $request->ip() . '|' . $request->userAgent() . '|' . config('app.key')),
                    'page'       => mb_substr('/' . ltrim($request->path(), '/'), 0, 255),
                    'jour'       => now()->toDateString(),
                    'created_at' => now(),
                ], InfosVisiteur::depuis($request)));
            }
        } catch (\Throwable $e) {
            // Le comptage ne doit jamais bloquer l'affichage du site
            report($e);
        }

        return $response;
    }

    private function doitEtreCompte(Request $request, Response $response): bool
    {
        return $request->isMethod('GET')
            && ! $request->ajax()
            && ! $request->expectsJson()
            && $response->getStatusCode() === 200
            && str_contains((string) $response->headers->get('Content-Type'), 'text/html')
            && ! $request->is(...self::PAGES_EXCLUES)
            && ! auth()->check()
            && ! preg_match(self::ROBOTS, (string) $request->userAgent());
    }
}
