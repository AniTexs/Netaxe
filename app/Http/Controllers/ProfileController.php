<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class ProfileController extends Controller
{
    public function show(Request $request)
    {
        $Countries = Http::get('https://restcountries.com/v3.1/all')->json();

        return view('profile.show', [
            'user' => Auth::user(),
            'countries' => collect($Countries)->sortBy('name')->toArray()
        ]);
    }
}
