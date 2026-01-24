<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>STGEPR Masterlist</title>

<style>
@page {
    size: A4 landscape;
    margin: 15mm;
}

body {
    font-family: Arial, sans-serif;
    font-size: 11px;
    color: #000;
}

h2 {
    text-align: center;
    margin-bottom: 5px;
}

.subtitle {
    text-align: center;
    font-size: 10px;
    margin-bottom: 15px;
}

table {
    width: 100%;
    border-collapse: collapse;
}

th, td {
    border: 1px solid #000;
    padding: 4px;
    text-align: left;
}

th {
    background: #f0f0f0;
    font-size: 10px;
    text-transform: uppercase;
}

.photo {
    width: 30px;
    height: 30px;
    border-radius: 5px;
    object-fit: cover;
}

@media print {
    button {
        display: none;
    }
}
</style>
</head>

<body onload="window.print()">

<h2>ENROLLED STGEPR E-ID MASTERLIST</h2>
<div class="subtitle">
    SITE TASK GROUP EMERGENCY PREPAREDNESS RESPONSE<br>
    ASEAN 2026
</div>

<table>
<thead>
<tr>
    <th>#</th>
    <th>Photo</th>
    <th>Ctrl Number</th>
    <th>Name</th>
    <th>Position</th>
    <th>Office Designation</th>
    <th>Office / Agency</th>
    <th>Contact No.</th>
</tr>
</thead>
<tbody>
@foreach($records as $i => $r)
<tr>
    <td>{{ $i + 1 }}</td>
    <td style="text-align:center">
        @if($r->photo_path)
            <img src="{{ asset('storage/'.$r->photo_path) }}" class="photo">
        @endif
    </td>
    <td>{{ $r->ctrl_number }}</td>
    <td>{{ $r->full_name }}</td>
    <td>{{ $r->stgepr_position }}</td>
    <td>{{ $r->office_designation }}</td>
    <td>{{ $r->office_agency }}</td>
    <td>{{ $r->contact_number }}</td>
</tr>
@endforeach
</tbody>
</table>

</body>
</html>
