@extends('layouts.app')

@section('content')
    <div class="container">
        <!-- Notifikasi jika ada pesan sukses -->
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <!-- Form untuk memilih jadwal mengajar -->
        <form action="{{ route('presensi.index') }}" method="GET">
            <div class="form-group">
                <label for="jadwal_id">Pilih Jadwal Mengajar</label>
                <select name="jadwal_id" id="jadwal_id" class="form-control" onchange="this.form.submit()">
                    <option value="" disabled selected>Pilih Jadwal</option>
                    @foreach ($jadpel as $schedule)
                        <option value="{{ $schedule->id_jadwal }}"
                            {{ $schedule->id_jadwal == old('jadwal_id', $jadwal->id_jadwal ?? '') ? 'selected' : '' }}>
                            {{ $schedule->mapel->nama_mapel }} - {{ $schedule->kelas->nama_kelas }}
                            @if ($schedule->sudah_presensi)
                                (Sudah Presensi)
                            @endif
                        </option>
                    @endforeach
                </select>
            </div>
        </form>

        <!-- Tampilkan tabel presensi jika jadwal sudah dipilih -->
        @if (isset($jadwal) && $jadwal)
            <form action="{{ route('presensi.store') }}" method="POST">
                @csrf
                <input type="hidden" name="jadwal_id" value="{{ $jadwal->id_jadwal }}">

                <h3>Presensi Kelas: {{ $jadwal->mapel->nama_mapel }} - {{ $jadwal->kelas->nama_kelas }}</h3>

                <table class="table table-bordered mt-3">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Siswa</th>
                            <th>Nomor Identitas</th>
                            <th>Status Kehadiran</th>
                            <th>Keterangan (Jika tidak hadir)</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($students as $index => $student)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $student->nama_siswa }}</td>
                                <td>{{ $student->nisn }}</td>
                                <td>
                                    <select name="status_presensi[{{ $student->id_siswa }}]" class="form-control">
                                        <option value="Hadir">Hadir</option>
                                        <option value="Sakit">Sakit</option>
                                        <option value="Izin">Izin</option>
                                        <option value="Alfa">Alfa</option>
                                    </select>
                                </td>
                                <td>
                                    <textarea name="keterangan[{{ $student->id_siswa }}]" class="form-control"
                                        placeholder="Jika tidak hadir, beri keterangan"></textarea>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <button type="submit" class="btn btn-success mt-3">Simpan</button>
                <!-- Tombol Export -->
                <a href="{{ route('presensi.export', ['jadwal_id' => $jadwal->id_jadwal]) }}"
                    class="btn btn-primary mt-3">Export ke Excel</a>

            </form>
        @else
            <p class="alert alert-warning mt-3">Pilih jadwal mengajar terlebih dahulu untuk melihat data siswa.</p>
        @endif
    </div>
@endsection
