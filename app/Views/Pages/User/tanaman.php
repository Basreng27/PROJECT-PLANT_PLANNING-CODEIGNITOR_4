<?= $this->extend('Pages\Static\Layout_users\layout_users'); ?>

<?= $this->section('content_user'); ?>
<div class="container-xl">
    <div class="page-header d-print-none">
        <div class="row g-2 align-items-center">
            <div class="col">
                <h2 class="page-title">
                    Tanaman
                </h2>
            </div>
        </div>
    </div>
</div>

<?php /*if (session()->getFlashdata('gagal')) { ?>
    <div class="alert alert-danger" role="alert">
        Gagal ditambahkan ke Keranjang
    </div>
<?php } ?>

<?php if (session()->getFlashdata('gagalSisa')) { ?>
    <div class="alert alert-danger" role="alert">
        Gagal dikarenakan jumlah yang diinginkan melebihi sisa product
    </div>
<?php } */ ?>

<div class="page-body">
    <div class="container-xl">
        <div class="row row-cards">
            <?php foreach ($data_tanaman as $tanaman) : ?>
                <div class="col-md-6 col-lg-3">
                    <div class="card">
                        <div class="card-img-top img-responsive img-responsive-21x9" style="background-image: url(tanam/<?= $tanaman['image_tanaman']; ?>)"></div>
                        <div class="card-body">
                            <h3 class="card-title"><?= $tanaman['nama_tanaman']; ?></h3>
                            <p class="text-muted"><?= $tanaman['keterangan']; ?></p>
                        </div>
                        <div class="card-footer">
                            <a href="/article/<?= $tanaman['id_tanaman']; ?>" class="btn btn-primary">Article</a>
                            <a href="/cara/<?= $tanaman['id_tanaman']; ?>" class="btn btn-primary">Cara Budidaya</a>
                        </div>
                    </div>
                </div>
            <?php endforeach ?>
        </div>
    </div>
</div>

<!-- <div class="modal modal-blur fade" id="modal-belum-login" tabindex="-1" role="dialog" aria-hidden="true">
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
</div> -->
<?= $this->endSection(); ?>