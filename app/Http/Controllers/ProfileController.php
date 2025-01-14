<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class ProfileController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $reports = $user->reports; // Fetch reports using the relationship
        return view('profile', compact('user', 'reports'));
    }
}
