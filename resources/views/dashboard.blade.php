@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Dashboard Pegawai</h1>

        <!-- Menampilkan nama pegawai -->
        <div class="card mb-4">
            <div class="card-header">
                <h4>Selamat datang, {{ Auth::user()->name }}!</h4>
            </div>
            <div class="card-body">
                <p>Nama: {{ Auth::user()->name }}</p>
                <p>Email: {{ Auth::user()->email }}</p>
                <p>Role: {{ Auth::user()->role == 1 ? 'Admin' : 'Pegawai' }}</p>
            </div>
        </div>

        <!-- Notifikasi -->
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        @if(session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        <!-- Tombol Clock In dan Clock Out -->
        <div class="my-4">
            @if(!$presensi || $presensi->waktu_masuk == null)
                <!-- Tombol Clock In -->
                <form action="{{ route('presensi.clockin') }}" method="POST">
                    @csrf
                    <input type="hidden" name="location" value="Jakarta"> <!-- Contoh lokasi -->
                    <button type="submit" class="btn btn-success">Clock In</button>
                </form>
            @elseif($presensi->waktu_keluar == null)
                <!-- Tombol Clock Out -->
                <form action="{{ route('presensi.clockout') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-danger">Clock Out</button>
                </form>
            @else
                <p>Anda sudah menyelesaikan presensi hari ini.</p>
            @endif
            <a href="{{ route('pegawai.rekapPresensi') }}"
                class="btn btn-primary mt-3">Riwayat Presensi</a>

        </div>
        
    </div>
    </div>
@endsection
