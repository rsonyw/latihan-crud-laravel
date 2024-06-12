@extends('template')

@section('content')
    <h1>Form Tambah Data</h1>
    <hr>
    <a href="/crud" class="btn btn-primary btn-sm mb-3">Kembali</a>
    <form action="/crud" method="POST">
        @csrf
        <div class="mb-3">
            <label for="nama" class="form-label">Nama</label>
            <input type="text" class="form-control" id="nama" name="nama">
        </div>
        <div class="mb-3">
            <label for="kelas" class="form-label">Kelas</label>
            <input type="text" class="form-control" id="kelas" name="kelas">
        </div>
        <div class="mb-3">
            <label for="nis" class="form-label">NIS</label>
            <input type="text" class="form-control" id="nis" name="nis">
        </div>
        <div class="mb-3">
            <label for="jk" class="form-label">Jenis Kelamin</label>
            <select class="form-select" id="jk" name="jk">
                <option value="L">Laki-laki</option>
                <option value="P">Perempuan</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="alamat" class="form-label">Alamat</label>
            <textarea class="form-control" rows="4" id="alamat" name="alamat"></textarea>
        </div>
        <div class="mb-3">
            <label for="hobi" class="form-label">Hobi</label>
            <input type="text" class="form-control" id="hobi" name="hobi">
        </div>
        <button type="submit" class="btn btn-primary btn-sm">Submit</button>
    </form>
@endsection
