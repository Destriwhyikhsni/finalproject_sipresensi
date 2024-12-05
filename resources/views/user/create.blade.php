@extends('layouts.app')

@section('content')
    <h1>Tambah Pengguna</h1>
    <form action="{{ route('user.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="nip">NIP</label>
            <select name="nip" id="nip" class="form-control">
                <option value="">Pilih NIP</option>
                @foreach ($pegawai as $item)
                    <option value="{{ $item->nip }}" data-id_pegawai="{{ $item->id_pegawai }}">{{ $item->nip }} - {{ $item->nama_pegawai }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="name">Nama</label>
            <input type="text" name="name" id="name" value="{{ old('name') }}" placeholder="Nama"
                class="form-control">
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" value="{{ old('email') }}" placeholder="Email"
                class="form-control">
        </div>

        <!-- Opsi Role -->
        <div class="form-group">
            <label for="role">Role</label>
            <select name="role" id="role" class="form-control">
                <option value="0" {{ old('role') == 0 ? 'selected' : '' }}>Pegawai</option>
                <option value="1" {{ old('role') == 1 ? 'selected' : '' }}>Admin</option>
            </select>
        </div>

        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" id="password" name="password" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="password_confirmation">Konfirmasi Password</label>
            <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" required>
        </div>


        <input type="hidden" name="id_pegawai" id="id_pegawai">

        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
@endsection
@section('scripts')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#nip').on('change', function () {
                let selectedNip = $(this).val();

                if (selectedNip) {

                    $.ajax({
                        url: '/user/get-pegawai/' + selectedNip,
                        type: 'GET',
                        dataType: 'json',
                        success: function (response) {
                            if (response.status === 'success') {
                                $('#name').val(response.data.name);
                                $('#email').val(response.data.email);
                                $('#id_pegawai').val(response.data.id_pegawai);
                            } else {
                                alert(response.message);
                                $('#name').val('');
                                $('#email').val('');
                            }
                        },
                        error: function () {
                            alert('Terjadi kesalahan saat mengambil data.');
                            $('#name').val('');
                            $('#email').val('');
                        }
                    });
                } else {
                    $('#name').val('');
                    $('#email').val('');
                    $('#id_pegawai').val(''); // Kosongkan input hidden jika tidak ada NIP yang dipilih
                }
            });
        });
    </script>
@endsection
