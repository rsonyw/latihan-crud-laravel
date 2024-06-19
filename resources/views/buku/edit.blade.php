@extends('template')

@section('content')
    <h1>Form Edit Data</h1>
    <hr>
    <a href="/buku" class="btn btn-primary btn-sm mb-3">Kembali</a>
    <form action="{{ route('buku.update', $buku->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="kodebuku" class="form-label">Kode buku</label>
            <input type="text" class="form-control" id="kodebuku" name="kodebuku" value="{{ $buku->kodebuku }}">
        </div>
        <div class="mb-3">
            <label for="namabuku" class="form-label">Judul Buku</label>
            <input type="text" class="form-control" id="namabuku" name="namabuku" value="{{ $buku->namabuku }}">
        </div>
        <div class="mb-3">
            <label for="penulis" class="form-label">Penulis</label>
            <input type="text" class="form-control" id="penulis" name="penulis" value="{{ $buku->penulis }}">
        </div>
        <div class="mb-3">
            <label for="tahunterbit" class="form-label">Tahun Terbit</label>
            <input type="text" class="form-control" id="tahunterbit" name="tahunterbit" value="{{ $buku->tahunterbit }}">
        </div>
        <div class="mb-3">
            <label for="penerbit" class="form-label">Penerbit</label>
            <input type="text" class="form-control" id="penerbit" name="penerbit" value="{{ $buku->penerbit }}">
        </div>
        <button type="submit" class="btn btn-primary btn-sm">Submit</button>
    </form>
@endsection
