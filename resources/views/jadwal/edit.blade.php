@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Jadwal</h2>
    
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    
    <!-- Form untuk mengedit jadwal -->
    <form action="{{ route('jadwal.update', $jadwal->id_jadwal) }}" method="POST">
        @csrf
        @method('PUT')

        <!-- Pilihan Guru -->
        <div class="form-group">
            <label for="id_guru">Guru</label>
            <select name="id_guru" class="form-control">
                @foreach ($gurus as $guru)
                    <option value="{{ $guru->id_pegawai }}" {{ $jadwal->id_guru == $guru->id_pegawai ? 'selected' : '' }}>
                        {{ $guru->nama_pegawai }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Pilihan Mata Pelajaran -->
        <div class="form-group">
            <label for="id_mapel">Mata Pelajaran</label>
            <select name="id_mapel" class="form-control">
                @foreach ($mapels as $mapel)
                    <option value="{{ $mapel->id_mapel }}" {{ $jadwal->id_mapel == $mapel->id_mapel ? 'selected' : '' }}>
                        {{ $mapel->nama_mapel }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Pilihan Kelas -->
        <div class="form-group">
            <label for="id_kelas">Kelas</label>
            <select name="id_kelas" class="form-control">
                @foreach ($kelas as $k)
                    <option value="{{ $k->id_kelas }}" {{ $jadwal->id_kelas == $k->id_kelas ? 'selected' : '' }}>
                        {{ $k->nama_kelas }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Pilihan Hari -->
        <div class="form-group">
            <label for="hari">Hari</label>
            <select name="hari" class="form-control">
                @foreach (['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'] as $hari)
                    <option value="{{ $hari }}" {{ $jadwal->hari == $hari ? 'selected' : '' }}>
                        {{ $hari }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Input Jam Mulai -->
        <div class="form-group">
            <label for="jam_mulai">Jam Mulai</label>
            <input type="time" name="jam_mulai" class="form-control" value="{{ $jadwal->jam_mulai }}">
        </div>

        <!-- Input Jam Selesai -->
        <div class="form-group">
            <label for="jam_selesai">Jam Selesai</label>
            <input type="time" name="jam_selesai" class="form-control" value="{{ $jadwal->jam_selesai }}">
        </div>

        <!-- Input Ruangan -->
        <div class="form-group">
            <label for="ruangan">Ruangan</label>
            <input type="text" name="ruangan" class="form-control" maxlength="50" value="{{ $jadwal->ruangan }}">
        </div>

        <!-- Pilihan Status Jadwal -->
        <div class="form-group">
            <label for="status_jadwal">Status</label>
            <select name="status_jadwal" class="form-control">
                <option value="Aktif" {{ $jadwal->status_jadwal == 'Aktif' ? 'selected' : '' }}>Aktif</option>
                <option value="Batal" {{ $jadwal->status_jadwal == 'Batal' ? 'selected' : '' }}>Batal</option>
            </select>
        </div>

        <!-- Tombol Submit -->
        <button type="submit" class="btn btn-primary mt-3">Update Jadwal</button>
    </form>
</div>
@endsection
