<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdn.datatables.net/v/bs5/dt-2.0.8/datatables.min.css" rel="stylesheet">




    <title>Belajar DataTables Laravel</title>
</head>

<body>
    <div class="d-flex flex-row">
        <div class="d-flex flex-column flex-shrink-0 p-3 text-white sidebar sticky-top"
            style="height: 100vh;width: fit-content; background-color: #3b3b3b">
            <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                <svg class="bi me-2" width="40" height="32">
                    <use xlink:href="#bootstrap" />
                </svg>
                <span class="fs-4">DataTables</span>
            </a>
            <hr>
            <ul class="nav nav-pills flex-column mb-auto">
                <li class="nav-item {{ Request::is('crud') ? 'active' : '' }}">
                    <a href="/crud" class="nav-link text-white" aria-current="page">
                        <svg class="bi me-2" width="16" height="16">
                            <use xlink:href="#home" />
                        </svg>
                        Client Side
                    </a>
                </li>
                <br>
                <li class="nav-item {{ Request::is('mapel') ? 'active' : '' }}">
                    <a href="/mapel" class="nav-link text-white" aria-current="page">
                        <svg class="bi me-2" width="16" height="16">
                            <use xlink:href="#home" />
                        </svg>
                        Server Side Native
                    </a>
                </li>
                <br>
                <li class="nav-item {{ Request::is('buku') ? 'active' : '' }}">
                    <a href="/buku" class="nav-link text-white">
                        <svg class="bi me-2" width="16" height="16">
                            <use xlink:href="#speedometer2" />
                        </svg>
                        Server Side Library
                    </a>
                </li>
            </ul>
            <hr>
        </div>
        <div class="container">

            <h1>Selamat Datang di Pembelajaran DataTables Laravel!</h1>
            <hr>
            <a href="/buku/create" class="btn btn-primary btn-sm mb-3">Tambah Data</a href="/buyer">
            <table id="yajraTable" class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Kode Buku</th>
                        <th>Judul Buku</th>
                        <th>Penulis</th>
                        <th>Tahun Terbit</th>
                        <th>Penerbit</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>

        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
        integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

    <script src="https://cdn.datatables.net/v/bs5/dt-2.0.8/datatables.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#yajraTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    "url": "{{ route('buku.data') }}", // URL untuk mengakses data
                    "type": "GET", // Metode HTTP untuk permintaan AJAX
                    "data": function(d) { // Menambahkan data tambahan pada permintaan AJAX
                        d._token =
                            "{{ csrf_token() }}"; // Menambahkan CSRF token untuk keamanan Laravel
                    }
                },
                columns: [{
                        "data": 'id'
                    },
                    {
                        "data": 'kodebuku'
                    },
                    {
                        "data": 'namabuku'
                    },
                    {
                        "data": 'penulis'
                    },
                    {
                        "data": 'tahunterbit'
                    },
                    {
                        "data": 'penerbit'
                    },
                    {
                        "data": 'aksi'
                    }
                ],
            });

            $('#yajraTable').on('click', '.delete', function() {
                var id = $(this).data('id');
                if (confirm('Apakah kamu yakin akan menghapus buku?')) {
                    $.ajax({
                        url: '/buku/' + id,
                        type: 'POST',
                        data: {
                            _method: 'DELETE',
                            _token: '{{ csrf_token() }}'
                        },
                        success: function(response) {
                            alert(response.success);
                            window.location.reload();
                        },
                        error: function(xhr) {
                            alert('Error deleting book.');
                        }
                    });
                }
            });
        });
    </script>

</body>

</html>
