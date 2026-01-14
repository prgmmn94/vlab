<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Dashboard') | V-Lab</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        body {
            background-color: #f4f6f9;
        }
        .sidebar {
            width: 260px;
            min-height: 100vh;
            background: #ffffff;
            border-right: 1px solid #ddd;
        }
        .sidebar .logo {
            font-weight: bold;
            font-size: 20px;
            color: #4b5cff;
        }
        .sidebar a {
            color: #555;
            text-decoration: none;
            padding: 10px 15px;
            display: flex;
            align-items: center;
            border-radius: 6px;
            margin-bottom: 4px;
        }
        .sidebar a i {
            margin-right: 10px;
        }
        .sidebar a.active,
        .sidebar a:hover {
            background: #e9ecff;
            color: #4b5cff;
        }
        .topbar {
            background: #ffffff;
            border-bottom: 1px solid #ddd;
            padding: 10px 20px;
        }
        .content {
            padding: 20px;
        }
    </style>

    @stack('css')
</head>
<body>

<div class="d-flex">

    <!-- SIDEBAR -->
    <aside class="sidebar p-3">
        <div class="mb-4">
            <span class="logo">V-Lab</span>
        </div>

        <a href="/dashboard" class="{{ request()->is('dashboard') ? 'active' : '' }}">
            <i class="bi bi-speedometer2"></i> Dashboard
        </a>

        <hr>

        <small class="text-muted">OPREC SYSTEM</small>

        <a href="#">
            <i class="bi bi-calendar-event"></i> Periode
        </a>

        <a href="#">
            <i class="bi bi-upload"></i> Upload Hasil Seleksi
        </a>

        <a href="#">
            <i class="bi bi-clipboard-check"></i> Test
        </a>

        <hr>

        <small class="text-muted">CMS</small>

        <a href="#">
            <i class="bi bi-book"></i> Modul
        </a>

        <a href="#">
            <i class="bi bi-laptop"></i> Aplikasi Praktikum
        </a>

        <a href="#">
            <i class="bi bi-newspaper"></i> Berita
        </a>

        <hr>

        <!-- LOGOUT -->
        <form method="POST" action="/logout">
            @csrf
            <button class="btn btn-danger btn-sm w-100">
                <i class="bi bi-box-arrow-right"></i> Logout
            </button>
        </form>
    </aside>

    <!-- MAIN -->
    <div class="flex-fill">

        <!-- TOP BAR -->
        <div class="topbar d-flex justify-content-between align-items-center">
            <form class="w-50">
                <input type="text" class="form-control" placeholder="Search...">
            </form>

            <div>
                <span class="me-2">
                    {{ session('admin_name') }}
                </span>
                <i class="bi bi-person-circle fs-4"></i>
            </div>
        </div>

        <!-- CONTENT -->
        <main class="content">
            @yield('content')
        </main>

    </div>

</div>

@stack('js')
</body>
</html>
