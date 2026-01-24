<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ActivityLog;

class ActivityLogController extends Controller
{
        public function store(Request $request)
    {
        $request->validate([
            'log_date' => 'required|date',
            'log_time' => 'required',
            'action_taken' => 'required',
            'reported_by' => 'required',
            'attachment' => 'nullable|file|max:10240', // 10MB
        ]);

        $filePath = null;

        if ($request->hasFile('attachment')) {
            $filePath = $request->file('attachment')
                                ->store('activity_logs', 'public');
        }

        ActivityLog::create([
            'log_date' => $request->log_date,
            'log_time' => $request->log_time,
            'action_taken' => $request->action_taken,
            'reported_by' => $request->reported_by,
            'attachment' => $filePath,
        ]);

        return redirect()
            ->route('dashboard')
            ->with('success', 'Activity log added successfully.');
    }
}
