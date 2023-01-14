<?= $this->extend('Pages\Static\Layout_admins\layout_admins'); ?>

<?= $this->section('content_admin'); ?>

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Artikel Tanaman</h1>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <?php foreach ($data_artikel as $artikel) : ?>
                            <form action="/tambah-artikel" method="POST" enctype="multipart/form-data">
                                <input type="hidden" name="id_artikel" value="<?= $artikel['id_artikel']; ?>">
                                <input type="hidden" name="id_tanaman" value="<?= $artikel['id_tanaman_tanaman']; ?>">
                                <div class="card card-outline card-info">
                                    <div class="card-body">
                                        <textarea id="summernote" name="isi_artikel"><?= $artikel['isi_artikel']; ?></textarea>
                                    </div>
                                </div>
                                <div class="modal-footer justify-content-between">
                                    <a href="/admin-tanaman" type="button" class="btn btn-default" data-dismiss="modal">Back</a>
                                    <button type="submit" class="btn btn-primary">Save</button>
                                </div>
                            </form>
                        <?php endforeach ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<?= $this->endSection(); ?>