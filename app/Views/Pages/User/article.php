<?= $this->extend('Pages\Static\Layout_users\layout_users'); ?>

<?= $this->section('content_user'); ?>
<div class="container-xl">
    <div class="page-header d-print-none">
        <div class="row g-2 align-items-center">
            <div class="col">
                <h2 class="page-title">
                    Artikel
                </h2>
            </div>
        </div>
    </div>
</div>

<div class="page-body">
    <div class="container-xl">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <img src="<?= base_url() ?>/tanam/<?= $data_artikel[0]['image_tanaman']; ?>">
                    </div>
                    <div class="col-md-6 d-flex align-items-center" style="font-weight: bold;">
                        <h1><?= $data_artikel[0]['nama_tanaman']; ?></h1>
                    </div>
                </div>

                <div>
                    <?= $data_artikel[0]['isi_artikel']; ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>