<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Activity Log</title>

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
    margin-bottom: 4px;
}

.subtitle {
    text-align: center;
    font-size: 10px;
    margin-bottom: 12px;
}

table {
    width: 100%;
    border-collapse: collapse;
}

th, td {
    border: 1px solid #000;
    padding: 5px;
    vertical-align: top;
}

th {
    background: #f0f0f0;
    font-size: 10px;
    text-transform: uppercase;
}

td {
    font-size: 10px;
}

@media print {
    button {
        display: none;
    }
}
</style>
</head>

<body onload="window.print()">

<h2>ACTIVITY LOG</h2>
<div class="subtitle">
    SITE TASK GROUP EMERGENCY PREPAREDNESS RESPONSE<br>
    ASEAN 2026
</div>

<table>
<thead>
<tr>
    <th>#</th>
    <th>Date</th>
    <th>Time</th>
    <th>Activities / Particulars</th>
    <th>Actions Taken</th>
</tr>
</thead>

<tbody>
@foreach($logs as $i => $r)
<tr>
    <td>{{ $i + 1 }}</td>
    <td>{{ \Carbon\Carbon::parse($r->log_date)->format('m/d/Y') }}</td>
    <td>{{ \Carbon\Carbon::parse($r->log_time)->format('Hi') }}H</td>
    <td>{{ $r->action_taken }}</td>
    <td>{{ $r->reported_by }}</td>
</tr>
@endforeach
</tbody>
</table>

</body>
</html>
