<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\clients;

class ClientController extends Controller
{
    public function index()
    {
        $clients = clients::where('user_id', auth()->user()->id)->get();
        return view('clientsdisplay',compact('clients'));
    }
}
