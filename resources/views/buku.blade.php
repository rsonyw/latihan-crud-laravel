<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="//cdn.datatables.net/2.0.8/css/dataTables.dataTables.min.css">

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
                <li class="nav-item {{ Request::is('mapel') ? 'active' : '' }}">
                    <a href="#" class="nav-link text-white">
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


        </div>

        <script src="https://code.jquery.com/jquery-3.7.1.min.js"
            integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
        <script src="//cdn.datatables.net/2.0.8/js/dataTables.min.js"></script>

        <script>
            $(document).ready(function() {
                $('#myTable').DataTable();
            });

            $(document).ready(function() {
                $('#mapelTable').DataTable({ // Inisialisasi DataTables pada tabel dengan id 'mapelTable'
                    "processing": true, // Menampilkan indikator pemrosesan
                    "serverSide": true, // Mengaktifkan pemrosesan server-side
                    "ajax": { // Konfigurasi AJAX untuk pengambilan data dari server
                        "url": "{{ route('mapel.data') }}", // URL untuk mengakses data
                        "type": "POST", // Metode HTTP untuk permintaan AJAX
                        "data": function(d) { // Menambahkan data tambahan pada permintaan AJAX
                            d._token =
                                "{{ csrf_token() }}"; // Menambahkan CSRF token untuk keamanan Laravel
                        }
                    },
                    // Definisi kolom-kolom yang ada di DataTables dan sumber datanya
                    "columns": [{
                            "data": "urutan",
                            "name": "urutan",
                            "searchable": false,
                            "orderable": true,
                            "render": function(data, type, full, meta) {
                                return meta.row + 1; // Nomor urut dimulai dari 1
                            }
                        },
                        {
                            "data": "kodemapel"
                        },
                        {
                            "data": "namamapel"
                        },
                        {
                            "data": "namaguru"
                        },
                        {
                            "data": "jk"
                        },
                        {
                            "data": "nip"
                        },
                        {
                            "data": null, //untuk menambahkan kolom 'aksi'
                            "render": function(data, type, row) {
                                return '<a href="/mapel/' + row.id +
                                    '" class="btn btn-sm btn-info">Detail</a> <a href="/mapel/' +
                                    row
                                    .id +
                                    '/edit" class="btn btn-sm btn-primary">Edit</a><button class="btn btn-sm btn-danger" onclick="deleteFunction(' +
                                    row.id + ')">Delete</button>';
                            }
                        }
                    ]
                });
            });

            $(document).ready(function() {
                $('.btndelete').click(function() {
                    if (confirm('Apakah Anda yakin ingin menghapus data ini?')) {
                        var deleteForm = $(this).closest('form');
                        deleteForm.submit();
                    } else {
                        return false;
                    }
                });
            });

            function deleteFunction(id) {
                if (confirm("Apakah Anda yakin ingin menghapus data ini?")) {
                    $.ajax({
                        url: '/mapel/' + id,
                        type: 'POST',
                        data: {
                            _method: 'DELETE',
                            _token: $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function(response) {
                            console.log("Data berhasil dihapus");
                            window.location.reload();
                        },
                        error: function(xhr, status, error) {
                            console.error("Terjadi kesalahan:", error);
                        }
                    });
                }
            }
        </script>


</body>

</html>
