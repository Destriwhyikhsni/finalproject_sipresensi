    <!DOCTYPE html>
    <html lang="id">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>@yield('title', 'Dashboard')</title>
        <!-- Bootstrap CSS -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
        <style>
            /* Custom blue theme */
            .bg-blue {
                background-color: #007bff !important;
            }

            .text-blue {
                color: #007bff !important;
            }

            .bg-light-blue {
                background-color: #e3f2fd !important;
            }

            .navbar-custom {
                background-color: #007bff;
            }

            .sidebar-custom {
                background-color: #0056b3;
                color: white;
            }

            .sidebar-custom a {
                color: white;
            }

            .sidebar-custom a:hover {
                background-color: #004085;
            }
        </style>
        @stack('styles')
    </head>

    <body>

        <!-- Sidebar and Content Wrapper -->
        <div class="d-flex" id="wrapper">
            <!-- Sidebar -->
            <div class="bg-blue p-3" id="sidebar" style="min-height: 100vh; width: 250px;">
                <h4 class="text-center text-white">SI Presensi</h4>
                <!-- Profile Section -->
                <div class="text-center mb-4">
                    <!-- Dummy photo or user photo -->
                    <img src="https://via.placeholder.com/50" alt="User Photo" class="profile-img">
                    <h5 class="text-white mt-2">
                        {{ Auth::user()->name ?? 'Nama Pengguna' }}
                    </h5>
                </div>
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a href="#" class="nav-link text-white">
                            <i class="bi bi-house-door"></i> Dashboard
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('kelas.index') }}" class="nav-link text-white">
                            <i class="bi bi-book"></i> Data Kelas
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('pegawai.index') }}" class="nav-link text-white">
                            <i class="bi bi-person"></i> Data Pegawai
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('siswa.index') }}" class="nav-link text-white">
                            <i class="bi bi-person"></i> Data Siswa
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('jadwal.index') }}" class="nav-link text-white">
                            <i class="bi bi-calendar-check"></i> Jadwal
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link text-white">
                            <i class="bi bi-calendar-check"></i> Presensi
                        </a>
                    </li>
                </ul>
                <div class="mt-auto">
                    <form action="{{ route('auth.logout') }}" method="POST" class="d-inline">
                        @csrf
                        <button type="submit" class="btn btn-danger w-100">Logout</button>
                    </form>
                </div>
            </div>

            <!-- Main content area -->
            <div id="page-content-wrapper" class="col-md-9">
                <!-- Navbar -->
                <nav class="navbar navbar-expand-lg navbar-custom">
                    <div class="container-fluid">
                        <button class="btn btn-outline-light" id="menu-toggle">☰ Menu</button>
                        <a class="navbar-brand text-white" href="#">Dashboard</a>
                    </div>
                </nav>

                <!-- Content -->
                <div class="container-fluid mt-4">
                    @yield('content')
                </div>
            </div>
        </div>

        <!-- Bootstrap JS -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
        <script>
            // Toggle sidebar
            document.getElementById('menu-toggle').addEventListener('click', function() {
                document.getElementById('sidebar').classList.toggle('d-none');
            });
        </script>

        @stack('scripts')
    </body>

    </html>
