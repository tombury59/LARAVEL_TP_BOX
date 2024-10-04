<?php

namespace App\Http\Controllers;

use App\Models\Boxes;
use Illuminate\Http\Request;

class BoxesController extends Controller
{
    public function index()
    {
        $userId = auth()->id();
        $boxes = Boxes::where('proprietaire_id', $userId)->paginate(6);
        return view('boxe.boxes', ['boxes' => $boxes]);
    }

    public function show(Request $request)
    {

        $user = auth()->user();

        $boxe=$user->boxes()->where('box_id',$request->id)->first();

        if(!$boxe)
        {
            session()->flash('error', "Vous n'avez pas accès à cette boxe");

            return redirect()->route('boxes.index');
        }
        // Récupérer la boxe précédente
        $previousBox = $user->boxes()
            ->where('box_id', '<', $boxe->box_id)
            ->orderBy('box_id', 'desc')
            ->first();


        // Récupérer la boxe suivante
        $nextBox = $user->boxes()
            ->where('box_id', '>', $boxe->box_id)
            ->orderBy('box_id', 'asc')
            ->first();

        return view('boxe.boxe', compact('boxe', 'previousBox', 'nextBox'));
    }

    public function view_edit(Request $request)
    {
        $user = auth()->user();
//        dd($user-boxes()->$request->id);


        $boxe = $user->boxes()->where('box_id',$request->id)->first();
        if(!$boxe)
        {
            session()->flash('error', "Vous n'avez pas accès à cette boxe");

            return redirect()->route('boxes.index');
        }
        return view('boxe.boxe-edit', compact('boxe'));
    }

    public function edit(Request $request)
    {
        $user = auth()->user();

        $boxe = $user->boxes()->where('box_id',$request->id)->first();
        if(!$boxe)
        {
            session()->flash('error', "Vous n'avez pas accès à cette boxe");

            return redirect()->route('boxes.index');
        }

        if($boxe)
        {
            $boxe->name = $request->name;
            $boxe->description = $request->description;
            $boxe->address = $request->address;
            $boxe->price = $request->price;
            $boxe->save();
            session()->flash('success', 'Boxe updated successfully.');
        }

        return view('boxe.boxe-edit', compact('boxe'));
    }

    public function destroy(Request $request)
    {
        $user = auth()->user();
        $boxe = $user->boxes()->where('box_id',$request->id)->first();
        session()->flash('success', 'Boxe deleted successfully.');
        $boxe->delete();
        return redirect()->route('boxes.index');
    }

}
