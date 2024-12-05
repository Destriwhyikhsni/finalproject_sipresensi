@extends('layouts.app')

@section('title', 'Data Siswa')

@section('content')
    <h1>Data Siswa</h1>
    <a href="{{ route('siswa.create') }}" class="btn btn-primary mb-3" style="font-size: 12px; background-color: #80C4E9;color :black;">Tambah Siswa</a>

    
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <style>
        .small-font-table {
            font-size: 12px; /* Ukuran font untuk tabel */
        }
        .btn-small {
            font-size: 12px; /* Ukuran font tombol */
            width: 80px;    /* Panjang tombol yang sama */
            text-align: center;
            padding: 5px 10px; /* Padding untuk tombol lebih kecil */
        }
    </style>

    <table class="table table-bordered table-sm small-font-table">
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
                        <a href="{{ route('siswa.edit', $s->id_siswa) }}" class="btn btn-warning btn-sm btn-small" style="background-color: #80C4E9; color:black;">Edit</a>
                        <form action="{{ route('siswa.destroy', $s->id_siswa) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm btn-small" style="background-color: #D4EBF8; color:black;" onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
