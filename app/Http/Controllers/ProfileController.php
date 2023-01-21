<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class ProfileController extends Controller
{
    public function addArt()
    {
        if(Auth::check()){
            return view('add-art');
        }
  
        return redirect("login")->withSuccess('You are not allowed to access');
    }
}
