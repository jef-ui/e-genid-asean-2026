<?php

namespace App\Http\Controllers;

use App\Models\StgeprEid;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Barryvdh\DomPDF\Facade\Pdf;


class StgeprEidController extends Controller
{
public function create()
{
    // Get highest existing CTRL number (gap-safe)
    $lastNumber = StgeprEid::selectRaw(
        "MAX(CAST(SUBSTRING(ctrl_number, -3) AS UNSIGNED)) as max_no"
    )->value('max_no');

    $nextNumber = $lastNumber ? $lastNumber + 1 : 1;

    $previewCtrlNumber = 'STGEPR_ASEAN_2026_' . str_pad($nextNumber, 3, '0', STR_PAD_LEFT);

    return view('aseanims.create', compact('previewCtrlNumber'));
}

    public function store(Request $request)
    {
        $request->validate([
            'full_name' => 'required',
            'stgepr_position' => 'required',
            'office_designation' => 'required',
            'office_agency' => 'required',
            'place_assignment' => 'required',
            'photo' => 'nullable|image|max:12288',
        ]);

        $now = Carbon::now('Asia/Manila');

        /**
         * ✅ CORRECT CTRL NUMBER LOGIC
         * - Get highest existing number
         * - If none exists → start at 001
         */
        $lastCtrl = StgeprEid::orderBy('id', 'desc')->first();

        if ($lastCtrl) {
            $lastNumber = (int) substr($lastCtrl->ctrl_number, -3);
            $nextNumber = $lastNumber + 1;
        } else {
            $nextNumber = 1;
        }

        $ctrlNumber = 'STGEPR_ASEAN_2026_' . str_pad($nextNumber, 3, '0', STR_PAD_LEFT);

        $photoPath = null;
        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->store('stgepr_ids', 'public');
        }

        StgeprEid::create([
            'ph_date' => $now->toDateString(),
            'ph_time' => $now->toTimeString(),
            'ctrl_number' => $ctrlNumber,
            'full_name' => strtoupper($request->full_name),
            'stgepr_position' => strtoupper($request->stgepr_position),
            'office_designation' => strtoupper($request->office_designation),
            'office_agency' => strtoupper($request->office_agency),
            'contact_number' => $request->contact_number,
            'place_assignment' => strtoupper($request->place_assignment),
            'photo_path' => $photoPath,
        ]);

return redirect()
    ->route('stgepr.index')
    ->with('success', 'ID generated successfully.');

    }

    public function index()
    {
        $records = StgeprEid::latest()->get();
        return view('aseanims.generatedid', compact('records'));
    }

public function show($id)
{
    $record = StgeprEid::findOrFail($id);
    return view('aseanims.showid', compact('record'));
}

public function destroy($id)
{
    $record = StgeprEid::findOrFail($id);
    $record->delete();

    return redirect()
        ->route('stgepr.index')
        ->with('success', 'Record deleted successfully.');
}

public function edit($id)
{
    $record = StgeprEid::findOrFail($id);
    return view('aseanims.edit', compact('record'));
}

public function update(Request $request, $id)
{
    $record = StgeprEid::findOrFail($id);

    $request->validate([
        'full_name' => 'required',
        'stgepr_position' => 'required',
        'office_agency' => 'required',
        'place_assignment' => 'required',
        'photo' => 'nullable|image|max:12288',
    ]);

    // Replace photo only if new one is uploaded
    if ($request->hasFile('photo')) {
        $photoPath = $request->file('photo')
                             ->store('stgepr_ids', 'public');
        $record->photo_path = $photoPath;
    }

    $record->update([
        'full_name' => strtoupper($request->full_name),
        'stgepr_position' => strtoupper($request->stgepr_position),
        'office_agency' => strtoupper($request->office_agency),
        'place_assignment' => strtoupper($request->place_assignment),
    ]);

    return redirect()
        ->route('stgepr.index')
        ->with('success', 'Record updated successfully.');
}

public function print()
{
    $records = StgeprEid::orderBy('id', 'asc')->get();
    return view('aseanims.print_stgepr', compact('records'));
}

public function certificatePdf()
{
    $records = StgeprEid::orderByRaw(
        "CAST(SUBSTRING(ctrl_number, -3) AS UNSIGNED) ASC"
    )->get();

    $pdf = Pdf::loadView('aseanims.certificate_pdf', compact('records'))
        ->setPaper('a4', 'landscape')
        ->setOption('dpi', 300)
        ->setOption('defaultFont', 'DejaVuSans')
        ->setOption('isRemoteEnabled', true);

    return $pdf->download('STGEPR_CERTIFICATES.pdf');
}



    
}