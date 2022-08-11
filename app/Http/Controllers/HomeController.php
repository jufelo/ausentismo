<?php

namespace App\Http\Controllers;

use App\Models\Cie_10;
use App\Models\Incapacity;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        $users = User::all()->count();
        $incapacities = Incapacity::all()->count();
        $paid_company = Incapacity::sum('paid_company');
        if (strlen(round($paid_company)) > 6) {
            $paid_company = ($paid_company / 1000000) . 'M';
        } else {
            $paid_company = ($paid_company / 1000) . 'K';
        }
        $dx = Incapacity::groupBy('cie_10_id')
            ->select('cie_10_id', DB::raw('count(*) as total'))
            ->get()->max();
        $code_dx = Cie_10::where('id', '=', $dx->cie_10_id)->get();
        return view('index', compact('users', 'incapacities', 'paid_company', 'code_dx'));
    }
}
