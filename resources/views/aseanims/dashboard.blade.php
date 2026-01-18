<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
                <p>DASHBOARD</p>
            </div>

            <div class="container-grid">

                {{-- no. of stgepr --}}
                <a href="/asean-2026/dashboard/e-id-generated"><div class="card" style="grid-area: card-1">
                    
                <img src="{{asset ('icons/users-three.svg')}}" alt="icon" class="icon">

                <div class="cardcontent">
                    <h2 class="h4">40</h2>
                    <p class="content">NO. OF STGEPR</p>
                </div>

                </div></a>
                {{-- no. of imt --}}
                <a href="#"><div class="card" style="grid-area: card-2">
                    
                <img src="{{asset ('icons/users-four.svg')}}" alt="icon" class="icon">

                <div class="cardcontent">
                    <h2 class="h4">40</h2>
                    <p class="content">NO. OF IMT</p>
                </div>

                </div></a>

    
                <div class="card" style="grid-area: card-3"></div>
                <div class="card" style="grid-area: card-4"></div>
                <div class="card" style="grid-area: card-5"></div>
                <div class="card" style="grid-area: card-6"></div>
            </div>
        </div>
    </div>
</body>
</html>