@extends('layouts.app')

@section('title', 'Tambah Kelas')

@section('content')
<div class="container mt-4">
    <h2>Tambah Kelas</h2>

    <form action="{{ route('kelas.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="nama_kelas">Nama Kelas</label>
            <input type="text" class="form-control" id="nama_kelas" name="nama_kelas" value="{{ old('nama_kelas') }}" required>
            @error('nama_kelas')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="wali_kelas">Wali Kelas</label>
            <select class="form-control" id="wali_kelas" name="wali_kelas" required>
                <option value="">Pilih Wali Kelas</option>
                @foreach ($waliKelas as $pegawai)
                    <option value="{{ $pegawai->id_pegawai }}" {{ old('wali_kelas') == $pegawai->id_pegawai ? 'selected' : '' }}>{{ $pegawai->nama_pegawai }}</option>
                @endforeach
            </select>
            @error('wali_kelas')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('kelas.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
