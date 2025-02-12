<?php

namespace App\Http\Controllers;

use App\Models\Locataires;
use App\Models\Typepayement;
use Illuminate\Http\Request;

class LocatairesController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $locataires = Locataires::query()
            ->where('nom', 'LIKE', "%{$search}%")
            ->orWhere('prenom', 'LIKE', "%{$search}%")
            ->paginate(10);

        return view('locataire.locataires', compact('locataires', 'search'));
    }

    public function create()
    {
        $typepayements=Typepayement::all();
        return view('locataire.create',compact('typepayements'));
    }

    public function show($id)
    {
        $locataire=Locataires::find($id);
        $boxeslocataires=$locataire->boxes()->get();
        $reservations=$locataire->reservation()->get();

        return view('locataire.locataire',compact('locataire','boxeslocataires','reservations'));
    }



    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required',
            'prenom' => 'required',
            'email' => 'required|email',
            'telephone' => 'required',
            'adresse' => 'required',
            'ville' => 'required',
            'code_postal' => 'required',
            'pays' => 'required',
            'type_paiement' => 'required',
        ]);

        try {
            $locataire = new Locataires();
            $locataire->nom = $request->nom;
            $locataire->prenom = $request->prenom;
            $locataire->email = $request->email;
            $locataire->telephone = $request->telephone;
            $locataire->adresse = $request->adresse;
            $locataire->ville = $request->ville;
            $locataire->code_postal = $request->code_postal;
            $locataire->pays = $request->pays;
            $locataire->payement = $request->type_paiement;
            $locataire->save();

            return redirect()->route('locataires.index')->with('success', 'Locataire ajouté avec succès.');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => 'Une erreur est survenue lors de l\'ajout du locataire. Veuillez réessayer.']);
        }
    }

    public function destroy($id)
    {
        $locataire=Locataires::find($id);
        $locataire->delete();
        return redirect()->route('locataires.index')->with('success', 'Locataire supprimé avec succès.');
    }

    public function edit($id)
    {
        $locataire=Locataires::find($id);
        $typepayements=Typepayement::all();
        return view('locataire.edit',compact('locataire','typepayements'));
    }


    public function update(Request $request,$id)
    {
        $request->validate([
            'nom' => 'required',
            'prenom' => 'required',
            'email' => 'required|email',
            'telephone' => 'required',
            'adresse' => 'required',
            'ville' => 'required',
            'code_postal' => 'required',
            'pays' => 'required',
            'type_paiement' => 'required',
        ]);

        try {
            $locataire = Locataires::find($id);
            $locataire->nom = $request->nom;
            $locataire->prenom = $request->prenom;
            $locataire->email = $request->email;
            $locataire->telephone = $request->telephone;
            $locataire->adresse = $request->adresse;
            $locataire->ville = $request->ville;
            $locataire->code_postal = $request->code_postal;
            $locataire->pays = $request->pays;
            $locataire->payement = $request->type_paiement;
            $locataire->save();

            return redirect()->route('locataires.index')->with('success', 'Locataire modifié avec succès.');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => 'Une erreur est survenue lors de la modification du locataire. Veuillez réessayer.']);
        }
    }



}
