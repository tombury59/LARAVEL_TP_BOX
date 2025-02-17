<?php

namespace App\Http\Controllers;

use App\Models\Factures;
use Illuminate\Http\Request;
use Carbon\Carbon;

class ImpotsController extends Controller
{
    public function showCalculations(Request $request)
    {
        // Récupération de l'année sélectionnée (par défaut l'année courante)
        $selectedYear = $request->input('year', now()->year);

        // Récupération des années disponibles pour le filtre
        $availableYears = Factures::selectRaw('YEAR(created_at) as year')
            ->distinct()
            ->orderBy('year', 'desc')
            ->pluck('year');

        // Calcul des revenus par trimestre
        $revenusParTrimestre = Factures::whereYear('created_at', $selectedYear)
            ->selectRaw('QUARTER(created_at) as trimestre, SUM(montant_facture) as total')
            ->groupBy('trimestre')
            ->get()
            ->keyBy('trimestre');

        // Calcul du total annuel
        $revenus = Factures::whereYear('created_at', $selectedYear)
            ->sum('montant_facture');

        // Régime micro-foncier
        $microFoncierEligible = $revenus <= 15000;
        $microFoncierTotal = $microFoncierEligible ? $revenus : 0;
        $microFoncierImpose = $microFoncierTotal * 0.70;
        $microFoncierAbattement = $microFoncierTotal * 0.30;

        // Régime réel
        $regimeReelObligatoire = $revenus > 15000;
        $regimeReelTotal = $regimeReelObligatoire ? $revenus : 0;
        $regimeReelImpose = $regimeReelTotal;

        // Comparaison des régimes (si éligible au micro-foncier)
        $differenceImposition = $microFoncierEligible ?
            $regimeReelImpose - $microFoncierImpose : 0;

        // Moyenne mensuelle
        $moyenneMensuelle = $revenus / 12;

        return view('impots.calcul_regimes', compact(
            'selectedYear',
            'availableYears',
            'revenusParTrimestre',
            'revenus',
            'microFoncierEligible',
            'microFoncierTotal',
            'microFoncierImpose',
            'microFoncierAbattement',
            'regimeReelObligatoire',
            'regimeReelTotal',
            'regimeReelImpose',
            'differenceImposition',
            'moyenneMensuelle'
        ));
    }
}
