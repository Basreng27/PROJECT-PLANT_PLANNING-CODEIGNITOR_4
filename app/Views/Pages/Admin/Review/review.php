<?= $this->extend('Pages\Static\Layout_admins\layout_admins'); ?>

<?= $this->section('content_admin'); ?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Review</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <?php if (session()->getFlashdata('berhasil')) { ?>
        <div class="alert alert-success" role="alert">
            Review Berhasil ditambahkan
        </div>
    <?php } ?>

    <?php if (session()->getFlashdata('berhasilUpdate')) { ?>
        <div class="alert alert-success" role="alert">
            Review Berhasil diupdate
        </div>
    <?php } ?>

    <?php if (session()->getFlashdata('delete')) { ?>
        <div class="alert alert-success" role="alert">
            Review Berhasil didelete
        </div>
    <?php } ?>

    <?php if (session()->getFlashdata('gagal')) { ?>
        <div class="alert alert-danger" role="alert">
            Review gagal ditambahkan
        </div>
    <?php } ?>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Data Review</h3>
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-lg" style="float: right">
                                Tambah Review
                            </button>
                        </div>

                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Gambar</th>
                                        <th>Urutan</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php $no = 1;
                                    foreach ($data_reviews as $data) : ?>
                                        <tr>
                                            <td><?= $no++; ?></td>
                                            <td><img src="/product_review/<?= $data['image_review'] ?>" class="image" width="80" height="60"></td>
                                            <td><?= $data['urutan']; ?></td>
                                            <td>
                                                <a href="#" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#modal-keranjang" data-toggle="modal" data-target="#modal-edit<?= $data['id_review']; ?>">Edit</a>
                                                ||
                                                <a href="#" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modal-keranjang" data-toggle="modal" data-target="#modal-delete<?= $data['id_review']; ?>">Delete</a>
                                                <!-- <a href="#" class="btn" data-bs-toggle="modal" data-bs-target="#modal-danger"> Delete</a> -->
                                            </td>
                                        </tr>
                                    <?php endforeach ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>

<div class="modal fade" id="modal-lg">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah Review</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form action="/tambah-review" method="POST" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-group">
                        <label>Image Review</label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input <?= ($validation->hasError('image_review')) ? 'is-invalid' : ''; ?>" id="exampleInputFile" name="image_review" onchange="prevGambar()">
                            <div class="invalid-feedback"><?= $validation->getError('image_review'); ?></div>
                            <label class="custom-file-label" for="exampleInputFile">Pilih file</label>
                        </div>
                        <img src="/product_review/default.jpg" class="img-thumbnail img-preview">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Urutan</label>
                        <input type="number" class="form-control <?= ($validation->hasError('urutan')) ? 'is-invalid' : ''; ?>" id="exampleInputEmail1" placeholder="Masukan urutan" value="<?= old('urutan'); ?>" name="urutan" maxlength="3">
                        <div class="invalid-feedback"><?= $validation->getError('urutan'); ?></div>
                    </div>
                </div>

                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Tambahkan</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<?php foreach ($data_reviews as $review) : ?>
    <div class="modal fade" id="modal-edit<?= $review['id_review']; ?>">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Edit Review</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form action="/update-review" method="POST" enctype="multipart/form-data">
                    <div class="modal-body">
                        <input type="hidden" name="id_review" value="<?= $review['id_review']; ?>">

                        <div class="form-group">
                            <label>Image Review</label>
                            <div class="custom-file">
                                <input type="hidden" name="image_lama" value="<?= $review['image_review']; ?>">
                                <input type="file" class="custom-file-input <?= ($validation->hasError('image_review')) ? 'is-invalid' : ''; ?>" id="exampleInputFile" name="image_review" onchange="prevGambar()">
                                <div class="invalid-feedback"><?= $validation->getError('image_review'); ?></div>
                                <label class="custom-file-label" for="exampleInputFile">Pilih file untuk diupdate</label>
                            </div>
                            <img src="/product_review/<?= $review['image_review']; ?>" class="img-thumbnail img-preview">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Urutan</label>
                            <input type="number" class="form-control <?= ($validation->hasError('urutan')) ? 'is-invalid' : ''; ?>" id="exampleInputEmail1" placeholder="Masukan Urutan" value="<?= $review['urutan']; ?>" name="urutan" readonly>
                            <div class="invalid-feedback"><?= $validation->getError('urutan'); ?></div>
                        </div>
                    </div>

                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
<?php endforeach ?>

<?php foreach ($data_reviews as $reviewdel) : ?>
    <div class="modal fade" id="modal-delete<?= $reviewdel['id_review']; ?>">
        <div class="modal-dialog modal-lg">
            <div class="modal-content bg-danger">
                <div class="modal-header">
                    <h4 class="modal-title">Delete Review</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form action="/delete-review" method="POST">
                    <div class="modal-body">
                        <input type="hidden" name="id_review" value="<?= $reviewdel['id_review']; ?>">
                        Apakah kamu yakin akan <strong>menghapus</strong> review dengan urutan <?= $reviewdel['urutan']; ?>?
                    </div>

                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Delete</button>
                    </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
<?php endforeach ?>
<?= $this->endSection(); ?>