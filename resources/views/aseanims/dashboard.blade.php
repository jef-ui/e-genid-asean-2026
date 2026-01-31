<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
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

            <div class="container-title">
                <p class="ptitle">DASHBOARD</p>
                <div class="phtime">
                    <img src="{{ asset('images/phflag.png') }}" alt="flag" class="phflag">
                    <span id="phDate"></span>
                </div>
            </div>

            <div class="container-grid">

                {{-- no. of stgepr --}}
                <a href="/asean-2026/dashboard/enrolled-stgepr-e-ids">
                    <div class="card" style="grid-area: card-1">

                        <img src="{{ asset('icons/users-three.svg') }}" alt="icon" class="icon">

                        <div class="cardcontent">
                            <h2 class="h4" id="totalStgepr">{{ $totalStgepr }}</h2>
                            <p class="content">NO. OF STGEPR<br /> Members</p>
                        </div>

                    </div>
                </a>
                {{-- no. of imt --}}
                <a href="{{ route('imt.index') }}">
                    <div class="card" style="grid-area: card-2">

                        <img src="{{ asset('icons/users-four.svg') }}" alt="icon" class="icon">

                        <div class="cardcontent">
                            <h2 class="h4" id="totalImt">{{ $totalImt }}</h2>
                            <p class="content">NO. OF IMT<br /> Members</p>
                        </div>

                    </div>
                </a>
                {{-- total no. of personnel --}}
                <a href="#">
                    <div class="card" style="grid-area: card-3">

                        <img src="{{ asset('icons/users-four.svg') }}" alt="icon" class="icon">

                        <div class="cardcontent">
                            <h2 class="h4" id="totalAll">{{ $totalAll }}</h2>
                            <p class="content">Total Members</p>
                        </div>

                    </div>
                </a>

                {{-- Contact Directories --}}
                <a href="#">
                    <div class="card" style="grid-area: card-4">
<div class="cardcontent">

    <h2 class="h4" style="font-size:20px; margin-bottom: 12px;">
        Event Information
    </h2>

    <p class="content"
        style="font-weight: 400; font-size: 13px; margin-bottom: 6px; text-align: left;">
        <b>Venue:</b> Tag Resort, Coron Palawan
    </p>

    <p class="content"
        style="font-weight: 400; font-size: 13px; margin-bottom: 6px; text-align: left;">
        <b>Total Number of Delegates:</b> 103
    </p>

    <p class="content alert-move">
        <b>VIP Delegates Remaining:</b>
        <span class="arrived-count" style="font-size:20px">69</span>
    </p>

    <p class="content alert-move">
        <b>Delegates Successfully Departed:</b>
        <span class="departing-count" style="font-size:20px">34</span>
    </p>

    <p class="content alert-move">
        <b>Status:</b>
        <span class="status-ongoing">DEPARTURE PHASE</span>
    </p>

</div>


                    </div>
                </a>


                <div class="card" style="grid-area: card-5">
                    <div class="table-wrapper-log">
                        <a href="{{ route('activitylog.print') }}" target="_blank">

                            <button class="addLogButton" style="background:#555;">
                                <img src="{{ asset('icons/printer.svg') }}" alt="icon">
                            </button>
                        </a>

                        <button class="addLogButton" onclick="openAddLogModal()">
                            <img src="{{ asset('icons/stack-plus-fill.svg') }}" alt="icon"> <b
                                style="font-size: 20px; margin-left:20px">ACTIVITY LOG</b>
                        </button>


                        <table class="dbtable-log">
                            <thead>
                                <tr>

                                    <th>DATE</th>
                                    <th>TIME</th>
                                    <th>ACTIVITIES/PARTICULARS</th>
                                    <th>ACTIONS TAKEN</th>
                                </tr>
                            </thead>
                            <tbody id="activityLogBody">
                                @foreach ($activityLogs as $index => $r)
                                    <tr class="{{ $index === 0 ? 'blink-warning' : '' }}">
                                        <td>{{ \Carbon\Carbon::parse($r->log_date)->format('m/d/Y') }}</td>
                                        <td>{{ \Carbon\Carbon::parse($r->log_time)->format('Hi') }}H</td>
                                        <td class="log-text">{{ $r->action_taken }}</td>
                                        <td>{{ $r->reported_by }}</td>
                                    </tr>
                                @endforeach
                            </tbody>


                        </table>
                    </div>
                </div>


                <a href="#">
                    <div class="card" style="grid-area: card-6">
                        <img src="{{ asset('icons/weather.png') }}" alt="icon" class="icon">
                        <div class="cardcontent">
                            <h2 class="h4" style="font-size:40px">Sunny</h2>
                            <p class="content">Coron, Palawan</p>
                        </div>
                    </div>
                </a>


            </div>
        </div>
    </div>
    </div>
    {{-- ADD LOG MODAL --}}
    <div id="addLogModal" class="custom-modal" style="display:none;">
        <div class="custom-modal-content modal-log">

            <div class="modal-header">
                <h3>Add Activity Log</h3>
                <button type="button" class="modal-close"
                    onclick="document.getElementById('addLogModal').style.display='none'">
                    ×
                </button>
            </div>

            <form action="{{ route('activitylog.store') }}" method="POST" enctype="multipart/form-data"
                class="modal-form">
                @csrf

                <div class="form-row">
                    <div class="form-group">
                        <label>Date</label>
                        <input type="date" id="logDate" name="log_date" value="{{ now()->toDateString() }}"
                            required>
                    </div>

                    <div class="form-group">
                        <label>Time</label>
                        <input type="time" id="logTime" name="log_time" value="{{ now()->format('H:i') }}"
                            required>
                    </div>
                </div>

                <div class="form-group">
                    <label>Activities/ Particulars</label>
                    <textarea 
    name="action_taken"
    id="actionTaken"
    rows="4"
    placeholder="Describe the activity..."
    required
></textarea>

                </div>

                <div class="form-group">
                    <label>Action Taken</label>
                    <input type="text" name="reported_by" placeholder="Describe actions taken...." required>
                </div>

                <div class="form-group">
                    <label>Attachment (optional)</label>
                    <input type="file" name="attachment">
                </div>

                <div class="modal-actions">
                    <button type="submit" class="btn-primary">
                        Save Log
                    </button>

                    <button type="button" class="btn-secondary"
                        onclick="document.getElementById('addLogModal').style.display='none'">
                        Cancel
                    </button>
                </div>

            </form>
        </div>
    </div>


</body>

<script src="{{ asset('js/livedate.js') }}"></script>

<script>
    function updateDashboardCounts() {
        fetch('/dashboard/live-counts')
            .then(res => res.json())
            .then(data => {
                document.getElementById('totalStgepr').textContent = data.stgepr;
                document.getElementById('totalImt').textContent = data.imt;
                document.getElementById('totalAll').textContent = data.totalAll;
            })
            .catch(err => console.error(err));
    }

    setInterval(updateDashboardCounts, 5000);
    updateDashboardCounts();
</script>

<script>
    function updateActivityLogs() {
        fetch('/dashboard/live-activity-logs')
            .then(res => res.json())
            .then(logs => {

                const tbody = document.getElementById('activityLogBody');
                tbody.innerHTML = '';

                logs.forEach(log => {
                    const tr = document.createElement('tr');
                    tr.innerHTML = `
                        <td>${log.date}</td>
                        <td>${log.time}</td>
                        <td class="log-text">${log.action}</td>
                        <td>${log.reported_by}</td>
                    `;
                    tbody.appendChild(tr);
                });
            })
            .catch(err => console.error(err));
    }

    setInterval(updateActivityLogs, 5000);
    updateActivityLogs();
</script>


<script>
    function openAddLogModal() {
        const modal = document.getElementById('addLogModal');
        modal.style.display = 'flex';

        const dateInput = document.getElementById('logDate');
        const timeInput = document.getElementById('logTime');

        const now = new Date();

        // Set current date (YYYY-MM-DD)
        dateInput.value = now.toISOString().split('T')[0];

        // Set current time (HH:MM – 24 hour)
        timeInput.value = now.toTimeString().slice(0, 5);
    }

    function closeAddLogModal() {
        document.getElementById('addLogModal').style.display = 'none';
    }
</script>









</html>


{{-- 0947-391-5335,  --}}