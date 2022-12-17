<?= $this->extend('Pages\Static\Layout_users\layout_users'); ?>

<?= $this->section('content_user'); ?>
<div class="container-xl">
    <!-- Page title -->
    <div class="page-header d-print-none">
        <div class="row g-2 align-items-center">
            <div class="col">
                <h2 class="page-title">
                    Mari Tanam
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
                                    <th>Waktu</th>
                                    <th>Cara / Budidaya</th>
                                </tr>
                            </thead>

                            <tbody>
                                <tr>
                                    <td> 1</td>
                                    <td>
                                        <span class="avatar me-2" style="background-image: url(tanam/tanaman1.jpg)"></span>
                                    </td>
                                    <td>Buah</td>
                                    <td>4 Minggu</td>
                                    <td>
                                        <a href="/cara" class="btn" title="Budidaya">Cara</a>
                                        <a href="#" class="btn" title="Klik Untuk Melihat Cara Budidaya" data-bs-toggle="modal" data-bs-target="#modal-mari">Budidaya</a>
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

<div class="modal modal-blur fade" id="modal-mari" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">

            <form action="/save-tanam" method="POST">
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Nama Tanaman</label>
                        <input type="text" class="form-control" name="nama" value="Buah" readonly>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Waktu</label>
                        <input type="text" class="form-control" name="nama_madu" value="4 Minggu" readonly>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Dari Tangal</label>
                        <input type="date" class="form-control" name="jumlah" readonly>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Perkiraan Panen</label>
                        <input type="date" class="form-control" name="total" readonly>
                    </div>
                </div>

                <div class="modal-footer">
                    <a href="#" class="btn btn-link link-secondary" data-bs-dismiss="modal">Cancel </a>
                    <button type="submit" class="btn btn-primary">Budidaya</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>