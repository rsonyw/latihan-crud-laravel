@extends('template')

@section('content')
    <h1>Selamat Datang di Aplikasi CRUD Sederhana Laravel!</h1>
    <hr>
    <a href="/crud/create" class="btn btn-primary btn-sm mb-3">Tambah Data</a href="/buyer">
    <table id="myTable" class="display">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Kelas</th>
                <th>Nis</th>
                <th>JK</th>
                <th>Alamat</th>
                <th>Hobi</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($siswas as $siswa)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $siswa->nama }}</td>
                    <td>{{ $siswa->kelas }}</td>
                    <td>{{ $siswa->nis }}</td>
                    <td>{{ $siswa->jk }}</td>
                    <td>{{ $siswa->alamat }}</td>
                    <td>{{ $siswa->hobi }}</td>
                    <td>
                        <a href="/crud/{{ $siswa->id }}" class="btn btn-primary btn-sm">Detail</a>
                        <a href="/crud/{{ $siswa->id }}/edit" class="btn btn-warning btn-sm">Edit</a>
                        <form action="/crud/{{ $siswa->id }}" method="POST" class="d-inline">
                            @method('DELETE')
                            @csrf
                            <button href="/crud/{{ $siswa->id }}/delete"
                                class="btndelete btn-danger btn-sm">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
