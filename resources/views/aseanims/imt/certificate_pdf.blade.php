<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Generated Certificate of Completion</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Google+Sans:ital,opsz,wght@0,17..18,400..700;1,17..18,400..700&family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Montserrat:ital,wght@0,100..900;1,100..900&family=Roboto:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">

    <style>
        @page {
            size: A4 landscape;
            margin: 0;
        }

        body {
            margin: 0;
            font-family: 'Montserrat', sans-serif;
        }

        .page {
            width: 1123px;
            height: 794px;
            background: url('{{ public_path('images/certificate-template-imt.png') }}') no-repeat center;
            background-size: cover;
            position: relative;
        }

        /* break pages ONLY between certificates */
        .page:not(:first-child) {
            page-break-before: always;
        }


        .name {
            position: absolute;
            top: 380px;
            width: 100%;
            text-align: center;
            font-size: 40px;
            font-weight: bold;
            text-transform: uppercase;
        }
    </style>

</head>

<body>

@foreach($records as $r)
    <div class="page">
        <div class="name">
            {{ $r->full_name }}
        </div>
    </div>
@endforeach


</body>

</html>
