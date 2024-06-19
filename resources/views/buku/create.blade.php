@extends('template')

@section('content')
    <h1>Form Tambah Data</h1>
    <hr>
    <a href="/buku" class="btn btn-primary btn-sm mb-3">Kembali</a>
    <form action="{{ route('buku.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="kodebuku" class="form-label">Kode Buku</label>
            <input type="text" class="form-control" id="kodebuku" name="kodebuku">
        </div>
        <div class="mb-3">
            <label for="namabuku" class="form-label">Judul Buku</label>
            <input type="text" class="form-control" id="namabuku" name="namabuku">
        </div>
        <div class="mb-3">
            <label for="penulis" class="form-label">Penulis</label>
            <input type="text" class="form-control" id="penulis" name="penulis">
        </div>
        <div class="mb-3">
            <label for="tahunterbit" class="form-label">Tahun Terbit</label>
            <input type="text" class="form-control" rows="4" id="tahunterbit" name="tahunterbit"></input>
        </div>
        <div class="mb-3">
            <label for="penerbit" class="form-label">Penerbit</label>
            <input type="text" class="form-control" id="penerbit" name="penerbit">
        </div>
        <button type="submit" class="btn btn-primary btn-sm">Submit</button>
    </form>
@endsection
