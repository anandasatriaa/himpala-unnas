<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buku Tamu HIMPALA Universitas Nasional</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        .border-top-danger {
            border-top: 5px solid #dc3545;
        }
    </style>
</head>

<body>
    <div class="container my-5">
        <div class="text-center mb-4">
            <img src="{{ asset('img/logo-himpala.png') }}" alt="Logo Universitas Nasional" class="img-fluid"
                style="max-height: 150px;">
        </div>
        <div class="card shadow border-top-danger">
            <div class="card-header">
                <h1 class="text-center">BUKU TAMU | HIMPALA Universitas Nasional</h1>
            </div>
            <div class="card-body">
                <form action="{{ route('buku-tamu.store') }}" method="POST"
                    class="needs-validation row justify-content-center" novalidate>
                    @csrf
                    <div class="row">
                        <div class="mb-3 col-lg-6 col-12">
                            <label for="nama_organisasi" class="form-label">Nama Organisasi</label>
                            <input type="text" class="form-control" id="nama_organisasi" name="nama_organisasi"
                                required>
                            <div class="invalid-feedback">Nama organisasi wajib diisi.</div>
                        </div>

                        <div class="mb-3 col-lg-6 col-12">
                            <label for="telpon_organisasi" class="form-label">Telepon Organisasi</label>
                            <input type="number" class="form-control" id="telpon_organisasi" name="telpon_organisasi"
                                required>
                            <div class="invalid-feedback">Telpon organisasi wajib diisi.</div>
                        </div>

                        <div class="mb-3 col-lg-6 col-12">
                            <label for="sosmed_organisasi" class="form-label">Sosial Media Organisasi</label>
                            <input type="text" class="form-control" id="sosmed_organisasi" name="sosmed_organisasi">
                        </div>

                        <div class="mb-3 col-lg-6 col-12">
                            <label for="asal_instansi" class="form-label">Asal Instansi</label>
                            <input type="text" class="form-control" id="asal_instansi" name="asal_instansi">
                        </div>

                        <div class="mb-3 col-lg-6 col-12">
                            <label for="tanggal_berkunjung" class="form-label">Tanggal Berkunjung</label>
                            <input type="date" class="form-control" id="tanggal_berkunjung" name="tanggal_berkunjung"
                                required>
                            <div class="invalid-feedback">Tanggal berkunjung wajib diisi.</div>
                        </div>

                        <div class="mb-3 col-lg-6 col-12">
                            <label for="tujuan" class="form-label">Tujuan</label>
                            <input type="text" class="form-control" id="tujuan" name="tujuan" required>
                            <div class="invalid-feedback">Tujuan wajib diisi.</div>
                        </div>

                        <div class="mb-3 col-lg-6 col-12">
                            <label for="nama_tamu" class="form-label">Nama Tamu</label>
                            <input type="text" class="form-control" id="nama_tamu" name="nama_tamu" required>
                            <div class="invalid-feedback">Nama tamu wajib diisi.</div>
                        </div>

                        <div class="mb-3 col-lg-6 col-12">
                            <label for="alamat_organisasi" class="form-label">Alamat Organisasi</label>
                            <input type="text" class="form-control" id="alamat_organisasi" name="alamat_organisasi">
                        </div>

                        <div class="d-flex justify-content-end">
                            <a href="{{ route('buku-tamu.detail') }}" class="btn btn-secondary me-2">Lihat Daftar
                                Tamu</a>
                            <button type="submit" class="btn btn-danger">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <footer class="text-center mt-4 py-3 bg-light">
        <p class="mb-0">Copyright &copy; {{ date('Y') }}</p>
        <p class="mb-0">Design & Developed by <span class="text-primary">Me</span></p>
    </footer>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        // Bootstrap form validation
        (function () {
            'use strict'
            var forms = document.querySelectorAll('.needs-validation')

            Array.prototype.slice.call(forms).forEach(function (form) {
                form.addEventListener('submit', function (event) {
                    if (!form.checkValidity()) {
                        event.preventDefault()
                        event.stopPropagation()
                    }

                    form.classList.add('was-validated')
                }, false)
            })
        })()
    </script>

    <script>
        // Tangani pengiriman form menggunakan AJAX
        $(document).ready(function () {
            $('form').on('submit', function (event) {
                event.preventDefault(); // Mencegah form dikirim secara default

                const form = $(this);
                const formData = new FormData(this);

                // Menambahkan CSRF token secara manual karena AJAX tidak mengirimnya secara otomatis
                formData.append('_token', '{{ csrf_token() }}');

                $.ajax({
                    url: form.attr('action'),
                    type: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function (response) {
                        // Cek apakah pengiriman berhasil
                        if (response.status === 'success') {
                            Swal.fire({
                                icon: 'success',
                                title: 'Berhasil!',
                                text: response.message,
                                showConfirmButton: true,
                            }).then(() => {
                                window.location.reload(); // Reload halaman setelah berhasil
                            });
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Gagal!',
                                text: response.message,
                                showConfirmButton: true,
                            });
                        }
                    },
                    error: function (xhr, status, error) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Terjadi Kesalahan!',
                            text: 'Lihat kembali input yang wajib diisi.',
                            showConfirmButton: true,
                        });
                    }
                });
            });
        });
    </script>

</body>

</html>