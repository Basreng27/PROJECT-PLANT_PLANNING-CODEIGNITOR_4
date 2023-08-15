<?= $this->extend('Pages\Static\Layout_users\layout_users'); ?>
<style>
    .limited-lines {
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }
</style>
<?= $this->section('content_user'); ?>

<div class="page-body">
    <div class="container-xl">
        <div class="row row-cards mb-4">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div id="carousel-default" class="carousel slide" data-bs-ride="carousel">
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <div class="d-flex justify-content-center align-items-center">
                                        <img class="d-block img-fluid" src="set_admin/new1.jpg">
                                    </div>
                                </div>

                                <div class="carousel-item">
                                    <div class="d-flex justify-content-center align-items-center">
                                        <img class="d-block img-fluid" src="set_admin/new2.jpg">
                                    </div>
                                </div>

                                <div class="carousel-item">
                                    <div class="d-flex justify-content-center align-items-center">
                                        <img class="d-block img-fluid" src="set_admin/new3.jpg">
                                    </div>
                                </div>

                                <div class="carousel-item">
                                    <div class="d-flex justify-content-center align-items-center">
                                        <img class="d-block img-fluid" src="set_admin/new4.jpg">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <h1>Tanaman Yang Tersedia :</h1>

                <div class="row">
                    <?php foreach ($data_tanaman as $key => $tanaman) : ?>
                        <div class="col-md-4 mb-4">
                            <div class="card" style="border: 1px solid #ccc; padding: 10px; border-radius: 5px;">
                                <div class="card-img-top img-responsive img-responsive-21x9" style="background-image: url(tanam/<?= $tanaman['image_tanaman']; ?>)"></div>
                                <div class="card-body">
                                    <h3 class="card-title"><?= $tanaman['nama_tanaman']; ?></h3>
                                    <p class="text-muted limited-lines"><?= substr($tanaman['keterangan'], 0, 100); ?></p>
                                </div>
                            </div>
                        </div>
                    <?php endforeach ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>