@extends('layouts.app')

@section('title', 'Data Pegawai')

@section('content')

    <div class="pagetitle">
        <h1>Data Pegawai</h1>
    </div><!-- End Page Title -->

    <!-- Flash Message -->
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"></h5>
                        <a href="{{ route('pegawai.create') }}" class="btn btn-primary mb-3" style="font-size: 12px;background-color:#80C4E9;color:black;">Tambah Pegawai</a>
                        
                        <!-- Styling untuk tabel dan tombol -->
                        <style>
                            .small-font-table {
                                font-size: 12px; /* Ukuran font untuk tabel */
                            }
                            .btn-small {
                                font-size: 12px; /* Ukuran font tombol */
                                width: 100px;    /* Panjang tombol yang sama */
                                text-align: center;
                                padding: 5px 10px; /* Padding tombol lebih kecil */
                            }
                        </style>

                        <div style="overflow-x: auto; white-space: nowrap;">
                            <!-- Table of Pegawai -->
                            <table class="table table-bordered small-font-table datatable">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>NIP</th>
                                        <th>Nama</th>
                                        <th>Jenis Pegawai</th>
                                        <th>Mata Pelajaran</th>
                                        <th>Tempat Lahir</th>
                                        <th>Tanggal Lahir</th>
                                        <th>Alamat</th>
                                        <th>No. Telp</th>
                                        <th>Email</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($pegawai as $p)
                                        <tr>
                                            <td>{{ $p->id_pegawai }}</td>
                                            <td>{{ $p->nip }}</td>
                                            <td>{{ $p->nama_pegawai }}</td>
                                            <td>{{ $p->jenis_pegawai }}</td>
                                            <td>{{ $p->mata_pelajaran ?? '-' }}</td>
                                            <td>{{ $p->tempat_lahir }}</td>
                                            <td>{{ $p->tanggal_lahir }}</td>
                                            <td>{{ $p->alamat }}</td>
                                            <td>{{ $p->no_telp }}</td>
                                            <td>{{ $p->email }}</td>
                                            <td>
                                                <a href="{{ route('pegawai.edit', $p->id_pegawai) }}" class="btn btn-warning btn-sm btn-small" style="background-color: #80C4E9; color:black;">Edit</a>
                                                <form action="{{ route('pegawai.destroy', $p->id_pegawai) }}" method="POST" style="display: inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm btn-small" style="background-color: #D4EBF8; color:black;" onclick="return confirm('Yakin ingin menghapus pegawai ini?')">Hapus</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </section>
</div>

@endsection
