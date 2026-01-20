<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>e-ID Enrollment</title>
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

        <div class="container-title">
            <p class="ptitle">ENROLLED STGEPR E-IDs</p>
            <div class="phtime">
                <img src="{{asset ('images/phflag.png')}}" alt="flag" class="phflag">
                <span id="phDate"></span>
            </div>
        </div>

    <a href="/asean-2026/dashboard/enrolled-stgepr-e-ids/e-id-enrollment-form"><button class="createButton">Enroll STGEPR e-ID</button></a>

    <div class="main-container">
      <div class="main">
        <div class="table-wrapper">
        <table class="dbtable">
          <thead>
            <tr>
              <th>CTRL NUMBER</th>
              <th>TASK GROUP</th>
              <th>NAME</th>
              <th>POSITION</th>
              <th>DESIGNATION</th>
              <th>OFFICE/AGENCY</th>
              <th>PLACE OF ASSIGNMENT</th>
            </tr>
          </thead>
<tbody>
@foreach($records as $r)
<tr>
    <td>{{ $r->ctrl_number }}</td>
    <td>STGEPR</td>
    <td>{{ $r->full_name }}</td>
    <td>{{ $r->stgepr_position }}</td>
    <td>{{ $r->office_designation }}</td>
    <td>{{ $r->office_agency }}</td>
    <td>{{ $r->place_assignment }}</td>
    <td>
    <a href="{{ route('stgepr.show', $r->id) }}">
        <button>VIEW ID</button>
    </a>
</td>

</tr>
@endforeach
</tbody>
        </table>
        </div>
      </div>
    </div>
    </div>
<script src="{{asset ('js/livedate.js')}}"></script>
</body>
</html>