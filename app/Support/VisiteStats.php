<?php

namespace App\Support;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

/**
 * Statistiques de visites pour le dashboard.
 * « visiteurs » = visiteurs uniques, « pages » = pages vues.
 */
class VisiteStats
{
    public static function pourDashboard(): array
    {
        $aujourdhui = Carbon::today();

        return [
            'resume' => [
                'jour'    => self::compter($aujourdhui, $aujourdhui),
                'semaine' => self::compter($aujourdhui->copy()->startOfWeek(), $aujourdhui),
                'mois'    => self::compter($aujourdhui->copy()->startOfMonth(), $aujourdhui),
            ],
            'series' => [
                'jour'    => self::parJour($aujourdhui, 30),
                'semaine' => self::parSemaine($aujourdhui, 12),
                'mois'    => self::parMois($aujourdhui, 12),
            ],
        ];
    }

    private static function compter(Carbon $debut, Carbon $fin): array
    {
        $r = DB::table('visites')
            ->whereBetween('jour', [$debut->toDateString(), $fin->toDateString()])
            ->selectRaw('COUNT(DISTINCT visiteur) AS visiteurs, COUNT(*) AS pages')
            ->first();

        return ['visiteurs' => (int) $r->visiteurs, 'pages' => (int) $r->pages];
    }

    private static function parJour(Carbon $aujourdhui, int $nb): array
    {
        $debut = $aujourdhui->copy()->subDays($nb - 1);
        $lignes = DB::table('visites')
            ->where('jour', '>=', $debut->toDateString())
            ->groupBy('jour')
            ->selectRaw('jour AS cle, COUNT(DISTINCT visiteur) AS visiteurs, COUNT(*) AS pages')
            ->get()->keyBy('cle');

        $serie = [];
        for ($d = $debut->copy(); $d->lte($aujourdhui); $d->addDay()) {
            $l = $lignes->get($d->toDateString());
            $serie[] = self::point($d->format('d/m'), ucfirst($d->copy()->locale('fr')->isoFormat('dddd D MMMM')), $l);
        }
        return $serie;
    }

    private static function parSemaine(Carbon $aujourdhui, int $nb): array
    {
        $debut = $aujourdhui->copy()->startOfWeek()->subWeeks($nb - 1);
        $lignes = DB::table('visites')
            ->where('jour', '>=', $debut->toDateString())
            ->groupByRaw('YEARWEEK(jour, 3)')
            ->selectRaw('YEARWEEK(jour, 3) AS cle, COUNT(DISTINCT visiteur) AS visiteurs, COUNT(*) AS pages')
            ->get()->keyBy('cle');

        $serie = [];
        for ($s = $debut->copy(); $s->lte($aujourdhui); $s->addWeek()) {
            $cle = $s->isoWeekYear . str_pad($s->isoWeek, 2, '0', STR_PAD_LEFT);
            $fin = $s->copy()->endOfWeek();
            $serie[] = self::point('S' . $s->isoWeek, 'Semaine du ' . $s->format('d/m') . ' au ' . $fin->format('d/m/Y'), $lignes->get($cle));
        }
        return $serie;
    }

    private static function parMois(Carbon $aujourdhui, int $nb): array
    {
        $debut = $aujourdhui->copy()->startOfMonth()->subMonths($nb - 1);
        $lignes = DB::table('visites')
            ->where('jour', '>=', $debut->toDateString())
            ->groupByRaw("DATE_FORMAT(jour, '%Y-%m')")
            ->selectRaw("DATE_FORMAT(jour, '%Y-%m') AS cle, COUNT(DISTINCT visiteur) AS visiteurs, COUNT(*) AS pages")
            ->get()->keyBy('cle');

        $serie = [];
        for ($m = $debut->copy(); $m->lte($aujourdhui); $m->addMonth()) {
            $fr = $m->copy()->locale('fr');
            $serie[] = self::point(ucfirst($fr->isoFormat('MMM')), ucfirst($fr->isoFormat('MMMM YYYY')), $lignes->get($m->format('Y-m')));
        }
        return $serie;
    }

    private static function point(string $label, string $detail, $ligne): array
    {
        return [
            'label'     => $label,
            'detail'    => $detail,
            'visiteurs' => (int) ($ligne->visiteurs ?? 0),
            'pages'     => (int) ($ligne->pages ?? 0),
        ];
    }
}
