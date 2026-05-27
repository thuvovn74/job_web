@extends('layout.admin')

@section('content')

<h3 class="mb-4 fw-bold">Admin Dashboard</h3>

<!-- STATISTICS -->
<div class="row g-4 mb-4">

    <div class="col-md-3">
        <div class="card shadow border-0 rounded-4 p-4 bg-primary text-white">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h6>Tổng Users</h6>
                    <h2>{{ $users }}</h2>
                </div>

                <i class="fa fa-users fa-2x"></i>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card shadow border-0 rounded-4 p-4 bg-success text-white">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h6>Công việc</h6>
                    <h2>{{ $jobs }}</h2>
                </div>

                <i class="fa fa-briefcase fa-2x"></i>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card shadow border-0 rounded-4 p-4 bg-warning text-dark">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h6>Career Guides</h6>
                    <h2>{{ $careers }}</h2>
                </div>

                <i class="fa fa-book fa-2x"></i>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card shadow border-0 rounded-4 p-4 bg-danger text-white">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h6>Skills</h6>
                    <h2>{{ $skills }}</h2>
                </div>

                <i class="fa fa-code fa-2x"></i>
            </div>
        </div>
    </div>

</div>

<!-- CHARTS -->
<div class="row g-4">

    <!-- Job Status -->
    <div class="col-md-6">

        <div class="card shadow border-0 rounded-4">

            <div class="card-body">

                <h5 class="mb-4">Trạng thái công việc</h5>

                <canvas id="jobChart"></canvas>

            </div>

        </div>

    </div>

    <!-- Applications -->
    <div class="col-md-6">

        <div class="card shadow border-0 rounded-4">

            <div class="card-body">

                <h5 class="mb-4">Applications</h5>

                <canvas id="applicationChart"></canvas>

            </div>

        </div>

    </div>

</div>

<!-- LINE CHART -->
<div class="row mt-4">

    <div class="col-md-12">

        <div class="card shadow border-0 rounded-4">

            <div class="card-body">

                <h5 class="mb-4">Tổng quan hệ thống</h5>

                <canvas id="overviewChart" height="90"></canvas>

            </div>

        </div>

    </div>

</div>

<script>

document.addEventListener("DOMContentLoaded", function () {

    // JOB CHART
    const jobCtx = document.getElementById('jobChart');

    if(jobCtx){
        new Chart(jobCtx, {
            type: 'doughnut',
            data: {
                labels: ['Active', 'Hidden'],
                datasets: [{
                    data: [{{ $activeJobs }}, {{ $hiddenJobs }}],
                    backgroundColor: [
                        '#22c55e',
                        '#ef4444'
                    ]
                }]
            }
        });
    }

    // APPLICATION CHART
    const appCtx = document.getElementById('applicationChart');

    if(appCtx){
        new Chart(appCtx, {
            type: 'bar',
            data: {
                labels: ['Pending', 'Approved', 'Rejected'],
                datasets: [{
                    label: 'Applications',
                    data: [
                        {{ $pendingApplications }},
                        {{ $approvedApplications }},
                        {{ $rejectedApplications }}
                    ],
                    backgroundColor: [
                        '#facc15',
                        '#22c55e',
                        '#ef4444'
                    ],
                    borderRadius: 10
                }]
            }
        });
    }

    // OVERVIEW
    const overviewCtx = document.getElementById('overviewChart');

    if(overviewCtx){
        new Chart(overviewCtx, {
            type: 'line',
            data: {
                labels: ['Users', 'Jobs', 'Careers', 'Skills'],
                datasets: [{
                    label: 'System Data',
                    data: [
                        {{ $users }},
                        {{ $jobs }},
                        {{ $careers }},
                        {{ $skills }}
                    ],
                    borderColor: '#2563eb',
                    backgroundColor: 'rgba(37,99,235,0.2)',
                    tension: 0.4,
                    fill: true
                }]
            }
        });
    }

});

</script>

@endsection