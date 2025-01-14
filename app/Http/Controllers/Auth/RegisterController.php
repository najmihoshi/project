<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Laravel\Fortify\Contracts\CreatesNewUsers;

class RegisterController extends Controller implements CreatesNewUsers
{
    public function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'username' => $data['username'],
            'matric_no' => $data['matric_no'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }
}
