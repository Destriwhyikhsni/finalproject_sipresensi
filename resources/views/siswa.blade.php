@extends('layouts.app')

@section('title', 'Data Siswa')

@section('content')
    <h1>Data Siswa</h1>
    <a href="{{ route('siswa.create') }}" class="btn btn-primary mb-3">Tambah Siswa</a>
    
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>NISN</th>
                <th>Nama</th>
                <th>Kelas</th>
                <th>Jenis Kelamin</th>
                <th>Tahun Ajaran</th>
                <th>Tempat Lahir</th>
                <th>Tanggal Lahir</th>
                <th>Alamat</th>
                <th>No. Telepon</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($siswa as $s)
                <tr>
                    <td>{{ $s->nisn }}</td>
                    <td>{{ $s->nama_siswa }}</td>
                    <td>{{ $s->kelas }}</td>
                    <td>{{ $s->jenis_kelamin }}</td>
                    <td>{{ $s->tahun_ajaran }}</td>
                    <td>{{ $s->tempat_lahir }}</td>
                    <td>{{ $s->tanggal_lahir }}</td>
                    <td>{{ $s->alamat }}</td>
                    <td>{{ $s->no_telp }}</td>
                    <td>
                        <a href="{{ route('siswa.edit', $s->id_siswa) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('siswa.destroy', $s->id_siswa) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
