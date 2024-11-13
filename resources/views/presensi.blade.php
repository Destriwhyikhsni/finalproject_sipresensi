<!-- presensi/index.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container">
    <!-- Form to select jadwal -->
    <form action="{{ route('presensi.index') }}" method="GET">
        @csrf
        <div class="form-group">
            <label for="jadwal_id">Pilih Jadwal Mengajar</label>
            <select name="jadwal_id" id="jadwal_id" class="form-control" onchange="this.form.submit()">
                <option value="" disabled selected>Pilih Jadwal</option>
                @foreach ($jadpel as $schedule)
                    <option value="{{ $schedule->id_jadwal }}" {{ $schedule->id_jadwal == old('jadwal_id', $jadwal->id_jadwal ?? '') ? 'selected' : '' }}>
                        {{ $schedule->mapel->nama_mapel }} - {{ $schedule->kelas->nama_kelas }}
                    </option>
                @endforeach
            </select>
        </div>
    </form>

    <!-- If a jadwal is selected, show the table for student attendance -->
    @if (isset($jadwal) && $jadwal)
        <form action="{{ route('presensi.store') }}" method="POST">
            @csrf
            <input type="hidden" name="jadwal_id" value="{{ $jadwal->id_jadwal }}">

            <h3>Presensi Kelas: {{ $jadwal->mapel->nama_mapel }} - {{ $jadwal->kelas->nama_kelas }}</h3>

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Nama Siswa</th>
                        <th>Kelas</th>
                        <th>Status Kehadiran</th>
                        <th>Keterangan (Jika tidak hadir)</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($students as $student)
                        <tr>
                            <td>{{ $student->nama_siswa }}</td>
                            <td>{{ $student->kelas->nama_kelas }}</td>
                            <td>
                                <select name="status_presensi[{{ $student->id_siswa }}]" class="form-control">
                                    <option value="Hadir">Hadir</option>
                                    <option value="Sakit">Sakit</option>
                                    <option value="Izin">Izin</option>
                                    <option value="Alfa">Alfa</option>
                                </select>
                            </td>
                            <td>
                                <textarea name="keterangan[{{ $student->id_siswa }}]" class="form-control" placeholder="Jika tidak hadir, beri keterangan"></textarea>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <button type="submit" class="btn btn-success">Simpan Kehadiran</button>
        </form>
    @else
        <p class="alert alert-warning">Pilih jadwal mengajar terlebih dahulu untuk melihat data siswa.</p>
    @endif
</div>
@endsection
