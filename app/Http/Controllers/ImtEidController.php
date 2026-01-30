<?php

namespace App\Http\Controllers;

use App\Models\ImtEid;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\View\Compilers\ComponentTagCompiler;

class ImtEidController extends Controller
{
    public function create()
    {
        $lastNumber = ImtEid::selectRaw(
            "MAX(CAST(SUBSTRING(ctrl_number, -3) AS UNSIGNED)) as max_no"
        )->value('max_no');

        $nextNumber = $lastNumber ? $lastNumber + 1 : 1;

        $previewCtrlNumber = 'IMT_ASEAN_2026_' . str_pad($nextNumber, 3, '0', STR_PAD_LEFT);

        return view('aseanims.imt.create', compact('previewCtrlNumber'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'full_name' => 'required',
            'imt_position' => 'required',
            'office_designation' => 'required',
            'office_agency' => 'required',
            'place_assignment' => 'required',
            'photo' => 'nullable|image|max:12288',
        ]);

        $now = Carbon::now('Asia/Manila');

        $lastCtrl = ImtEid::orderBy('id', 'desc')->first();
        $nextNumber = $lastCtrl
            ? ((int) substr($lastCtrl->ctrl_number, -3)) + 1
            : 1;

        $ctrlNumber = 'IMT_ASEAN_2026_' . str_pad($nextNumber, 3, '0', STR_PAD_LEFT);

        $photoPath = null;
        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->store('imt_ids', 'public');
        }

        ImtEid::create([
            'ph_date' => $now->toDateString(),
            'ph_time' => $now->toTimeString(),
            'ctrl_number' => $ctrlNumber,
            'full_name' => strtoupper($request->full_name),
            'imt_position' => strtoupper($request->imt_position),
            'office_designation' => strtoupper($request->office_designation),
            'office_agency' => strtoupper($request->office_agency),
            'contact_number' => $request->contact_number,
            'place_assignment' => strtoupper($request->place_assignment),
            'photo_path' => $photoPath,
        ]);

        return redirect()
            ->route('imt.index')
            ->with('success', 'IMT ID generated successfully.');
    }

    public function index()
    {
        $records = ImtEid::latest()->get();
        return view('aseanims.imt.generatedimitid', compact('records'));
    }

    public function show($id)
    {
        $record = ImtEid::findOrFail($id);
        return view('aseanims.imt.showid', compact('record'));
    }

    public function destroy($id)
    {
        ImtEid::findOrFail($id)->delete();

        return redirect()
            ->route('imt.index')
            ->with('success', 'Record deleted successfully.');
    }

    public function edit($id)
{
    $record = ImtEid::findOrFail($id);
    return view('aseanims.imt.edit', compact('record'));
}

public function update(Request $request, $id)
{
    $record = ImtEid::findOrFail($id);

    $request->validate([
        'full_name' => 'required',
        'imt_position' => 'required',
        'office_agency' => 'required',
        'place_assignment' => 'required',
        'photo' => 'nullable|image|max:12288',
    ]);

    // Replace photo only if new one is uploaded
    if ($request->hasFile('photo')) {
        $photoPath = $request->file('photo')
                             ->store('imt_ids', 'public');
        $record->photo_path = $photoPath;
    }

    $record->update([
        'full_name' => strtoupper($request->full_name),
        'imt_position' => strtoupper($request->imt_position),
        'office_agency' => strtoupper($request->office_agency),
        'place_assignment' => strtoupper($request->place_assignment),
    ]);

    return redirect()
        ->route('imt.index')
        ->with('success', 'IMT record updated successfully.');
}

public function print()
{
    // ORDER FROM FIRST RECORD → LAST
    $records = ImtEid::orderBy('id', 'asc')->get();

    return view('aseanims.imt.print_imt', compact('records'));
}

public function certificatePdf()
{
    $records = ImtEid::orderBy('full_name', 'asc')->get();

    $pdf = Pdf::loadView('aseanims.imt.certificate_pdf', compact('records'))
        ->setPaper('a4', 'landscape');

    return $pdf->download('IMT_CERTIFICATES.pdf');
}

}
