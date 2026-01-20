<?php


namespace App\Http\Controllers;

use App\Models\StgeprEid;

class DashboardController extends Controller
{
    public function index()
    {
        $totalStgepr = StgeprEid::count();

        return view('aseanims.dashboard', compact('totalStgepr'));
    }
}
