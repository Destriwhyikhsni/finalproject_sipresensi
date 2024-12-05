@extends('layouts.app')

@section('title', 'Data Kelas')

@section('content')
<div class="container mt-4">
    <h2>Daftar Kelas</h2>
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <a href="{{ route('kelas.create') }}" 
       class="btn btn-primary mb-3 btn-sm" 
       style="width: 120px; font-size: 13px; background-color: #80C4E9; color: black;">
        Tambah Kelas
    </a>

    <table class="table table-bordered" style="font-size: 13px;">
        <thead>
            <tr>
                <th>#</th>
                <th>Nama Kelas</th>
                <th>Wali Kelas</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($kelas as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->nama_kelas }}</td>
                    <td>{{ $item->waliKelas->nama_pegawai }}</td>
                    <td>
                        <div class="d-flex justify-content-center gap-2">
                            <a href="{{ route('kelas.edit', $item->id_kelas) }}" 
                               class="btn btn-warning btn-sm" 
                               style="width: 80px; height: 30px; font-size: 13px; background-color: #80C4E9; color: black; text-align: center; line-height: 30px;">
                                Edit
                            </a>
                            <form action="{{ route('kelas.destroy', $item->id_kelas) }}" 
                                  method="POST" 
                                  style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" 
                                        class="btn btn-danger btn-sm" 
                                        style="width: 80px; height: 30px; font-size: 13px; background-color: #D4EBF8; color: black; text-align: center; line-height: 30px;"
                                        onclick="return confirm('Yakin ingin menghapus kelas ini?')">
                                    Hapus
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
