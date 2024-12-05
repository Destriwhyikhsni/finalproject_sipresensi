@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Daftar Jadwal</h2>
    <a href="{{ route('jadwal.create') }}" class="btn btn-primary mb-3" style="background-color: #80C4E9; font-size: 13px; color:black;">Tambah Jadwal</a>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <style>
        .small-font-table {
            font-size: 13px; /* Ukuran font untuk tabel */
        }
        .btn-small {
            font-size: 13px; /* Ukuran font tombol */
            width: 80px;    /* Panjang tombol yang sama */
            text-align: center;
            padding: 5px 10px; /* Padding untuk tombol lebih kecil */
        }
    </style>

    <table class="table table-sm small-font-table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Guru</th>
                <th>Mata Pelajaran</th>
                <th>Kelas</th>
                <th>Hari</th>
                <th>Jam Mulai</th>
                <th>Jam Selesai</th>
                <th>Ruangan</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($jadwals as $jadwal)
                <tr>
                    <td>{{ $jadwal->id_jadwal }}</td>
                    <td>{{ $jadwal->guru->nama_pegawai }}</td>
                    <td>{{ $jadwal->mapel->nama_mapel }}</td>
                    <td>{{ $jadwal->kelas->nama_kelas }}</td>
                    <td>{{ $jadwal->hari }}</td>
                    <td>{{ $jadwal->jam_mulai }}</td>
                    <td>{{ $jadwal->jam_selesai }}</td>
                    <td>{{ $jadwal->ruangan }}</td>
                    <td>{{ $jadwal->status_jadwal }}</td>
                    <td>
                        <a href="{{ route('jadwal.edit', $jadwal->id_jadwal) }}" 
                           class="btn btn-warning btn-sm btn-small" 
                           style="background-color: #80C4E9; color:black;">Edit</a>
                        <form action="{{ route('jadwal.destroy', $jadwal->id_jadwal) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" 
                                    class="btn btn-danger btn-sm btn-small" 
                                    style="background-color: #D4EBF8; color:black;">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
