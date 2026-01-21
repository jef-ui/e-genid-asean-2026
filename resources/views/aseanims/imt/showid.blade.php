<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>IMT e-ID</title>

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">

<style>
body {
    margin: 0;
    background: #eee;
    display: flex;
    justify-content: center;
    padding: 20px;
    font-family: 'Montserrat', sans-serif;
}

.id-card {
    width: 500px;
    height: 750px;
    background: url('{{ asset("images/imt-template.png") }}') no-repeat center;
    background-size: cover;
    position: relative;
}

/* PHOTO */
.photo {
    position: absolute;
    top: 397px;
    left: 177px;
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

    @if($record->photo_path)
        <img src="{{ asset('storage/' . $record->photo_path) }}" class="photo">
    @endif

    <div class="full-name">
        {{ $record->full_name }}
    </div>

    <div class="position">
        {{ $record->imt_position ?? $record->stgepr_position }}
    </div>

    <div class="ctrl">
        IMT CTRL #: {{ $record->ctrl_number }}
    </div>

</div>

</body>
</html>
