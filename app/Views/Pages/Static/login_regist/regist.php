<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Regist Akun Baru.</title>
    <!-- CSS files -->
    <link href="<?= base_url() ?>/assets/users/css/tabler.min.css" rel="stylesheet" />
    <link href="<?= base_url() ?>/assets/users/css/tabler-flags.min.css" rel="stylesheet" />
    <link href="<?= base_url() ?>/assets/users/css/tabler-payments.min.css" rel="stylesheet" />
    <link href="<?= base_url() ?>/assets/users/css/tabler-vendors.min.css" rel="stylesheet" />
    <link href="<?= base_url() ?>/assets/users/css/demo.min.css" rel="stylesheet" />
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
                        <input type="text" class="form-control <?php ($validation->hasError('nama')) ? 'is-invalid' : ''; ?>" name="nama" value="<?= old('nama');  ?>" placeholder="Masukan Nama" autofocus>
                        <div class="invalid-feedback"><?php $validation->getError('nama'); ?></div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Username</label>
                        <input type="text" class="form-control <?php ($validation->hasError('username')) ? 'is-invalid' : ''; ?>" name="username" value="<?= old('username');  ?>" placeholder="Masukan Username">
                        <div class="invalid-feedback"><?php $validation->getError('username'); ?></div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Password</label>
                        <input type="password" class="form-control <?php ($validation->hasError('password')) ? 'is-invalid' : '';  ?>" name="password" placeholder="Masukan Password">
                        <div class="invalid-feedback"><?php $validation->getError('password');  ?></div>
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
</body>

</html>