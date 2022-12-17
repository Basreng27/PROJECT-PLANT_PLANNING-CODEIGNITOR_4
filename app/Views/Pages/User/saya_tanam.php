<?= $this->extend('Pages\Static\Layout_users\layout_users'); ?>

<?= $this->section('content_user'); ?>
<div class="container-xl">
    <!-- Page title -->
    <div class="page-header d-print-none">
        <div class="row g-2 align-items-center">
            <div class="col">
                <h2 class="page-title">
                    Saya Tanam
                </h2>
            </div>
        </div>
    </div>
</div>

<?php /*if (session()->getFlashdata('gagal')) { ?>
    <div class="alert alert-danger" role="alert">
        Product gagal dicheckout
    </div>
<?php } */ ?>

<div class="page-body">
    <div class="container-xl">
        <div class="row row-cards">

            <div class="col-12">
                <div class="card">
                    <div class="table-responsive">
                        <table class="table table-vcenter card-table">

                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Image</th>
                                    <th>Nama Tanaman</th>
                                    <th>Dari</th>
                                    <th>Perkiraan Panen</th>
                                    <th>Status</th>
                                    <th>Lihat Detail</th>
                                </tr>
                            </thead>

                            <tbody>
                                <tr>
                                    <td> 1</td>
                                    <td>
                                        <span class="avatar me-2" style="background-image: url(tanam/tanaman1.jpg)"></span>
                                    </td>
                                    <td>Buah</td>
                                    <td>12 Desember 2022</td>
                                    <td>12 January 2021</td>
                                    <td>Dalam Masa Budidaya</td>
                                    <td>
                                        <a href="/detail" class="btn" title="Klik Untuk Melihat Cara Budidaya">Detail</a>
                                    </td>
                                </tr>
                            </tbody>

                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<?= $this->endSection(); ?>