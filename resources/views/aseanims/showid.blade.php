<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>STGEPR e-ID</title>

<style>
    body {
        margin: 0;
        background: #eee;
        display: flex;
        justify-content: center;
        padding: 20px;
    }

    .id-card {
        width: 500px;
        height: 750px;
        background: url('{{ asset("images/stgepr-template.png") }}') no-repeat center;
        background-size: cover;
        position: relative;
        font-family: Arial, sans-serif;
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
        font-size: 22px;
        font-weight: bold;
        text-transform: uppercase;
    }

    /* POSITION */
    .position {
        position: absolute;
        bottom: 100px;
        width: 100%;
        text-align: center;
        font-size: 16px;
        text-transform: uppercase;
    }

    /* CTRL NUMBER */
    .ctrl {
        position: absolute;
        bottom: 35px;
        width: 100%;
        text-align: center;
        font-size: 14px;
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

</div>

</body>
</html>
