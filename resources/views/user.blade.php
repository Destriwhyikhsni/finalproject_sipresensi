@extends('layouts.app')

@section('content')
    <h1>Daftar Users</h1>
    <a href="{{ route('user.create') }}" class="btn btn-primary">Tambah User</a>
    <table>
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
                        <a href="{{ route('user.edit', $user->id) }}">Edit</a>
                        <form action="{{ route('user.destroy', $user->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
