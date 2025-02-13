<?php

namespace App\Http\Controllers;

use App\Models\ContractTemplate;
use Illuminate\Http\Request;

class ModeleContratController extends Controller
{
    public function index()
    {
        $modeles = ContractTemplate::all();
        return view('modele_contrat.modeles_contrat', compact('modeles'));
    }


}
