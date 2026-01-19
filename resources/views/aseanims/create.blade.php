<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>e-ID Enrollment Form</title>
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
</head>

<body>
    <div class="dashboard">
        <div class="header">
            <img src="{{ asset('images/stgepr-2.png') }}" alt="logo" class="logo">
            <div class="title">
                <p>SITE TASK GROUP EMERGENCY PREPAREDNESS RESPONSE</p>
            </div>
        </div>

        <div class="container-main">
            {{-- CONTAINER TITLE --}}
            <div class="container-title">
                <p class="ptitle">STGEPR E-ID ENROLLMENT FORM</p>
                <div class="phtime">
                    <img src="{{ asset('images/phflag.png') }}" alt="flag" class="phflag">
                    <span id="phDate"></span>
                </div>
            </div>
            {{-- fomr --}}
            <div class="form-container">
                <div class="imt-form">
                    {{-- row 1 --}}
                    <div class="form-row-one">
                        <div class="form-group">
                            <label for="ctrl_number">Ctrl Number</label>
                            <input type="text" placeholder="Ctrl Number">
                        </div>

                        <div class="form-group">
                            <label for="full_name">Full Name</label>
                            <input type="text" placeholder="Full Name">
                        </div>
                    </div>
                    {{-- row 2 --}}
                    <div class="form-row-one">
                        <div class="form-group">
                            <label for="stgepr_position">STGEPR Position</label>
                            <input type="text" placeholder="STGEPR Position">
                        </div>

                        <div class="form-group">
                            <label for="office_designation">Office Designation</label>
                            <input type="text" placeholder="Office Designation">
                        </div>
                    </div>
                </div>
            </div>
            {{-- form --}}
        </div>
    </div>
</body>
<script src="{{ asset('js/livedate.js') }}"></script>

</html>
