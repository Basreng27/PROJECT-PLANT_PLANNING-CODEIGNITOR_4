<?= $this->extend('Pages\Static\Layout_users\layout_users'); ?>

<?= $this->section('content_user'); ?>
<div class="container-xl">
    <div class="page-header d-print-none">
        <div class="row g-2 align-items-center">
            <div class="col">
                <h2 class="page-title">
                    Cara Budidaya <?= $data_artikel[0]['nama_tanaman']; ?>
                </h2>
            </div>
        </div>
    </div>
</div>

<div class="page-body">
    <div class="container-xl">
        <img src="<?= base_url(); ?>/tanam/<?= $data_artikel[0]['image_tanaman']; ?>">
        <?= $data_artikel[0]['isi_budidaya']; ?>
    </div>
</div>
<?= $this->endSection(); ?>