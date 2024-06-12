@extends('template')

@section('content')
    <h1>Detail</h1>
    <hr>
    <a href="/mapel" class="btn btn-primary btn-sm mb-3">Kembali</a>
    <table class="table table-bordered">
        <tr>
            <th>Id</th>
            <td>{{ $mapel->id }}</td>
        </tr>

        <tr>
            <th>Kode Mata Pelajaran</th>
            <td>{{ $mapel->kodemapel }}</td>
        </tr>

        <tr>
            <th>Nama Mata Pelajaran</th>
            <td>{{ $mapel->namamapel }}</td>
        </tr>

        <tr>
            <th>Nama Guru</th>
            <td>{{ $mapel->namaguru }}</td>
        </tr>

        <tr>
            <th>Jenis Kelamin</th>
            <td>{{ $mapel->jk }}</td>
        </tr>

        <tr>
            <th>NIP</th>
            <td>{{ $mapel->nip }}</td>
        </tr>
    @endsection
