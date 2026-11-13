<?php

namespace App\Http\Controllers\Commercial;

use App\Http\Controllers\Controller;
use App\Models\FormationClient;
use App\Models\Commande;
use App\Models\UtilisationBon;
use App\Models\DemandeDevis;
use App\Models\Formateur;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CommercialDashboardController extends Controller
{
    /**
     * Display the commercial dashboard.
     */
    public function index(): View
    {
        $stats = [
            'commandes_formations' => FormationClient::count(),
            'commandes_bons' => Commande::count(),
            'bons_actifs' => UtilisationBon::count(),
            'demandes_cours' => DemandeDevis::count(),
            'formateurs' => Formateur::count(),
        ];

        return view('commercial.dashboard', compact('stats'));
    }
}
