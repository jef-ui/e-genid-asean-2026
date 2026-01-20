<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>STGEPR e-ID</title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Google+Sans:ital,opsz,wght@0,17..18,400..700;1,17..18,400..700&family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Montserrat:ital,wght@0,100..900;1,100..900&family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">

<style>
    body {
        margin: 0;
        background: #eee;
        display: flex;
        justify-content: center;
        padding: 20px;
        font-family: 'Montserrat',sans-serif;
    }

    .id-card {
        width: 500px;
        height: 750px;
        background: url('{{ asset("images/stgepr-template.png") }}') no-repeat center;
        background-size: cover;
        position: relative;
        font-family: 'Montserrat', sans-serif;
    }

    /* PHOTO */
    .photo {
        position: absolute;
        top: 400px;      /* adjust later */
        left: 180px;     /* adjust later */
        width: 140px;
        height: 140px;
        object-fit: cover;
        border-radius: 50%;
    }

    /* FULL NAME */
    .full-name {
        position: absolute;
        bottom: 150px;
        width: 100%;
        text-align: center;
        font-size: 28px;
        font-weight: bold;
        text-transform: uppercase;
    }

    /* POSITION */
    .position {
        position: absolute;
        bottom: 95px;
        width: 100%;
        text-align: center;
        font-size: 30px;
        font-weight: bold;
        text-transform: uppercase;
    }

    /* CTRL NUMBER */
    .ctrl {
        position: absolute;
        bottom: 35px;
        width: 100%;
        text-align: center;
        font-size: 20px;
        font-weight: bold;
    }
</style>
</head>

<body>

<div class="id-card">

    {{-- PHOTO --}}
    @if($record->photo_path)
        <img src="{{ asset('storage/' . $record->photo_path) }}" class="photo">
    @endif

    {{-- FULL NAME --}}
    <div class="full-name">
        {{ $record->full_name }}
    </div>

    {{-- POSITION --}}
    <div class="position">
        {{ $record->stgepr_position }}
    </div>

    {{-- CTRL NUMBER --}}
    <div class="ctrl">
        CTRL #: {{ $record->ctrl_number }}
    </div>

    <button id="downloadBtn" style="margin-top:15px;">
    Download PNG
</button>


</div>


</body>


</html>
