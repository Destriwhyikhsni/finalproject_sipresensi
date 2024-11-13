@extends('layouts.app')

@section('title', 'Tambah Data Siswa')

@section('content')
    <h1>Tambah Data Siswa</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('siswa.store') }}" method="POST">
        @csrf
        <div>
            <label for="nisn">NISN:</label>
            <input type="text" name="nisn" id="nisn" required>  
        </div>
        <div>
            <label for="nama_siswa">Nama Siswa:</label>
            <input type="text" name="nama_siswa" id="nama_siswa" required>
        </div>
        <div>
            <label for="kelas">Kelas:</label>
            <select name="kelas" id="kelas" required>
                @foreach($kelas as $k)
                    <option value="{{ $k->id_kelas }}">{{ $k->nama_kelas }}</option>
                @endforeach
            </select>
        </div>
        <div>
            <label for="jenis_kelamin">Jenis Kelamin:</label>
            <select name="jenis_kelamin" id="jenis_kelamin" required>
                <option value="laki-laki">Laki-laki</option>
                <option value="perempuan">Perempuan</option>
            </select>
        </div>
        <div>
            <label for="tahun_ajaran">Tahun Ajaran:</label>
            <input type="text" name="tahun_ajaran" id="tahun_ajaran" required>
        </div>
        <div>
            <label for="tempat_lahir">Tempat Lahir:</label>
            <input type="text" name="tempat_lahir" id="tempat_lahir" required>
        </div>
        <div>
            <label for="tanggal_lahir">Tanggal Lahir:</label>
            <input type="date" name="tanggal_lahir" id="tanggal_lahir" required>
        </div>
        <div>
            <label for="alamat">Alamat:</label>
            <textarea name="alamat" id="alamat" required></textarea>
        </div>
        <div>
            <label for="no_telp">No Telp:</label>
            <input type="text" name="no_telp" id="no_telp" required>
        </div>
        <button type="submit">Simpan</button>
    </form>
@endsection
