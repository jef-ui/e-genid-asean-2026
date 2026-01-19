<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>e-ID Enrollment Form</title>
    <link rel="stylesheet" href="{{asset('css/dashboard.css')}}">
</head>
<body>
    <div class="dashboard">
        <div class="header">
            <img src="{{asset ('images/stgepr-2.png')}}" alt="logo" class="logo">
            <div class="title">
                <p>SITE TASK GROUP EMERGENCY PREPAREDNESS RESPONSE</p>
            </div>
        </div>

        <div class="container-main">

            <div class="container-title">
                <p class="ptitle">STGEPR E-ID ENROLLMENT FORM</p>
                    <div class="phtime">
                    <img src="{{asset ('images/phflag.png')}}" alt="flag" class="phflag">
                    <span id="phDate"></span>
                    </div>
            </div>

        </div>    
    </div>
</body>
<script src="{{asset('js/livedate.js')}}"></script>
</html>