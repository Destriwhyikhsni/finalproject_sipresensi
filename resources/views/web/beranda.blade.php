<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin - Sistem Informasi Presensi</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<!-- Sidebar -->
<div class="d-flex" id="wrapper">
    <div class="bg-dark border-right" id="sidebar-wrapper">
        <div class="sidebar-heading text-white p-3">Admin Dashboard</div>
        <div class="list-group list-group-flush">
            <a href="#" class="list-group-item list-group-item-action bg-dark text-white">Dashboard</a>
            <a href="#" class="list-group-item list-group-item-action bg-dark text-white">Data Presensi</a>
            <a href="#" class="list-group-item list-group-item-action bg-dark text-white">Data Guru</a>
            <a href="#" class="list-group-item list-group-item-action bg-dark text-white">Data Siswa</a>
            <a href="#" class="list-group-item list-group-item-action bg-dark text-white">Laporan</a>
            <a href="#" class="list-group-item list-group-item-action bg-dark text-white">Pengaturan</a>
        </div>
    </div>

    <!-- Page Content -->
    <div id="page-content-wrapper">
        <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
            <button class="btn btn-primary" id="menu-toggle">Toggle Menu</button>

            <div class="collapse navbar-collapse">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Logout</a>
                    </li>
                </ul>
            </div>
        </nav>

        <div class="container-fluid mt-4">
            <h1 class="mt-4">Dashboard</h1>
            <p>Selamat datang<b>{{ Auth::user()->name }}</b> di sistem informasi presensi!</p>
            
            <!-- Dashboard Cards -->
            <div class="row">
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="card text-white bg-primary shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title">Total Guru</h5>
                            <p class="card-text fs-3">35</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="card text-white bg-success shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title">Total Siswa</h5>
                            <p class="card-text fs-3">120</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="card text-white bg-warning shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title">Hadir Hari Ini</h5>
                            <p class="card-text fs-3">95</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="card text-white bg-danger shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title">Tidak Hadir Hari Ini</h5>
                            <p class="card-text fs-3">5</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Table Data Presensi -->
            <div class="card mt-4 shadow-sm">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0">Data Presensi Hari Ini</h5>
                </div>
                <div class="card-body">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Jabatan</th>
                                <th>Status Kehadiran</th>
                                <th>Jam Masuk</th>
                                <th>Jam Keluar</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Contoh data statis, bisa diganti dengan data dinamis dari database -->
                            <tr>
                                <td>1</td>
                                <td>John Doe</td>
                                <td>Guru</td>
                                <td>Hadir</td>
                                <td>08:00</td>
                                <td>15:00</td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Jane Smith</td>
                                <td>Staff</td>
                                <td>Tidak Hadir</td>
                                <td>-</td>
                                <td>-</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap JS and dependencies -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
    document.getElementById("menu-toggle").onclick = function () {
        document.getElementById("wrapper").classList.toggle("toggled");
    };
</script>

<style>
    #wrapper {
        display: flex;
    }
    #sidebar-wrapper {
        width: 250px;
    }
    #page-content-wrapper {
        flex: 1;
    }
</style>

</body>
</html>
