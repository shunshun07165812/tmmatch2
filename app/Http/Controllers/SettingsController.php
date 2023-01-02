<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SettingsController extends Controller
{
    public function index()
{
    $user = Auth::user();
    return view('settings', compact('user')); 
}
}
