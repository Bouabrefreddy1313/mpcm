<?php

namespace App\Http\Controllers;

use App\Models\Bon;
use Illuminate\Http\Request;

class BonController extends Controller
{
    public function index()
    {
        $bons = Bon::where('statut', 'actif')->get();
        return view('bons.index', compact('bons'));
    }

    public function show(Bon $bon)
    {
        return view('bons.show', compact('bon'));
    }
}