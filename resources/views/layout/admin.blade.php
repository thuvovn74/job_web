<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>

    {{-- BOOTSTRAP --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    {{-- FONT AWESOME --}}
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />

    {{-- CHART JS --}}
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background: #f4f7fe;
            font-family: 'Segoe UI', sans-serif;
        }

        /* SIDEBAR */
        .sidebar {
            width: 270px;
            height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            background: linear-gradient(180deg, #0f172a, #111827);
            padding: 24px 18px;
            overflow-y: auto;
        }

        .logo {
            color: white;
            font-size: 28px;
            font-weight: bold;
            margin-bottom: 35px;
        }

        .menu-title {
            color: #94a3b8;
            font-size: 13px;
            text-transform: uppercase;
            margin: 20px 10px 12px;
            font-weight: 600;
        }

        .sidebar a {
            display: flex;
            align-items: center;
            gap: 14px;
            color: #d1d5db;
            text-decoration: none;
            padding: 14px 16px;
            border-radius: 16px;
            margin-bottom: 10px;
            transition: 0.3s;
            font-size: 15px;
            font-weight: 500;
        }

        .sidebar a i {
            width: 22px;
        }

        .sidebar a:hover {
            background: rgba(59, 130, 246, 0.2);
            color: white;
        }

        .sidebar a.active {
            background: linear-gradient(90deg, #2563eb, #4f46e5);
            color: white;
            box-shadow: 0 10px 20px rgba(37, 99, 235, 0.3);
        }

        .logout {
            margin-top: 40px;
            border-top: 1px solid #334155;
            padding-top: 20px;
        }

        .logout a {
            color: #f87171 !important;
        }

        /* MAIN */
        .main {
            margin-left: 270px;
            min-height: 100vh;
        }

        /* TOPBAR */
        .topbar {
            height: 80px;
            background: white;
            padding: 0 30px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            border-bottom: 1px solid #e5e7eb;
        }

        .topbar-left i {
            font-size: 24px;
            color: #334155;
            cursor: pointer;
        }

        .topbar-right {
            display: flex;
            align-items: center;
            gap: 20px;
        }

        .notification {
            position: relative;
            font-size: 20px;
            color: #374151;
        }

        .notification span {
            position: absolute;
            top: -8px;
            right: -10px;
            background: #ef4444;
            color: white;
            font-size: 11px;
            width: 18px;
            height: 18px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .profile {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .profile img {
            width: 45px;
            height: 45px;
            border-radius: 50%;
            object-fit: cover;
        }

        .profile-info h6 {
            margin: 0;
            font-size: 15px;
            font-weight: 700;
        }

        .profile-info small {
            color: #6b7280;
        }

        /* CONTENT */
        .content {
            padding: 30px;
        }
    </style>
</head>

<body>

    {{-- SIDEBAR --}}
    <div class="sidebar">

        <div class="logo">
            <i class="fa fa-briefcase me-2"></i>
            JobPortal
        </div>

        {{-- TỔNG QUAN --}}
        <div class="menu-title">
            Tổng quan
        </div>

        <a href="/admin/dashboard"
            class="{{ request()->is('admin/dashboard') ? 'active' : '' }}">

            <i class="fa fa-house"></i>
            Dashboard

        </a>

        {{-- QUẢN LÝ --}}
        <div class="menu-title">
            Quản lý
        </div>

        <a href="/admin/users"
            class="{{ request()->is('admin/users') ? 'active' : '' }}">

            <i class="fa fa-users"></i>
            Người dùng

        </a>

        <a href="/admin/jobs"
            class="{{ request()->is('admin/jobs') ? 'active' : '' }}">

            <i class="fa fa-briefcase"></i>
            Công việc

        </a>

        <a href="/admin/job-types"
            class="{{ request()->is('admin/job-types') ? 'active' : '' }}">

            <i class="fa fa-layer-group"></i>
            Job Types

        </a>

        <a href="/admin/salaries"
            class="{{ request()->is('admin/salaries') ? 'active' : '' }}">

            <i class="fa fa-money-bill-wave"></i>
            Salaries

        </a>

        <a href="/admin/skills"
            class="{{ request()->is('admin/skills') ? 'active' : '' }}">

            <i class="fa fa-code"></i>
            Skills

        </a>

        <a href="/admin/locations"
            class="{{ request()->is('admin/locations') ? 'active' : '' }}">

            <i class="fa fa-location-dot"></i>
            Locations

        </a>

        <a href="/admin/careers"
            class="{{ request()->is('admin/careers*') ? 'active' : '' }}">

            <i class="fa fa-book-open"></i>
            Career Guides

        </a>

        {{-- SETTINGS --}}
        <div class="menu-title">
            Hệ thống
        </div>

        <div class="logout">

            <a href="/logout">

                <i class="fa fa-right-from-bracket"></i>
                Đăng xuất

            </a>

        </div>

    </div>

    {{-- MAIN --}}
    <div class="main">

        {{-- TOPBAR --}}
        <div class="topbar">

            <div class="topbar-left">
                <i class="fa fa-bars"></i>
            </div>

            <div class="topbar-right">

                <div class="notification">
                    <i class="fa fa-bell"></i>
                    <span>5</span>
                </div>

                <div class="profile">

                    <img src="https://i.pravatar.cc/100" alt="">

                    <div class="profile-info">

                        <h6>
                            {{ Auth::user()->name ?? 'Admin' }}
                        </h6>

                        <small>
                            Quản trị viên
                        </small>

                    </div>

                </div>

            </div>

        </div>

        {{-- CONTENT --}}
        <div class="content">
            @yield('content')
        </div>

    </div>

</body>

</html>