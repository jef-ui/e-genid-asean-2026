<?php

namespace App\Http\Controllers;

use App\Models\StgeprEid;
use App\Models\ImtEid;

class DashboardController extends Controller
{
    public function index()
    {
        $totalStgepr = StgeprEid::count();
        $totalImt    = ImtEid::count();
        $totalAll    = $totalStgepr + $totalImt;

        return view('aseanims.dashboard', compact(
            'totalStgepr',
            'totalImt',
            'totalAll'
        ));
    }
}
