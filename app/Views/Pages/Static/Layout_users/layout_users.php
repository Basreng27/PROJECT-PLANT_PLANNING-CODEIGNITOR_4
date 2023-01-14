<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Web Penjadwalan Tanaman</title>
    <!-- CSS files -->
    <link href="<?= base_url() ?>/assets/users/css/tabler.min.css" rel="stylesheet" />
    <link href="<?= base_url() ?>/assets/users/css/tabler-flags.min.css" rel="stylesheet" />
    <link href="<?= base_url() ?>/assets/users/css/tabler-payments.min.css" rel="stylesheet" />
    <link href="<?= base_url() ?>/assets/users/css/tabler-vendors.min.css" rel="stylesheet" />
    <link href="<?= base_url() ?>/assets/users/css/demo.min.css" rel="stylesheet" />
    <link href="<?= base_url() ?>/assets/users/css/demo.css" rel="stylesheet" />
    <!-- <link href="<?= base_url() ?>/assets/users/css/font-awesome.min.css" rel="stylesheet" /> -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />

    <script></script>
</head>

<body>
    <div class="page">
        <header class="navbar navbar-expand-md navbar-light d-print-none">
            <div class="container-xl">

                <h1 class="navbar-brand navbar-brand-autodark d-none-navbar-horizontal pe-0 pe-md-3">
                    <a href=".">
                        <img src="set_admin/tanaman1.jpg<?php /*$set['logo'];*/ ?>" alt="logo" width="110" height="32" alt="Tabler" class="navbar-brand-image">
                    </a>
                </h1>

                <div class="navbar-nav flex-row order-md-last">
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link d-flex lh-1 text-reset p-0" data-bs-toggle="dropdown" aria-label="Open user menu">
                            <div class="d-none d-xl-block ps-2">
                                <?php if (session()->get('stat') == 'login-admin' || session()->get('stat') == 'login-user') {  ?>
                                    <div><?= session()->get('nama'); ?></div>
                                    <div class="mt-1 small text-muted"><?= session()->get('nama'); ?></div>
                                <?php  } else { ?>
                                    <div>Harus Login</div>
                                    <div class="mt-1 small text-muted">Harus Login</div>
                                <?php } ?>
                            </div>
                        </a>

                        <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                            <?php if (session()->get('stat') == 'login-admin' || session()->get('stat') == 'login-user') {
                            } else { ?>
                                <a href="/login" class="dropdown-item">Login</a>
                                <a href="/regist" class="dropdown-item">Regist</a>
                            <?php } ?>
                            <?php if (session()->get('stat') == 'login-admin' || session()->get('stat') == 'login-user') { ?>
                                <a href="/saya-tanam" class="dropdown-item">Saya Tanam</a>
                                <div class="dropdown-divider"></div>
                                <a href="/logout" class="dropdown-item">Logout</a>
                            <?php } ?>
                        </div>
                    </div>

                </div>

            </div>
        </header>

        <div class="navbar-expand-md">
            <div class="collapse navbar-collapse" id="navbar-menu">
                <div class="navbar navbar-light">
                    <div class="container-xl">

                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link" href="/">
                                    <span class="nav-link-icon d-md-none d-lg-inline-block">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <polyline points="5 12 3 12 12 3 21 12 19 12" />
                                            <path d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7" />
                                            <path d="M9 21v-6a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v6" />
                                        </svg>
                                    </span>
                                    <span class="nav-link-title">
                                        Home
                                    </span>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="/tanaman">
                                    <span class="nav-link-title">
                                        Tanaman
                                    </span>
                                </a>
                            </li>

                            <?php /* if (session()->get('stat') == 'login-admin' || session()->get('stat') == 'login-user') { */ ?>
                            <li class="nav-item">
                                <a class="nav-link" href="/mari-tanam">
                                    <span class="nav-link-title">
                                        Mari Tanam
                                    </span>
                                </a>
                            </li>
                            <?php /*}*/ ?>

                            <?php

                            // use App\Models\No_wa_model;

                            // $this->No_waModel = new No_wa_model();
                            // $no = $this->No_waModel->find(1); 
                            ?>

                            <!-- <li class="nav-item">
                                <a class="nav-link" href="https://api.whatsapp.com/send?phone=<?php /*$no['no_wa'] */ ?>" target="_blank">
                                    <span class="nav-link-title">
                                        Hubungi Kami
                                    </span>
                                </a>
                            </li> -->
                        </ul>

                    </div>
                </div>
            </div>
        </div>

        <!-- <div style="position: fixed; bottom: 50px; right: 50px; z-index: 99;">
            <a href="https://api.whatsapp.com/send?phone=<?php /* $no['no_wa']*/ ?>" target="_blank" rel="noopener">
                <img src="<?php /* base_url('set_admin/WA-logo@65x.png');*/ ?>" width="65" height="66" alt="Hubungi Kami Melalui WhatsApp"></a>
            </a>
            </a>
        </div> -->

        <div class="page-wrapper">

            <?= $this->renderSection('content_user'); ?>

            <footer class="footer footer-transparent d-print-none">
                <div class="container-xl">
                    <div class="row text-center align-items-center flex-row-reverse">

                        <div class="col-lg-auto ms-lg-auto">
                        </div>

                        <div class="col-12 col-lg-auto mt-3 mt-lg-0">
                            <ul class="list-inline list-inline-dots mb-0">
                                <li class="list-inline-item">
                                    Copyright &copy; RWM 2022
                                </li>
                            </ul>
                        </div>

                    </div>
                </div>
            </footer>

        </div>

    </div>

    <!-- Libs JS -->
    <script src="<?= base_url() ?>/assets/users/libs/apexcharts/dist/apexcharts.min.js"></script>
    <script src="<?= base_url() ?>/assets/users/libs/jsvectormap/dist/js/jsvectormap.min.js"></script>
    <script src="<?= base_url() ?>/assets/users/libs/jsvectormap/dist/maps/world.js"></script>
    <script src="<?= base_url() ?>/assets/users/libs/jsvectormap/dist/maps/world-merc.js"></script>
    <!-- Tabler Core -->
    <script src="<?= base_url() ?>/assets/users/js/tabler.min.js"></script>
    <script src="<?= base_url() ?>/assets/users/js/demo.min.js"></script>
</body>

</html>