<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SettingsController extends Controller
{
    public function index()
    {
        return view('settings');
    }

    public function save(Request $req){
        $user = auth()->user();
        $user->update(array('name' => $req->input('name')));
        return redirect()->route('settings');
}
}
