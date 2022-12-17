<?= $this->extend('Pages\Static\Layout_admins\layout_admins'); ?>

<?= $this->section('content_admin'); ?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Setting Dashboard</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <?php if (session()->getFlashdata('berhasilUpdate')) { ?>
        <div class="alert alert-success" role="alert">
            Data Berhasil diupdate
        </div>
    <?php } ?>

    <?php if (session()->getFlashdata('gagal')) { ?>
        <div class="alert alert-danger" role="alert">
            Data gagal diupdate
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
                            <h3 class="card-title">Nomor Admin</h3>
                        </div>

                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Picture Dashboard</th>
                                        <th>Logo</th>
                                        <th>Deskripsi</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php $no = 1;
                                    foreach ($data_set_dashboard as $data) : ?>
                                        <tr>
                                            <td><?= $no++; ?></td>
                                            <td><img src="/set_admin/<?= $data['picture_dashboard'] ?>" class="image" width="80" height="60"></td>
                                            <td><img src="/set_admin/<?= $data['logo'] ?>" class="image" width="80" height="60"></td>
                                            <td><?= $data['deskripsi']; ?></td>
                                            <td>
                                                <a href="#" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#modal-keranjang" data-toggle="modal" data-target="#modal-edit<?= $data['id_set_dashboard']; ?>">Edit</a>
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

<?php foreach ($data_set_dashboard as $data_dashboard) : ?>
    <div class="modal fade" id="modal-edit<?= $data_dashboard['id_set_dashboard']; ?>">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Setting Dashboard</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form action="/update-set-dashboard" method="POST" enctype="multipart/form-data">
                    <div class="modal-body">
                        <input type="hidden" name="id_set_dashboard" value="<?= $data_dashboard['id_set_dashboard']; ?>">

                        <div class="form-group">
                            <label>Picture Admin</label>
                            <div class="custom-file">
                                <input type="hidden" name="picture_lama" value="<?= $data_dashboard['picture_dashboard']; ?>">
                                <input type="file" class="custom-file-input <?= ($validation->hasError('picture_dashboard')) ? 'is-invalid' : ''; ?>" id="exampleInputFile" name="picture_dashboard" onchange="prevGambar()">
                                <div class="invalid-feedback"><?= $validation->getError('picture_dashboard'); ?></div>
                                <label class="custom-file-label" for="exampleInputFile">Pilih file untuk diupdate</label>
                            </div>
                            <img src="/set_admin/<?= $data_dashboard['picture_dashboard']; ?>" class="img-thumbnail img-preview">
                        </div>

                        <div class="form-group">
                            <label>Logo</label>
                            <div class="custom-file">
                                <input type="hidden" name="logo_lama" value="<?= $data_dashboard['logo']; ?>">
                                <input type="file" class="custom-file-input <?= ($validation->hasError('logo')) ? 'is-invalid' : ''; ?>" id="exampleInputFile" name="logo" onchange="prevGambar()">
                                <div class="invalid-feedback"><?= $validation->getError('logo'); ?></div>
                                <label class="custom-file-label" for="exampleInputFile">Pilih file untuk diupdate</label>
                            </div>
                            <img src="/set_admin/<?= $data_dashboard['logo']; ?>" class="img-thumbnail img-preview">
                        </div>

                        <div class="form-group">
                            <label>Deskripsi</label>
                            <textarea class="form-control <?= ($validation->hasError('deskripsi')) ? 'is-invalid' : ''; ?>" rows="3" placeholder="Masukan deskripsi ..." value="<?= old('deskripsi'); ?>" name="deskripsi"><?= $data_dashboard['deskripsi']; ?></textarea>
                            <div class="invalid-feedback"><?= $validation->getError('deskripsi'); ?></div>
                        </div>

                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
<?php endforeach ?>
<?= $this->endSection(); ?>