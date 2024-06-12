@extends('template')

@section('content')
    <h1>Selamat Datang di Aplikasi CRUD Sederhana Laravel!</h1>
    <hr>
    <a href="/mapel/create" class="btn btn-primary btn-sm mb-3">Tambah Data</a href="/buyer">
    <table id="mapelTable" class="display">
        <thead>
            <tr>
                <th>No</th>
                <th>Kode Mata Pelajaran</th>
                <th>Nama Mata Pelajaran</th>
                <th>Nama Guru Yang Mengajar</th>
                <th>Jenis Kelamin</th>
                <th>NIP</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
@endsection
