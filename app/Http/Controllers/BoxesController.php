<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BoxesController extends Controller
{
    public function index()
    {
        $boxes = auth()->user()->boxes()->paginate(6);
        return view('boxes', ['boxes' => $boxes]);
    }
}
