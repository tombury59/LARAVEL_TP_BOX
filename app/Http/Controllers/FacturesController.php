<?php

namespace App\Http\Controllers;

use App\Helpers\DateHelper;
use App\Models\Contrat;
use App\Models\Factures;
use App\Models\Locataires;
use App\Models\Reserverboxes;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class FacturesController extends Controller
{
    public function index(Request $request)
    {
        $users = Locataires::all();
        $factures = Factures::query();

        if ($request->has('user') && $request->user != '') {
            $factures->whereHas('contrat.reservation.locataire', function ($query) use ($request) {
                $query->where('id', $request->user);
            });
        }

        $factures = $factures->get()->map(function ($facture) {
//            dd($facture->contrat->reservation->date_debut);
            $facture->period = DateHelper::getPeriod($facture->contrat->reservation->date_debut, $facture->periode_facture);
            return $facture;
        });

        return view('factures.factures', compact('factures', 'users'));
    }

    public function show($id)
    {
        $facture = Factures::findOrFail($id);
        $facture->period = DateHelper::getPeriod($facture->contrat->reservation->date_debut, $facture->periode_facture);
        return view('factures.show', compact('facture'));
    }

    public function show_create_factures_monthly($reservationId)
    {
        $reservation = Reserverboxes::with('contrat.factures')->findOrFail($reservationId);
        $lastFacture = $reservation->contrat->factures->last();
        $nextPeriod = $lastFacture ? $lastFacture->periode_facture + 1 : 1;

        return view('factures.show_create_factures_monthly', compact('reservation', 'nextPeriod'));
    }
    public function create_factures_monthly(Request $request, $reservationId)
    {
        $reservation = Reserverboxes::findOrFail($reservationId);
        $contrat = $reservation->contrat->id;

        // Get the current month and year
        $currentMonth = now()->month;
        $currentYear = now()->year;

        // Check if an invoice already exists for the current month and year
        $existingInvoice = Factures::where('contrat_id', $contrat)
            ->whereMonth('created_at', $currentMonth)
            ->whereYear('created_at', $currentYear)
            ->first();

        if ($existingInvoice) {
            return redirect()->back()->with('error', 'Une facture pour ce mois a déjà été générée.');
        }

        $facture = new Factures();
        $facture->numero_facture = now()->format('Ymd') . "_".$contrat."_". str_pad(Factures::count() + 1, 4, '0', STR_PAD_LEFT);
        $facture->payement_date = $request->payement_date;
        $facture->montant_facture = $request->montant_facture;
        $facture->periode_facture = $request->period;
        $facture->contrat_id = $contrat;
        $facture->save();

        return redirect()->route('factures.index')->with('success', 'Facture créée avec succès.');
    }

    function getPeriod($date_debut, $period)
    {
        $date = Carbon::createFromFormat('d/m/Y', $date_debut);
        $date->addMonths($period - 1);
        return $date->format('F Y');
    }

}
