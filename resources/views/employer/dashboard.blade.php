@extends('layout.employer')

@section('content')

<h3 class="mb-4">Overview</h3>

<div class="row mb-4">

    <div class="col-md-3">
        <div class="card-box bg-purple">
            <h4>{{ $jobs }}</h4>
            <p>Bài đăng</p>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card-box bg-green">
            <h4>{{ $applications }}</h4>
            <p>Ứng viên</p>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card-box bg-orange">
            <h4>{{ $pending }}</h4>
            <p>Chờ duyệt</p>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card-box bg-yellow">
            <h4>{{ $approved }}</h4>
            <p>Đã duyệt</p>
        </div>
    </div>

</div>

<!-- CHART -->
<div class="row">

    <div class="col-md-8">
        <div class="card p-3">
            <h5>Ứng viên theo tháng</h5>
            <canvas id="lineChart"></canvas>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card p-3">
            <h5>Trạng thái</h5>
            <canvas id="pieChart"></canvas>
        </div>
    </div>

</div>

<script>

    // LINE CHART
    new Chart(document.getElementById('lineChart'), {
        type: 'line',

        data: {
            labels: [
                'Jan','Feb','Mar','Apr',
                'May','Jun','Jul','Aug',
                'Sep','Oct','Nov','Dec'
            ],

            datasets: [{
                label: 'Applications',

                data: @json($chartData),

                borderWidth: 3,
                fill: true,
                tension: 0.4
            }]
        }
    });

    // PIE CHART
    new Chart(document.getElementById('pieChart'), {

        type: 'doughnut',

        data: {
            labels: ['Pending','Approved','Rejected'],

            datasets: [{
                data: [
                    {{ $pending }},
                    {{ $approved }},
                    {{ $rejected }}
                ]
            }]
        }
    });

</script>

@endsection