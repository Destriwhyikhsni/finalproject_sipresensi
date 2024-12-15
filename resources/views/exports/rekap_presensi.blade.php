<table>
    <thead>
        <tr>
            <th>Tanggal</th>
            <th>Nama Pegawai</th>
            <th>Waktu Masuk</th>
            <th>Waktu Keluar</th>
            <th>Lokasi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($rekapPresensi as $presensi)
            <tr>
                <td>{{ $presensi->tanggal_presensi }}</td>
                <td>{{ $presensi->nama_pegawai }}</td>
                <td>{{ $presensi->waktu_masuk }}</td>
                <td>{{ $presensi->waktu_keluar }}</td>
                <td>{{ $presensi->location }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
