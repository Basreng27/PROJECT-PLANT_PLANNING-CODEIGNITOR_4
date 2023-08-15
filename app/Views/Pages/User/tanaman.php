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

<?= $this->endSection(); ?>