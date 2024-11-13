@extends('layouts.app')

@section('title', 'Edit Data Siswa')

@section('content')

    <h1>Edit Siswa</h1>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


    <form action="{{ route('siswa.update', $siswa->id_siswa) }}" method="POST">
        @csrf
        @method('PUT')

        <div>
            <label for="nisn">NISN:</label>
            <input type="text" name="nisn" id="nisn" value="{{ old('nisn', $siswa->nisn) }}" required>
        </div>

        <div>
            <label for="nama_siswa">Nama Siswa:</label>
            <input type="text" name="nama_siswa" id="nama_siswa" value="{{ old('nama_siswa', $siswa->nama_siswa) }}" required>
        </div>

        <div>
            <label for="kelas">Kelas:</label>
            <select name="kelas" id="kelas" required>
                @foreach($kelas as $k)
                    <option value="{{ $k->id_kelas }}" {{ $siswa->kelas == $k->id_kelas ? 'selected' : '' }}>
                        {{ $k->nama_kelas }}
                    </option>
                @endforeach
            </select>
        </div>

        <div>
            <label for="jenis_kelamin">Jenis Kelamin:</label>
            <select name="jenis_kelamin" id="jenis_kelamin" required>
                <option value="laki-laki" {{ $siswa->jenis_kelamin == 'laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                <option value="perempuan" {{ $siswa->jenis_kelamin == 'perempuan' ? 'selected' : '' }}>Perempuan</option>
            </select>
        </div>

        <div>
            <label for="tahun_ajaran">Tahun Ajaran:</label>
            <input type="text" name="tahun_ajaran" id="tahun_ajaran" value="{{ old('tahun_ajaran', $siswa->tahun_ajaran) }}" required>
        </div>

        <div>
            <label for="tempat_lahir">Tempat Lahir:</label>
            <input type="text" name="tempat_lahir" id="tempat_lahir" value="{{ old('tempat_lahir', $siswa->tempat_lahir) }}" required>
        </div>

        <div>
            <label for="tanggal_lahir">Tanggal Lahir:</label>
            <input type="date" name="tanggal_lahir" id="tanggal_lahir" value="{{ old('tanggal_lahir', $siswa->tanggal_lahir) }}" required>
        </div>

        <div>
            <label for="alamat">Alamat:</label>
            <textarea name="alamat" id="alamat" required>{{ old('alamat', $siswa->alamat) }}</textarea>
        </div>

        <div>
            <label for="no_telp">No Telp:</label>
            <input type="text" name="no_telp" id="no_telp" value="{{ old('no_telp', $siswa->no_telp) }}" required>
        </div>

        <button type="submit">Update</button>
    </form>

</body>
</html>
@endsection
