@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Daftar Jadwal</h2>
    <a href="{{ route('jadwal.create') }}" class="btn btn-primary mb-3">Tambah Jadwal</a>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table">
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
                        <a href="{{ route('jadwal.edit', $jadwal->id_jadwal) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('jadwal.destroy', $jadwal->id_jadwal) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
