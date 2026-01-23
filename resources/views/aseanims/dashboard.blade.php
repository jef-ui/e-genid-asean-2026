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
                <a href="{{ route('imt.index') }}"><div class="card" style="grid-area: card-2">
                    
                <img src="{{asset ('icons/users-four.svg')}}" alt="icon" class="icon">

                <div class="cardcontent">
                    <h2 class="h4">{{ $totalImt }}</h2>
                    <p class="content">NO. OF IMT<br/> Members</p>
                </div>

                </div></a>
                {{-- total no. of personnel --}}
                <a href="#"><div class="card" style="grid-area: card-3">
                    
                <img src="{{asset ('icons/users-four.svg')}}" alt="icon" class="icon">

                <div class="cardcontent">
                    <h2 class="h4">{{ $totalAll }}</h2>
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

            
                <div class="card" style="grid-area: card-5">
                            <div class="table-wrapper-log">
                            <h3 style="text-align: center; color: #CE1126; font-weight: bold; font-size:20px">ACTIVITY LOG</h3>
        <table class="dbtable-log">
          <thead>
            <tr>
              <th>DATE</th>
              <th>TIME</th>
              <th>ACTIONS TAKEN</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>01/26/2026</td>
              <td>1000H</td>
              <td>Medical group arrived at Staging Area 1</td>
            </tr>
          </tbody>
          <tbody>
            <tr>
              <td>01/26/2026</td>
              <td>1324H</td>
              <td>IMT arrived at Incident Command Post</td>
            </tr>
          </tbody>
          
        </table>
        </div>
                </div>


                <a href="#"><div class="card" style="grid-area: card-6">
                <img src="{{asset ('icons/weather.png')}}" alt="icon" class="icon">
                <div class="cardcontent">
                    <h2 class="h4" style="font-size:40px">Sunny</h2>
                    <p class="content">Coron, Palawan</p>
                </div>
                </div></a>


                </div>
            </div>
        </div>
    </div>
</body>
<script src="{{asset ('js/livedate.js')}}"></script>
</html>