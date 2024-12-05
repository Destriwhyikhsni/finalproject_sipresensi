@extends('layouts.app')

@section('content')
    <h1>Riwayat Absen</h1>

    <table>
        <thead>
            <tr>
                <th>Pegawai</th>
                <th>Status</th>
                <th>Tanggal</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($absensies as $absensi)
                <tr>
                    <td>{{ $absensi->pegawai->nama }}</td>
                    <td>{{ $absensi->status }}</td>
                    <td>{{ $absensi->tanggal->format('d-m-Y') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
