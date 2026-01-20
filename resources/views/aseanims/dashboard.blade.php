<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="{{asset ('css/dashboard.css')}}">
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
                <p class="ptitle">DASHBOARD</p>
                    <div class="phtime">
                    <img src="{{asset ('images/phflag.png')}}" alt="flag" class="phflag">
                    <span id="phDate"></span>
                    </div>
            </div>

            <div class="container-grid">

                {{-- no. of stgepr --}}
                <a href="/asean-2026/dashboard/enrolled-stgepr-e-ids"><div class="card" style="grid-area: card-1">
                    
                <img src="{{asset ('icons/users-three.svg')}}" alt="icon" class="icon">

                <div class="cardcontent">
                    <h2 class="h4">{{ $totalStgepr }}</h2>
                    <p class="content">NO. OF STGEPR<br/> Members</p>
                </div>

                </div></a>
                {{-- no. of imt --}}
                <a href="#"><div class="card" style="grid-area: card-2">
                    
                <img src="{{asset ('icons/users-four.svg')}}" alt="icon" class="icon">

                <div class="cardcontent">
                    <h2 class="h4">10</h2>
                    <p class="content">NO. OF IMT<br/> Members</p>
                </div>

                </div></a>
                {{-- total no. of personnel --}}
                <a href="#"><div class="card" style="grid-area: card-3">
                    
                <img src="{{asset ('icons/users-four.svg')}}" alt="icon" class="icon">

                <div class="cardcontent">
                    <h2 class="h4">10</h2>
                    <p class="content">Total Members</p>
                </div>

                </div></a>

                {{-- Contact Directories --}}
                <a href="#"><div class="card" style="grid-area: card-4">
                    
                <img src="{{asset ('icons/addressbook.svg')}}" alt="icon" class="icon">

                <div class="cardcontent">
                    <h2 class="h4" style="font-size:40px">Contact</h2>
                    <p class="content">Directories</p>
                </div>

                </div></a>

            
                <div class="card" style="grid-area: card-5"></div>
                <div class="card" style="grid-area: card-6"></div>
            </div>
        </div>
    </div>
</body>
<script src="{{asset ('js/livedate.js')}}"></script>
</html>