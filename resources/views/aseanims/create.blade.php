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
                    <form action="{{ route('stgepr.store') }}" method="POST" enctype="multipart/form-data">
@csrf

<div class="imt-form">
    {{-- row 1 --}}
    <div class="form-row-one">
        <div class="form-group">
            <label for="ctrl_number">Ctrl Number<small> (Auto-Generated)</small></label>
            <input type="text" style="color: rgb(59, 59, 59); font-weight: bold;" value="{{ $previewCtrlNumber }}" readonly>
        </div>

        <div class="form-group">
            <label for="full_name">Full Name</label>
            <input type="text" name="full_name" placeholder="Full Name" required>
        </div>
    </div>

    {{-- row 2 --}}
    <div class="form-row-one">
        <div class="form-group">
            <label for="stgepr_position">STGEPR Position</label>
            <input type="text" name="stgepr_position" placeholder="STGEPR Position" required>
        </div>

        <div class="form-group">
            <label for="office_designation">Office Designation</label>
            <input type="text" name="office_designation" placeholder="Office Designation" required>
        </div>
    </div>

    {{-- row 3 --}}
    <div class="form-row-one">
        <div class="form-group">
            <label for="office_agency">Office / Agency</label>
            <input type="text" name="office_agency" placeholder="Office / Agency" required>
        </div>

        <div class="form-group">
            <label for="contact_number">Contact Number</label>
            <input type="number" name="contact_number" placeholder="Contact Number">
        </div>
    </div>

    {{-- row 4 --}}
    <div class="form-row-block">
        <div class="form-group">
            <label for="place_assignment">Place of Assignment</label>
            <input type="text" name="place_assignment" placeholder="Place of Assignment" required>
        </div>
    </div>

    {{-- upload / camera --}}
    <div class="upload-take-picture">
        <!-- Hidden file input (logic only) -->
        <input type="file" name="photo" id="photoInput" accept="image/*" hidden>

        <!-- Your existing buttons (CSS untouched) -->
        <button type="button" class="openButton"
            onclick="document.getElementById('photoInput').click();">
            Upload Photo
        </button>

<button type="button" class="openButton" onclick="openCamera()">
    Take A Picture
</button>


        <div id="cameraModal"
     style="display:none; position:fixed; inset:0; background:rgba(0,0,0,.7); z-index:9999; align-items:center; justify-content:center;">

    <div class="modal-overlay">
        <video id="video" autoplay playsinline width="320"></video><br><br>
        <button class="captureButton" type="button" onclick="capturePhoto()">CAPTURE</button>
        <button type="button" onclick="closeCamera()">X</button>
    </div>
</div>

<canvas id="canvas" width="320" height="240" style="display:none;"></canvas>

    </div>

    {{-- submit --}}
    <div class="saveButton">
        <button type="submit">Enroll Data</button>
    </div>
</div>

</form>

                </div>
                {{-- form --}}
            </div>
        </div>
    </body>

    <script src="{{ asset('js/livedate.js') }}"></script>

    <script>
let stream = null;

function openCamera() {
    const modal = document.getElementById('cameraModal');
    const video = document.getElementById('video');

    navigator.mediaDevices.getUserMedia({ video: true })
        .then(s => {
            stream = s;
            video.srcObject = stream;
            modal.style.display = 'flex';
        })
        .catch(err => {
            alert('Camera access denied.');
        });
}

function closeCamera() {
    if (stream) {
        stream.getTracks().forEach(track => track.stop());
    }
    document.getElementById('cameraModal').style.display = 'none';
}

function capturePhoto() {
    const video = document.getElementById('video');
    const canvas = document.getElementById('canvas');
    const ctx = canvas.getContext('2d');

    ctx.drawImage(video, 0, 0, canvas.width, canvas.height);

    canvas.toBlob(blob => {
        const file = new File([blob], 'camera-photo.png', { type: 'image/png' });

        const dataTransfer = new DataTransfer();
        dataTransfer.items.add(file);

        document.getElementById('photoInput').files = dataTransfer.files;

        closeCamera();
        alert('Photo captured successfully.');
    });
}
</script>



    </html>

