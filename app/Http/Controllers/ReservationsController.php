<?php

namespace App\Http\Controllers;

use App\Models\Boxes;
use App\Models\ContractTemplate;
use App\Models\Contrat;
use App\Models\Locataires;
use App\Models\Factures;
use App\Models\Reserverboxes;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ReservationsController extends Controller
{
    public function index()
    {
        $reservations = Reserverboxes::
        where('date_fin', '>=', now())
            ->where('date_debut', '<=', now())
            ->whereHas('boxe', function ($query) {
                $query->where('proprietaire_id', auth()->id());
            })
            ->with('proprietaire') // Eager load the proprietaire relationship
            ->get();

        $locataires=Locataires::all();
        //boxe where status=1
        $boxes = Boxes::where('status', 1)
            ->where('proprietaire_id', auth()->id())
            ->get();

        $userId = auth()->id();
        $modeles = ContractTemplate::where('user_id', $userId)->get();

        return view('reservations.reservations', compact('reservations','locataires','boxes','modeles'));
    }

    public function destroy($id)
    {
        $reservation = Reserverboxes::findOrFail($id);
        $boxe=Boxes::findOrFail($reservation->box_id);
        $boxe->status=1;
        $boxe->save();
        $reservation->delete();
        return redirect()->route('reservations.reservations');
    }

    public function store(Request $request)
    {
        $user = auth()->user();
        $reservation = new Reserverboxes();
        $reservation->box_id = $request->box_id;
        $reservation->locataire_id = $request->locataire_id;
        $reservation->date_debut = $request->date_debut;
        $reservation->date_fin = $request->date_fin;
        $reservation->save();

        $updateStatusBoxe = Boxes::findOrFail($request->box_id);
        $updateStatusBoxe->status = 0;
        $updateStatusBoxe->save();


        $lastInsertedId = $reservation->id;
        $contrat = new Contrat();
        $contrat->reservation_id = $lastInsertedId;
        $contrat->modele = $request->modele_id;
        $contrat->contenu = $request->contract_content; // Ensure this is not null
        $contrat->prixParMois = $request->price;
        $contrat->save();

        $dateDebut = Carbon::parse($request->date_debut);
        $dateFin = Carbon::parse($request->date_fin);
        $nbMois = $dateDebut->diffInMonths($dateFin);

//        $facture = new Factures();
//        $facture->numero_facture = 'F'.str_pad(Factures::count() + 1, 4, '0', STR_PAD_LEFT);
//        $facture->payement_date = $request->date_debut;
//        $facture->montant_facture = round($request->price*$nbMois,2);
//        $facture->periode_facture = $nbMois;
//        $facture->contrat_id = $contrat->id;
//        $facture->save();


        session()->flash('success', 'La réservation bien été ajoutée.');
        return redirect()->route('reservations.reservations');
    }

}
