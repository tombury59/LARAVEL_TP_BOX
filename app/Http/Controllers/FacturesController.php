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
        return view('factures.show',compact('facture'));
    }

    public function show_create_factures_monthly($reservationId)
    {
        $reservation = Reserverboxes::findOrFail($reservationId);
        return view('factures.show_create_factures_monthly', compact('reservation'));
    }

    public function create_factures_monthly(Request $request,$reservationId)
    {
        $reservation = Reserverboxes::findOrFail($reservationId);
        $contrat = $reservation->contrat->id;

        $facture = new Factures();
        $facture->numero_facture = now()->format('Ymd') . "_".$contrat."_". str_pad(Factures::count() + 1, 4, '0', STR_PAD_LEFT);
        $facture->payement_date = $request->payement_date;
        $facture->montant_facture = $request->montant_facture;
        $facture->periode_facture = $request->periode_facture;
//        $facture->contrat_id = $contrat->id;
        $facture->contrat_id =$contrat;
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
