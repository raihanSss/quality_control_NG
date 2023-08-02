<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;


class LayoutController extends Controller
{
    public function index()
    {
        
        $authuser = Auth::user();
        $userCount = User::count();

        return view('layout.home')->with([
            'userCount' => $userCount,
            'authuser' => $authuser
        ]);
    }
}
