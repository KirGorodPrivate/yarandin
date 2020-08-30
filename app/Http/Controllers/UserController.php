<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function show($id)
    {
        $user = \App\User::find($id);
        return view('user.show')->with('user', $user);
    }
}
