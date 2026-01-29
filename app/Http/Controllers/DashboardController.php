<?php

namespace App\Http\Controllers;

use App\Models\StgeprEid;
use App\Models\ImtEid;
use App\Models\ActivityLog; // ✅ ADD THIS

class DashboardController extends Controller
{
    public function index()
    {
        $totalStgepr = StgeprEid::count();
        $totalImt    = ImtEid::count();
        $totalAll    = $totalStgepr + $totalImt;

        // ✅ FETCH ACTIVITY LOGS (LATEST FIRST)
        $activityLogs = ActivityLog::orderBy('log_date', 'desc')
            ->orderBy('log_time', 'desc')
            ->limit(50) // optional safety limit
            ->get();

        return view('aseanims.dashboard', compact(
            'totalStgepr',
            'totalImt',
            'totalAll',
            'activityLogs' // ✅ PASS TO VIEW
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
public function liveActivityLogs()
{
    return ActivityLog::orderBy('log_date', 'desc')
        ->orderBy('log_time', 'desc')
        ->get()
        ->map(function ($log) {
            return [
                'date' => \Carbon\Carbon::parse($log->log_date)->format('m/d/Y'),
                'time' => \Carbon\Carbon::parse($log->log_time)->format('Hi') . 'H',
                'action' => $log->action_taken,
                'reported_by' => $log->reported_by,
            ];
        });
}


}
