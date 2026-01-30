<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<style>
@page {
    size: A4 landscape;
    margin: 0;
}

body {
    margin: 0;
    font-family: DejaVu Sans, sans-serif;
}

.page {
    width: 11.69in;
    height: 8.27in;
    background: url('{{ public_path('images/certificate-template-stgepr.png') }}') no-repeat center;
    background-size: cover;
    position: relative;
}

.page:not(:first-child) {
    page-break-before: always;
}

.name {
    position: absolute;
    top: 3.6in; /* adjust visually */
    width: 100%;
    text-align: center;
    font-size: 40pt; /* PRINT UNITS */
    font-weight: bold;
    text-transform: uppercase;
}
</style>
</head>

<body>
@foreach($records as $r)
    <div class="page">
        <div class="name">{{ $r->full_name }}</div>
    </div>
@endforeach
</body>
</html>
