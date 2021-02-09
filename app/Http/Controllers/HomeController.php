<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $myavailabilities = auth()->user()->availabilities;
        //$availabilities = \App\Availability::where('user_id', '!=' , auth()->user()->id)->get();
        $availabilities = \App\Availability::all();
        return view('home', compact('myavailabilities'), compact('availabilities'));
    }

    public function add(Request $req)
    {
        $dateconvertie = $req->input('date');
        $temp22 = $dateconvertie;
        $tempd = substr($temp22, 8, 2) . '-' . substr($temp22, 5, 2) . '-' .  substr($temp22, 0, 4);

        $temppp = substr($tempd, 0);
        $temppp = str_replace('-', '/', $temppp);
        auth()->user()->availabilities()->create([
            'date' => $temppp,
            'temps' => $req->input('inlineRadioOptions'),
            'lieu' => $req->input('lieuOptions'),
            'numero' => $req->input('number'),
            'nom' => $req->input('nom'),
            'prenom' => $req->input('prenom'),
        ]);
        return redirect('/');
    }

    public function delete($id){
        \App\Availability::find($id)->delete();
        return redirect()->route('home');
    }
}
