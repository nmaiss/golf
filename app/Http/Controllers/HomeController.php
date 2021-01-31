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
        $availabilities = \App\Availability::where('user_id', '!=' , auth()->user()->id)->get();
        return view('home', compact('myavailabilities'), compact('availabilities'));
    }

    public function add(Request $req)
    {
        auth()->user()->availabilities()->create([
            'date' => $req->input('date'),
            'temps' => $req->input('inlineRadioOptions'),
            'description' => $req->input('description'),
        ]);
        auth()->user()->update(array('number' => $req->input('numero')));
        return redirect('/');
    }

    public function delete($id){
        \App\Availability::find($id)->delete();
        return redirect()->route('home');
    }
}
