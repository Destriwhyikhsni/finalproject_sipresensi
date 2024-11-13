@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Tambah Jadwal</h2>
    <form action="{{ route('jadwal.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="id_guru">Guru</label>
            <select name="id_guru" class="form-control">
                @foreach ($gurus as $guru)
                    <option value="{{ $guru->id_pegawai }}">{{ $guru->nama_pegawai }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="id_mapel">Mata Pelajaran</label>
            <select name="id_mapel" class="form-control">
                @foreach ($mapels as $mapel)
                    <option value="{{ $mapel->id_mapel }}">{{ $mapel->nama_mapel }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="id_kelas">Kelas</label>
            <select name="id_kelas" class="form-control">
                @foreach ($kelas as $k)
                    <option value="{{ $k->id_kelas }}">{{ $k->nama_kelas }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="hari">Hari</label>
            <select name="hari" class="form-control">
                <option value="Senin">Senin</option>
                <option value="Selasa">Selasa</option>
                <option value="Rabu">Rabu</option>
                <option value="Kamis">Kamis</option>
                <option value="Jumat">Jumat</option>
                <option value="Sabtu">Sabtu</option>
            </select>
        </div>
        <div class="form-group">
            <label for="jam_mulai">Jam Mulai</label>
            <input type="time" name="jam_mulai" class="form-control">
        </div>
        <div class="form-group">
            <label for="jam_selesai">Jam Selesai</label>
            <input type="time" name="jam_selesai" class="form-control">
        </div>
        <div class="form-group">
            <label for="ruangan">Ruangan</label>
            <input type="text" name="ruangan" class="form-control" maxlength="50">
        </div>
        <div class="form-group">
            <label for="status_jadwal">Status</label>
            <select name="status_jadwal" class="form-control">
                <option value="Aktif">Aktif</option>
                <option value="Batal">Batal</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary mt-3">Simpan</button>
    </form>
</div>
@endsection
