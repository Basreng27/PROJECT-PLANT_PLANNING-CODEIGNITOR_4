<?= $this->extend('Pages\Static\Layout_users\layout_users'); ?>

<?= $this->section('content_user'); ?>
<div class="container-xl">
    <!-- Page title -->
    <div class="page-header d-print-none">
        <div class="row g-2 align-items-center">
            <div class="col">
                <h2 class="page-title">
                    Detail Buah
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
                                    <th>Image</th>
                                    <th>Nama Tanaman</th>
                                    <th>Pemberian Pupuk 1</th>
                                    <th>Pemberian Pupuk 2</th>
                                    <th>Pemberian Pupuk 3</th>
                                    <th>Status</th>
                                </tr>
                            </thead>

                            <tbody>
                                <tr>
                                    <td>
                                        <span class="avatar me-2" style="background-image: url(tanam/tanaman1.jpg)"></span>
                                    </td>
                                    <td>Buah</td>
                                    <td><button class="btn btn-primary">Diberikan</button></td>
                                    <td><button class="btn btn-danger">Terlambat</button></td>
                                    <td><button class="btn btn-primary">Diberikan</button> <button class="btn btn-danger">Tidak</button></td>
                                    <td>Dalam Masa Budidaya</td>
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