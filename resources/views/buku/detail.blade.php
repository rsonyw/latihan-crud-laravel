@extends('template')

@section('content')
    <h1>Detail</h1>
    <hr>
    <a href="/buku" class="btn btn-primary btn-sm mb-3">Kembali</a>
    <table class="table table-bordered">
        <tr>
            <th>Id</th>
            <td>{{ $buku->id }}</td>
        </tr>

        <tr>
            <th>Kode Buku</th>
            <td>{{ $buku->kodebuku }}</td>
        </tr>

        <tr>
            <th>Judul Buku</th>
            <td>{{ $buku->namabuku }}</td>
        </tr>

        <tr>
            <th>Penulis</th>
            <td>{{ $buku->penulis }}</td>
        </tr>

        <tr>
            <th>Tahun Terbit</th>
            <td>{{ $buku->tahunterbit }}</td>
        </tr>

        <tr>
            <th>Penerbit</th>
            <td>{{ $buku->penerbit }}</td>
        </tr>
    @endsection
