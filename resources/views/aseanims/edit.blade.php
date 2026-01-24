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
                   <form action="{{ route('stgepr.update', $record->id) }}"
      method="POST"
      enctype="multipart/form-data">
    @csrf
    @method('PUT')

    {{-- CTRL NUMBER --}}
    <div class="form-group">
        <label>Ctrl Number</label>
        <input type="text"
               value="{{ $record->ctrl_number }}"
               readonly
               style="font-weight:bold;">
    </div>

    {{-- FULL NAME --}}
    <div class="form-group">
        <label>Full Name</label>
        <input type="text"
               name="full_name"
               value="{{ $record->full_name }}"
               required>
    </div>

    {{-- POSITION --}}
    <div class="form-group">
        <label>STGEPR Position</label>
        <input type="text"
               name="stgepr_position"
               value="{{ $record->stgepr_position }}"
               required>
    </div>

    {{-- OFFICE --}}
    <div class="form-group">
        <label>Office / Agency</label>
        <input type="text"
               name="office_agency"
               value="{{ $record->office_agency }}"
               required>
    </div>

    {{-- PLACE --}}
    <div class="form-group">
        <label>Place of Assignment</label>
        <input type="text"
               name="place_assignment"
               value="{{ $record->place_assignment }}"
               required>
    </div>

    {{-- PHOTO PREVIEW --}}
    <div style="margin-top:10px;">
        <label>Current Photo</label><br>

        @if($record->photo_path)
            <img src="{{ asset('storage/'.$record->photo_path) }}"
                 style="width:140px;height:140px;
                        border-radius:50%;
                        object-fit:cover;
                        border:2px solid #ccc;">
        @else
            <p>No photo</p>
        @endif
    </div>

    {{-- CHANGE PHOTO --}}
    <input type="file"
           name="photo"
           accept="image/*"
           onchange="previewPhoto(this)">

    <img id="photoPreview"
         style="display:none;
                width:140px;
                height:140px;
                border-radius:50%;
                margin-top:10px;">

    <button type="submit" class="createButton">
        Update Record
    </button>
</form>


                </div>
                {{-- form --}}
            </div>

        </div>
        <!-- CAMERA MODAL -->
        <div id="cameraModal"
    style="display:none;
    position:fixed;
    inset:0;
    background:rgba(0,0,0,.7);
    z-index:9999;
    align-items:center;
    justify-content:center;">

    <div class="modal-overlay">

        <!-- Camera selector -->
        <select id="cameraSelect"
            style="margin-bottom:10px; padding:6px; width:100%;">
        </select>

        <video id="video" autoplay playsinline width="320"></video>

        <div style="margin-top:15px; display:flex; gap:10px; justify-content:center;">
            <button class="captureButton" type="button" onclick="capturePhoto()">
                CAPTURE
            </button>

            <button type="button" onclick="closeCamera()">X</button>
        </div>
    </div>
</div>


    </body>

    <script src="{{ asset('js/livedate.js') }}"></script>

 <script>
let stream = null;
let currentDeviceId = null;

async function loadCameras() {
    const devices = await navigator.mediaDevices.enumerateDevices();
    const cameras = devices.filter(d => d.kind === 'videoinput');
    const select = document.getElementById('cameraSelect');

    select.innerHTML = '';

    cameras.forEach((cam, index) => {
        const option = document.createElement('option');
        option.value = cam.deviceId;
        option.text = cam.label || `Camera ${index + 1}`;
        select.appendChild(option);
    });

    // Auto-select last camera (usually external)
    if (cameras.length > 0) {
        currentDeviceId = cameras[cameras.length - 1].deviceId;
        select.value = currentDeviceId;
    }
}

async function startCamera(deviceId) {
    if (stream) {
        stream.getTracks().forEach(track => track.stop());
    }

    stream = await navigator.mediaDevices.getUserMedia({
        video: {
            deviceId: { exact: deviceId },
            width: { ideal: 1280 },
            height: { ideal: 720 }
        }
    });

    document.getElementById('video').srcObject = stream;
}

async function openCamera() {
    const modal = document.getElementById('cameraModal');
    modal.style.display = 'flex';

    // First permission request (needed to get labels)
    await navigator.mediaDevices.getUserMedia({ video: true });

    await loadCameras();
    if (currentDeviceId) {
        await startCamera(currentDeviceId);
    }
}

document.getElementById('cameraSelect').addEventListener('change', async function () {
    currentDeviceId = this.value;
    await startCamera(currentDeviceId);
});

function closeCamera() {
    if (stream) {
        stream.getTracks().forEach(track => track.stop());
        stream = null;
    }
    document.getElementById('cameraModal').style.display = 'none';
}

function capturePhoto() {
    const video = document.getElementById('video');
    const canvas = document.getElementById('canvas');
    const ctx = canvas.getContext('2d');

    canvas.width = video.videoWidth;
    canvas.height = video.videoHeight;

    ctx.drawImage(video, 0, 0);

    canvas.toBlob(blob => {
        const file = new File([blob], 'camera-photo.png', { type: 'image/png' });
        const dataTransfer = new DataTransfer();
        dataTransfer.items.add(file);

        document.getElementById('photoInput').files = dataTransfer.files;
        previewPhoto(document.getElementById('photoInput'));
        closeCamera();
    });
}
</script>


    <script>
        function previewPhoto(input) {
            const preview = document.getElementById('photoPreview');
            const loader = document.getElementById('photoLoading');

            // ✅ If no file, do nothing
            if (!input.files || !input.files[0]) {
                loader.style.display = 'none';
                preview.style.display = 'none';
                return;
            }

            // show loader ONLY when file exists
            preview.style.display = 'none';
            loader.style.display = 'flex';

            const reader = new FileReader();
            reader.onload = e => {
                setTimeout(() => {
                    preview.src = e.target.result;
                    preview.style.display = 'block';
                    loader.style.display = 'none';
                }, 500);
            };

            reader.readAsDataURL(input.files[0]);
        }
    </script>


    <!-- CONFIRM ENROLL MODAL -->
    <div id="confirmModal" class="custom-modal" style="display:none;">
        <div class="custom-modal-content">
            <h3>Confirm Enrollment</h3>
            <p>
                Are you sure you want to enroll this record?<br>
                Please make sure all details and the photo are correct.
            </p>

            <div class="modal-actions">
                <button onclick="submitEnrollment()">Yes, Enroll</button>
                <button onclick="closeConfirmModal()">Cancel</button>
            </div>
        </div>
    </div>

    <script>
        function openConfirmModal() {

            const form = document.querySelector('form');
            const photoInput = document.getElementById('photoInput');

            // 1️⃣ Check normal required fields
            if (!form.checkValidity()) {
                form.reportValidity(); // shows native hints
                return;
            }

            // 2️⃣ Check photo manually
            if (!photoInput.files || photoInput.files.length === 0) {
                alert('Please upload or take a photo before enrolling.');
                return;
            }

            // 3️⃣ Everything valid → show modal
            document.getElementById('confirmModal').style.display = 'flex';
        }
    </script>

    <script>
        function submitEnrollment() {
            document.getElementById('confirmModal').style.display = 'none';
            document.querySelector('form').submit();
        }
    </script>

    <script>
        document.querySelectorAll('.imt-form input[type="text"]').forEach(input => {
            input.addEventListener('input', function() {
                this.value = this.value.toUpperCase();
            });
        });
    </script>







    </html>
