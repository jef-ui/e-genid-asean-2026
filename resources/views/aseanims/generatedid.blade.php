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

        <button class="createButton">Create ID</button>

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
          <tbody id="tableBody">
            <tr>
              <td>stgepr_asean_2026_001</td>
              <td>STGEPR</td>
              <td>JUAN DELA CRUZ</td>
              <td>COMMANDER</td>
              <td>OIC, OCD MIMAROPA</td>
              <td>OCD MIMAROPA</td>
              <td>STAGING AREA 1</td>
            </tr>
          </tbody>
        </table>
        </div>
      </div>
    </div>


    </div>
    
</body>
</html>