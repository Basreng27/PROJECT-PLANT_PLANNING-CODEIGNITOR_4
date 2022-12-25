<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Login Page</title>
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
                <a href="." class="navbar-brand navbar-brand-autodark"><img src="/set_admin/tanaman1.jpg" alt="Logo" height="36"></a>
            </div>

            <form class="card card-md" action="/login-proses" method="POST">
                <div class="card-body">
                    <h2 class="card-title text-center mb-4">Login</h2>

                    <?php if (session()->getFlashdata('berhasil')) { ?>
                        <div class="alert alert-success" role="alert">
                            Akun berhasil ditambahkan, silahkan melakukan login dengn akun yang telah terdaftar
                        </div>
                    <?php } ?>

                    <?php if (session()->getFlashdata('gagal')) { ?>
                        <div class="alert alert-danger" role="alert">
                            Password atau Username <strong>salah</strong>, silahkan cobalagi
                        </div>
                    <?php } ?>

                    <div class="mb-3">
                        <label class="form-label">Username</label>
                        <input type="text" class="form-control <?= ($validation->hasError('username')) ? 'is-invalid' : ''; ?>" name="username" value="<?= old('username');  ?>" placeholder="Username" autofocus>
                        <div class="invalid-feedback"><?= $validation->getError('username');  ?></div>
                    </div>

                    <div class="mb-2">
                        <label class="form-label">Password</label>
                        <input type="password" class="form-control <?= ($validation->hasError('password')) ? 'is-invalid' : '';  ?>" name="password" placeholder="Password">
                        <div class="invalid-feedback"><?= $validation->getError('password'); ?></div>
                    </div>

                    <div class="form-footer">
                        <button type="submit" class="btn btn-primary w-100">Login</button>
                    </div>

                    <div class="text-center text-muted mt-3">
                        Belum memiliki akun? <a href="/regist" tabindex="-1">Regist</a>
                    </div>

                    <div class="text-center text-muted mt-3">
                        Kembali ke home <a href="/" tabindex="-1">Back</a>
                    </div>
                </div>
            </form>

        </div>
    </div>
    <!-- Libs JS -->
    <!-- Tabler Core -->
    <script src="assets/users/js/tabler.min.js" defer></script>
    <script src="assets/users/js/demo.min.js" defer></script>
</body>

</html>