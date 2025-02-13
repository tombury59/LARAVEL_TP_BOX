<?php

namespace App\Http\Controllers;

use App\Models\ContractTemplate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ModeleContratController extends Controller
{
    public function index()
    {
        try {
            $modeles = ContractTemplate::all();
            return view('modele_contrat.modeles_contrat', compact('modeles'));
        } catch (\Exception $e) {
            Log::error('Error fetching contract templates: ' . $e->getMessage());
            return redirect()->route('dashboard')->with('error', 'Unable to fetch contract templates.');
        }
    }

//    public function create()
//    {
//        return view('modele_contrat.create');
//    }

    public function show($id)
    {
        try {
            $modele = ContractTemplate::findOrFail($id);
            return view('modele_contrat.show', compact('modele'));
        } catch (\Exception $e) {
            Log::error('Error fetching contract template: ' . $e->getMessage());
            return redirect()->route('modele_contrat.modeles_contrat')->with('error', 'Modèle de contrat non trouvé.');
        }
    }

    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required',
            'description' => 'required',
        ]);

        try {

            $contratModele = new ContractTemplate();
            $contratModele->user_id = auth()->id();
            $contratModele->name = $request->nom;
            $contratModele->content = $request->description;
            $contratModele->save();

            return redirect()->route('modele_contrat.modeles_contrat')->with('success', 'Modèle crée avec succés.');
        } catch (\Exception $e) {
            Log::error('Error creating contract template: ' . $e->getMessage());
            return redirect()->route('modele_contrat.create')->with('error', 'Impossibilité de créer le modèle.');
        }
    }

    public function edit($id)
    {
        try {
            $modele = ContractTemplate::findOrFail($id);
            return view('modele_contrat.edit', compact('modele'));
        } catch (\Exception $e) {
            Log::error('Error fetching contract template: ' . $e->getMessage());
            return redirect()->route('modele_contrat.modeles_contrat')->with('error', 'Modèle non-trouvé.');
        }
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nom' => 'required',
            'description' => 'required',
        ]);

        try {
            $modele = ContractTemplate::findOrFail($id);
            $modele->user_id = auth()->id();
            $modele->name = $request->nom;
            $modele->content = $request->description;

            $modele->save();
            return redirect()->route('modele_contrat.modeles_contrat')->with('success', 'Modèle mis-à-jours avec succés.');
        } catch (\Exception $e) {
            Log::error('Error updating contract template: ' . $e->getMessage());
            return redirect()->route('modele_contrat.edit', $id)->with('error', 'Impossibilité de mettre à jour le modèle');
        }
    }

    public function destroy($id)
    {
        try {
            $modele = ContractTemplate::findOrFail($id);
            $modele->delete();
            return redirect()->route('modele_contrat.modeles_contrat')->with('success', 'Modèle supprimé avec succés.');
        } catch (\Exception $e) {
            Log::error('Error deleting contract template: ' . $e->getMessage());
            return redirect()->route('modele_contrat.modeles_contrat')->with('error', 'Impossibilité de supprimer le modèle.');
        }
    }
}
