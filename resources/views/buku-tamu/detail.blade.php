<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buku Tamu HIMPALA Universitas Nasional</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/responsive/2.3.0/css/responsive.dataTables.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">  <!-- Responsif CSS -->
    <style>
        .border-top-danger {
            border-top: 5px solid #dc3545;
        }
    </style>
</head>


<body>
    <div class="container my-5">
        <div class="text-center mb-4">
            <img src="{{ asset('img/logo-himpala.png') }}" alt="Logo Universitas Nasional" class="img-fluid" style="max-height: 150px;">
        </div>
        <div class="card shadow border-top-danger">
            <div class="card-header">
                <h1 class="text-center">DAFTAR TAMU | HIMPALA Universitas Nasional</h1>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="bukuTamuTable" class="table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Organisasi</th>
                                <th>Telepon Organisasi</th>
                                <th>Sosmed Organisasi</th>
                                <th>Alamat Organisasi</th>
                                <th>Asal Instansi</th>
                                <th>Nama Tamu</th>
                                <th>Tujuan</th>
                                <th>Tanggal Berkunjung</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($bukuTamu as $tamu)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $tamu->nama_organisasi }}</td>
                                    <td>{{ $tamu->telpon_organisasi }}</td>
                                    <td>{{ $tamu->sosmed_organisasi }}</td>
                                    <td>{{ $tamu->alamat_organisasi }}</td>
                                    <td>{{ $tamu->asal_instansi }}</td>
                                    <td>{{ $tamu->nama_tamu }}</td>
                                    <td>{{ $tamu->tujuan }}</td>
                                    <td>{{ $tamu->tanggal_berkunjung }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <a href="{{ route('buku-tamu.index') }}" class="btn btn-danger mt-2"><i class="fas fa-arrow-left"></i> Kembali ke Form Buku Tamu</a>
            </div>
        </div>
    </div>

    <footer class="text-center mt-4 py-3 bg-light">
        <p class="mb-0">Copyright &copy; {{ date('Y') }}</p>
        <p class="mb-0">Design & Developed by <span class="text-primary">Me</span></p>
    </footer>

    <!-- JavaScript untuk DataTables -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#bukuTamuTable').DataTable({
                paging: true,
                searching: true,
                ordering: true,
                info: true,
                lengthChange: false
            });
        });
    </script>
</body>



</html>