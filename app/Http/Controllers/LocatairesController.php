<?php

namespace App\Http\Controllers;

use App\Models\Locataires;
use Illuminate\Http\Request;

class LocatairesController extends Controller
{
    public function index()
    {
        $locataires=Locataires::all();
        return view('locataire.locataires',compact('locataires'));
    }

    public function show($id)
    {
        $locataire=Locataires::find($id);

        return view('locataire.locataire',compact('locataire'));
    }
}
