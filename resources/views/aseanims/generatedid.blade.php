    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>e-ID Enrollment</title>
        <link rel="stylesheet" href="{{asset ('css/dashboard.css')}}">
    </head>
    <body>
        @if(session('success'))
<div id="successModal" class="custom-modal">
    <div class="custom-modal-content">
        <h3>Success</h3>
        <p>{{ session('success') }}</p>
        <button onclick="document.getElementById('successModal').style.display='none'">
            OK
        </button>
    </div>
</div>
@endif

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
        <div class="enroll-id-dashboard">
        <a href="/asean-2026/dashboard/enrolled-stgepr-e-ids/e-id-enrollment-form"><button class="createButton">Enroll STGEPR e-ID</button></a>
        <a href="/asean-2026/dashboard"><button class="createButton"  style="background-color: #CE1126">Dashboard</button></a>
        </div>

        <div class="main-container">
        <div class="main">
            <div class="table-wrapper">
            <table class="dbtable">
            <thead>
                <tr>
                <th>PHOTO</th>
                <th>CTRL NUMBER</th>
                <th>TASK GROUP</th>
                <th>NAME</th>
                <th>POSITION</th>
                {{-- <th>DESIGNATION</th> --}}
                <th>OFFICE/AGENCY</th>
                <th>CONTACT NUMBER</th>
                </tr>
            </thead>
    <tbody>
    @foreach($records as $r)
    <tr>
        <td style="text-align:center;">
    @if($r->photo_path)
        <img src="{{ asset('storage/' . $r->photo_path) }}"
             style="
                width:40px;
                height:40px;
                border-radius:50%;
                object-fit:cover;
                border:1px solid #ccc;
             ">
    @else
        <span style="font-size:10px; color:#999;">N/A</span>
    @endif
</td>

        <td>{{ $r->ctrl_number }}</td>
        <td>STGEPR</td>
        <td>{{ $r->full_name }}</td>
        <td>{{ $r->stgepr_position }}</td>
        {{-- <td>{{ $r->office_designation }}</td> --}}
        <td>{{ $r->office_agency }}</td>
        <td>{{ $r->contact_number }}</td>

        <td><a href="{{ route('stgepr.show', $r->id) }}"><img src="{{asset ('icons/eye-fill.svg')}}" alt="icon" class="td-icon"></a></td>

        <td><button class="icon-btn" onclick="downloadId({{ $r->id }})"><img src="{{ asset('icons/tray-arrow-down-fill.svg') }}" alt="icon" class="td-icon"></button></td>

        <td>
    <a href="{{ route('stgepr.edit', $r->id) }}">
        <img src="{{ asset('icons/pencil-fill.svg') }}" class="td-icon">
    </a>
</td>


        <td><form action="{{ route('stgepr.delete', $r->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this record?');"> @csrf @method('DELETE')<button class="icon-btn" type="submit"><img src="{{asset ('icons/trash-fill.svg')}}" alt="td-icon"></button>
        </form></td>


    </tr>
    @endforeach
    </tbody>
            </table>
            </div>



        </div>

        </div>
                            <button onclick="window.open('{{ route('stgepr.print') }}', '_blank')"
        class="createButton"
        style="background:#0a7cff;">
    Print Masterlist
</button>
        </div>
    <script src="{{asset ('js/livedate.js')}}"></script>
    <div id="hidden-id-container"
     style="position:absolute; left:-9999px; top:-9999px;"></div>
     <script src="https://cdn.jsdelivr.net/npm/html2canvas@1.4.1/dist/html2canvas.min.js"></script>
<script>
function downloadId(id) {

    fetch(`/stgepr/e-id/view/${id}?render=1`)
        .then(response => response.text())
        .then(html => {

            const container = document.getElementById('hidden-id-container');
            container.innerHTML = html;

            const card = container.querySelector('.id-card');

            html2canvas(card, {
                scale: 2,
                useCORS: true,
                backgroundColor: null
            }).then(canvas => {

                const link = document.createElement('a');
                link.download = `STGEPR_${id}.png`;
                link.href = canvas.toDataURL('image/png');
                link.click();

                // cleanup
                container.innerHTML = '';
            });
        });
}
</script>

    </body>
    </html>