@extends('layouts.app')

@section('title', 'Beranda')

@section('content')
    <h1>Beranda</h1>
    <p>Selamat datang di sistem informasi presensi! <b>{{ Auth::user()->name }}</b></p>
    <!-- Konten dashboard lainnya seperti kartu statistik dan tabel data -->
@endsection
