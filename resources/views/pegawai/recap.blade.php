@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Rekap Presensi</h1>

    <!-- Form Filter -->
    <form method="GET" action="{{ route('pegawai.rekapPresensi') }}">
        <div class="row mb-3">
            <!-- Bagian Kiri: Filter Bulan dan Tahun -->
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-6">
                        <label for="bulan" class="form-label">Bulan</label>
                        <select id="bulan" name="bulan" class="form-select">
                            @for ($i = 1; $i <= 12; $i++)
                                <option value="{{ $i }}" {{ $i == $bulan ? 'selected' : '' }}>
                                    {{ DateTime::createFromFormat('!m', $i)->format('F') }}
                                </option>
                            @endfor
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="tahun" class="form-label">Tahun</label>
                        <select id="tahun" name="tahun" class="form-select">
                            @for ($i = now()->year; $i >= now()->year - 5; $i--)
                                <option value="{{ $i }}" {{ $i == $tahun ? 'selected' : '' }}>
                                    {{ $i }}
                                </option>
                            @endfor
                        </select>
                        
                    </div>
                </div>
            </div>
            <!-- Bagian Kanan: Tombol Filter dan Export Excel -->
            <div class="col-md-6 d-flex justify-content-end align-items-end">
                <button type="submit" class="btn btn-primary me-2">Filter</button>
                <a href="{{ route('exportPresensi', ['bulan' => $bulan, 'tahun' => $tahun]) }}" class="btn btn-success">
                    Export Excel
                </a>
            </div>
        </div>
        
    </form>

    <!-- Tabel Rekap Presensi -->
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Tanggal</th>
                <th>Waktu Masuk</th>
                <th>Waktu Keluar</th>
                <th>Lokasi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($rekapPresensi as $presensi)
                <tr>
                    <td>{{ $presensi->tanggal_presensi }}</td>
                    <td>{{ $presensi->waktu_masuk }}</td>
                    <td>{{ $presensi->waktu_keluar }}</td>
                    <td>{{ $presensi->location }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="text-center">Tidak ada data presensi untuk bulan ini.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
