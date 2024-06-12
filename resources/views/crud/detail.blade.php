@extends('template')

@section('content')
    <h1>Detail</h1>
    <hr>
    <a href="/crud" class="btn btn-primary btn-sm mb-3">Kembali</a>
    <table class="table table-bordered">
        <tr>
            <th>Id</th>
            <td>{{ $siswa->id }}</td>
        </tr>

        <tr>
            <th>Nama</th>
            <td>{{ $siswa->nama }}</td>
        </tr>

        <tr>
            <th>Kelas</th>
            <td>{{ $siswa->kelas }}</td>
        </tr>

        <tr>
            <th>NIS</th>
            <td>{{ $siswa->nis }}</td>
        </tr>

        <tr>
            <th>JK</th>
            <td>{{ $siswa->jk }}</td>
        </tr>

        <tr>
            <th>Alamat</th>
            <td>{{ $siswa->alamat }}</td>
        </tr>

        <tr>
            <th>Hobi</th>
            <td>{{ $siswa->hobi }}</td>
        </tr>
    @endsection
