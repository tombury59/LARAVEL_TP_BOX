<?php

namespace App\Http\Controllers;

use App\Models\Factures;
use Illuminate\Http\Request;

class ImpotsController extends Controller
{
    public function showCalculations()
    {
        $currentYear = now()->year;
        $revenus = Factures::whereYear('created_at', $currentYear)->sum('montant_facture');

        // Régime micro-foncier
        $microFoncierTotal = $revenus <= 15000 ? $revenus : 0;
        $microFoncierImpose = $microFoncierTotal * 0.70;

        // Régime réel
        $regimeReelTotal = $revenus > 15000 ? $revenus : 0;
        $regimeReelImpose = $regimeReelTotal;

        return view('impots.calcul_regimes', compact('microFoncierTotal', 'microFoncierImpose', 'regimeReelTotal', 'regimeReelImpose'));
    }
}
