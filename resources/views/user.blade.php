@extends('layouts.app')

@section('title', 'Data Users')

@section('content')
    <h1>Data Users</h1>
    <a href="{{ route('user.create') }}" class="btn btn-primary mb-3" style="font-size: 12px; background-color: #80C4E9; color:black;">Tambah User</a>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <style>
        .small-font-table {
            font-size: 12px !important; /* Ukuran font untuk tabel */
        }
        .btn-small {
            font-size: 12px !important; /* Ukuran font tombol lebih kecil */
            width: 80px !important;    /* Panjang tombol yang sama */
            text-align: center;
            padding: 4px 8px !important; /* Padding untuk tombol lebih kecil */
        }
    </style>

    <table class="table table-bordered table-sm small-font-table">
        <thead>
            <tr>
                <th>Nama</th>
                <th>Email</th>
                <th>Role</th>
                <th>Status</th>
                <th>Pegawai</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->role }}</td>
                    <td>{{ $user->status ? 'Aktif' : 'Nonaktif' }}</td>
                    <td>{{ $user->pegawai->nama_pegawai ?? 'Tidak ada' }}</td>
                    <td>
                        <a href="{{ route('user.edit', $user->id) }}" class="btn btn-warning btn-sm btn-small" style="background-color: #80C4E9; color:black;">Edit</a>
                        <form action="{{ route('user.destroy', $user->id) }}" method="POST" style="display:inline;">
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
