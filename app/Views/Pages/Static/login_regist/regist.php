<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Regist Akun Baru.</title>
    <!-- CSS files -->
    <link href="assets/users/css/tabler.min.css" rel="stylesheet" />
    <link href="assets/users/css/tabler-flags.min.css" rel="stylesheet" />
    <link href="assets/users/css/tabler-payments.min.css" rel="stylesheet" />
    <link href="assets/users/css/tabler-vendors.min.css" rel="stylesheet" />
    <link href="assets/users/css/demo.min.css" rel="stylesheet" />
</head>

<body class=" border-top-wide border-primary d-flex flex-column">
    <div class="page page-center">
        <div class="container-tight py-4">
            <div class="text-center mb-4">
                <a href="#" class="navbar-brand navbar-brand-autodark"><img src="set_admin/tanaman1.jpg" alt="Logo" height="36"></a>
            </div>

            <form class="card card-md" action="/regist-proses" method="POST">
                <div class="card-body">
                    <h2 class="card-title text-center mb-4">Buat Akun Baru</h2>
                    <div class="mb-3">
                        <label class="form-label">Nama</label>
                        <!-- <input type="text" class="form-control <?php /* ($validation->hasError('nama')) ? 'is-invalid' : ''; ?>" name="nama" value="<?= old('nama'); */ ?>" placeholder="Masukan Nama" autofocus> -->
                        <input type="text" class="form-control" name="nama" value="" placeholder="Masukan Nama" autofocus>
                        <!-- <div class="invalid-feedback"><?php /* $validation->getError('nama');*/ ?></div> -->
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Username</label>
                        <!-- <input type="text" class="form-control <?php /* ($validation->hasError('username')) ? 'is-invalid' : ''; ?>" name="username" value="<?= old('username'); */ ?>" placeholder="Masukan Username"> -->
                        <input type="text" class="form-control" name="username" value="<?= old('username'); ?>" placeholder="Masukan Username">
                        <!-- <div class="invalid-feedback"><?php /* $validation->getError('username');*/ ?></div> -->
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Password</label>
                        <!-- <input type="password" class="form-control <?php /*($validation->hasError('password')) ? 'is-invalid' : ''; */ ?>" name="password" placeholder="Masukan Password"> -->
                        <input type="password" class="form-control" name="password" placeholder="Masukan Password">
                        <!-- <div class="invalid-feedback"><?php /* $validation->getError('password'); */ ?></div> -->
                    </div>

                    <div class="form-footer">
                        <button type="submit" class="btn btn-primary w-100">Buat Akun Baru</button>
                    </div>

                    <div class="text-center text-muted mt-3">
                        Telah memiliki akun? <a href="/login" tabindex="-1">Sign in</a>
                    </div>

                    <div class="text-center text-muted mt-3">
                        Kembali ke home <a href="/" tabindex="-1">Back</a>
                    </div>
                </div>
            </form>

            <!-- <input type="hidden" id="gagal" value="<?php $gagal; ?>"> -->
        </div>
    </div>

    <!-- <script src="assets/users/js/tabler.min.js" defer></script>
    <script src="assets/users/js/demo.min.js" defer></script>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
    <script>
        var ggl = document.getElementById("gagal").value;
        if (ggl == 'gagal') {
            $(document).ready(function() {
                console.log('hi')
                $("#modal-danger").modal('show');
            });
        }
    </script> -->
</body>
<!-- <div class="modal modal-blur fade" id="modal-danger" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
        <div class="modal-content">
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            <div class="modal-status bg-danger"></div>
            <div class="modal-body text-center py-4">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon mb-2 text-danger icon-lg" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <path d="M12 9v2m0 4v.01" />
                    <path d="M5 19h14a2 2 0 0 0 1.84 -2.75l-7.1 -12.25a2 2 0 0 0 -3.5 0l-7.1 12.25a2 2 0 0 0 1.75 2.75" />
                </svg>
                <h3>Failed!</h3>
                <div class="text-muted">
                    Data gagal ditambahakan.
                    <br>
                    Cek kolom tidak boleh kosong
                    <br>
                    atau
                    <br>
                    Username telah tersedia
                </div>
            </div>
            <div class="modal-footer">
                <div class="w-100">
                    <div class="row">
                        <div class="col">
                            <a href="#" class="btn btn-danger w-100" data-bs-dismiss="modal">
                                OK
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> -->

</html>