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
                                <?php $no = 1;
                                foreach ($data_tanaman as $tanaman) : ?>
                                    <tr>
                                        <td><?= $no++; ?></td>
                                        <td> <span class="avatar me-2" style="background-image: url(tanam/<?= $tanaman['image_tanaman']; ?>)"></span></td>
                                        <td><?= $tanaman['nama_tanaman']; ?></td>
                                        <td><?= $tanaman['lama']; ?> <?= $tanaman['waktu']; ?></td>
                                        <td>
                                            <?php if (session()->get('stat') == 'login-admin' || session()->get('stat') == 'login-user') {  ?>
                                                <a href="#" class="btn" title="Klik Untuk Melihat Cara Budidaya" data-bs-toggle="modal" data-bs-target="#modal-mari">Budidaya</a>
                                            <?php } else { ?>
                                                <a href="#" class="btn" title="Klik Untuk Melihat Cara Budidaya" data-bs-toggle="modal" data-bs-target="#modal-belum-login">Budidaya</a>
                                            <?php } ?>
                                        </td>
                                    </tr>
                                <?php endforeach ?>
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

<div class="modal modal-blur fade" id="modal-belum-login" tabindex="-1" role="dialog" aria-hidden="true">
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
                <h3>Belum Login?</h3>
                <div class="text-muted">Anda Harus Login!!</div>
            </div>
            <div class="modal-footer">
                <div class="w-100">
                    <div class="row">
                        <div class="col">
                            <a href="#" class="btn w-100" data-bs-dismiss="modal">Cancel</a>
                        </div>
                        <div class="col">
                            <a href="/login" class="btn btn-info w-100">Login</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>