@extends('layouts.app')

@section('title', 'Edit Kelas')

@section('content')
<div class="container mt-4">
    <h2>Edit Kelas</h2>

    <form action="{{ route('kelas.update', $kelas->id_kelas) }}" method="POST">
        @csrf
        @method('PUT')
        
        <div class="form-group">
            <label for="nama_kelas">Nama Kelas</label>
            <input type="text" class="form-control" id="nama_kelas" name="nama_kelas" value="{{ old('nama_kelas', $kelas->nama_kelas) }}" required>
            @error('nama_kelas')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="wali_kelas">Wali Kelas</label>
            <select class="form-control" id="wali_kelas" name="wali_kelas" required>
                <option value="">Pilih Wali Kelas</option>
                @foreach ($waliKelas as $pegawai)
                    <option value="{{ $pegawai->id_pegawai }}" {{ old('wali_kelas', $kelas->wali_kelas) == $pegawai->id_pegawai ? 'selected' : '' }}>{{ $pegawai->nama_pegawai }}</option>
                @endforeach
            </select>
            @error('wali_kelas')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('kelas.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
