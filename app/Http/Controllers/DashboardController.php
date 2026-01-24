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

public function liveCounts()
{
    $stgepr = StgeprEid::count();
    $imt    = ImtEid::count();

    return response()->json([
        'stgepr'   => $stgepr,
        'imt'      => $imt,
        'totalAll' => $stgepr + $imt,
    ]);
}

}
