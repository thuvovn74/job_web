<!DOCTYPE html>
<html>

<head>
    <title>Admin Dashboard</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <style>

        body{
            background:#f5f7fb;
            font-family:Arial;
        }

        .sidebar{
            width:260px;
            height:100vh;
            position:fixed;
            left:0;
            top:0;
            background:#111827;
            padding:20px;
        }

        .logo{
            color:white;
            font-size:24px;
            font-weight:bold;
            margin-bottom:30px;
        }

        .sidebar a{
            display:block;
            color:#cbd5e1;
            text-decoration:none;
            padding:14px 16px;
            border-radius:12px;
            margin-bottom:10px;
            transition:0.3s;
        }

        .sidebar a:hover,
        .sidebar a.active{
            background:#2563eb;
            color:white;
        }

        .content{
            margin-left:280px;
            padding:30px;
        }

    </style>
</head>

<body>

<div class="sidebar">

    <div class="logo">
        Admin Panel
    </div>

    <a href="/admin/dashboard">
        <i class="fa fa-chart-line me-2"></i>
        Dashboard
    </a>

    <a href="/admin/users">
        <i class="fa fa-users me-2"></i>
        Users
    </a>

    <a href="/admin/job-types">
        <i class="fa fa-briefcase me-2"></i>
        Job Types
    </a>

    <a href="/admin/salaries">
        <i class="fa fa-money-bill me-2"></i>
        Salaries
    </a>

    <a href="/admin/skills">
        <i class="fa fa-code me-2"></i>
        Skills
    </a>

    <a href="/admin/locations">
        <i class="fa fa-location-dot me-2"></i>
        Locations
    </a>

    <a href="/admin/careers">
        <i class="fa fa-book me-2"></i>
        Career Guides
    </a>

</div>

<div class="content">
    @yield('content')
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

</body>

</html>