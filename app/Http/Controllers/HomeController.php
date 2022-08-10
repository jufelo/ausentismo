<?php

namespace App\Http\Controllers;

use App\Models\Incapacity;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $users = User::all()->count();
        $incapacities = Incapacity::all()->count();
        return view('index', compact('users', 'incapacities'));
    }
}
