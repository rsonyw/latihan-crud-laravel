@extends('template')

@section('content')
    <h1>Form Tambah Data</h1>
    <hr>
    <a href="/mapel" class="btn btn-primary btn-sm mb-3">Kembali</a>
    <form action="/mapel" method="POST">
        @csrf
        <div class="mb-3">
            <label for="kodemapel" class="form-label">Kode Mata Pelajaran</label>
            <input type="text" class="form-control" id="kodemapel" name="kodemapel">
        </div>
        <div class="mb-3">
            <label for="namamapel" class="form-label">Nama Mata Pelajaran</label>
            <input type="text" class="form-control" id="namamapel" name="namamapel">
        </div>
        <div class="mb-3">
            <label for="namaguru" class="form-label">Nama Guru</label>
            <input type="text" class="form-control" id="namaguru" name="namaguru">
        </div>
        <div class="mb-3">
            <label for="jk" class="form-label">Jenis Kelamin</label>
            <select class="form-select" id="jk" name="jk">
                <option value="L">Laki-laki</option>
                <option value="P">Perempuan</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="nip" class="form-label">NIP</label>
            <input type="text" class="form-control" id="nip" name="nip">
        </div>
        <button type="submit" class="btn btn-primary btn-sm">Submit</button>
    </form>
@endsection
