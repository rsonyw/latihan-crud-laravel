@extends('template')

@section('content')
    <h1>Form Edit Data</h1>
    <hr>
    <a href="/mapel" class="btn btn-primary btn-sm mb-3">Kembali</a>
    <form action="/mapel/{{ $mapel->id }}" method="POST">
        @method('PUT')
        @csrf
        <div class="mb-3">
            <label for="kodemapel" class="form-label">Kode Mata Pelajaran</label>
            <input type="text" class="form-control" id="kodemapel" name="kodemapel" value="{{ $mapel->kodemapel }}">
        </div>
        <div class="mb-3">
            <label for="namamapel" class="form-label">Nama Mata Pelajaran</label>
            <input type="text" class="form-control" id="namamapel" name="namamapel" value="{{ $mapel->namamapel }}">
        </div>
        <div class="mb-3">
            <label for="namaguru" class="form-label">Nama Guru</label>
            <input type="text" class="form-control" id="namaguru" name="namaguru" value="{{ $mapel->namaguru }}">
        </div>
        <div class="mb-3">
            <label for="jk" class="form-label">Jenis Kelamin</label>
            <select class="form-select" id="jk" name="jk" value="{{ $mapel->jk }}">
                <option value="L" @if ($mapel->jk == 'L') selected @endif>Laki-laki</option>
                <option value="P" @if ($mapel->jk == 'P') selected @endif>Perempuan</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="nip" class="form-label">NIP</label>
            <input type="text" class="form-control" id="nip" name="nip" value="{{ $mapel->nip }}">
        </div>
        <button type="submit" class="btn btn-primary btn-sm">Submit</button>
    </form>
@endsection
