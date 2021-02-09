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
        auth()->user()->availabilities()->create([
            'date' => $req->input('date'),
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
