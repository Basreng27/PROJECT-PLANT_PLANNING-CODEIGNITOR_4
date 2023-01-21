<?= $this->extend('Pages\Static\Layout_admins\layout_admins'); ?>

<?= $this->section('content_admin'); ?>

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Tanaman</h1>
                </div>
            </div>
        </div>
    </div>

    <?php if (session()->getFlashdata('berhasil')) { ?>
        <div class="alert alert-success" role="alert">
            Tanaman Berhasil ditambahkan
        </div>
    <?php } ?>

    <?php if (session()->getFlashdata('berhasilUpdate')) { ?>
        <div class="alert alert-success" role="alert">
            Tanaman Berhasil diupdate
        </div>
    <?php } ?>

    <?php if (session()->getFlashdata('delete')) { ?>
        <div class="alert alert-success" role="alert">
            Tanaman Berhasil didelete
        </div>
    <?php } ?>

    <?php if (session()->getFlashdata('gagal')) { ?>
        <div class="alert alert-danger" role="alert">
            Tanaman gagal ditambahkan
        </div>
    <?php }  ?>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Data Tanaman</h3>
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-lg" style="float: right">
                                Tambah Tanaman
                            </button>
                        </div>

                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Tanaman</th>
                                        <th>Image</th>
                                        <th>Waktu</th>
                                        <th>Pupuk</th>
                                        <th>Musim</th>
                                        <th>Article</th>
                                        <th>Cara Budidaya</th>
                                        <th>Keterangan</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php $no = 1;
                                    foreach ($data_tanamans as $tanaman) : ?>
                                        <tr>
                                            <td><?= $no++; ?></td>
                                            <td><?= $tanaman['nama_tanaman']; ?></td>
                                            <td><img src="/tanam/<?= $tanaman['image_tanaman']; ?>" class="image" width="80" height="60"></td>
                                            <td><?= $tanaman['lama']; ?> <?= $tanaman['waktu']; ?></td>
                                            <td><a href="/tanaman-pupuk/<?= $tanaman['id_tanaman_tanaman']; ?>" class="btn btn-info">Pupuk</a></td>
                                            <td><?= $tanaman['musim']; ?></td>
                                            <?php if (!empty($tanaman['isi_artikel'])) { ?>
                                                <td><a href="/tanaman-artikel/<?= $tanaman['id_tanaman_tanaman']; ?>" class="btn btn-info">Edit Article</a></td>
                                            <?php } else { ?>
                                                <td><a href="/tanaman-artikel/<?= $tanaman['id_tanaman_tanaman']; ?>" class="btn btn-info">Tambah Article</a></td>
                                            <?php } ?>

                                            <?php if (!empty($tanaman['isi_budidaya'])) { ?>
                                                <td><a href="/tanaman-budidaya/<?= $tanaman['id_tanaman_tanaman']; ?>" class="btn btn-info">Edit Budidaya</a></td>
                                            <?php } else { ?>
                                                <td><a href="/tanaman-budidaya/<?= $tanaman['id_tanaman_tanaman']; ?>" class="btn btn-info">Tambah Budidaya</a></td>
                                            <?php } ?>
                                            <td><?= $tanaman['keterangan']; ?></td>
                                            <td>
                                                <a href="#" class="btn btn-info" data-bs-toggle="modal" data-toggle="modal" data-target="#modal-edit<?= $tanaman['id_tanaman_tanaman']; ?>">Edit</a>
                                                ||
                                                <a href="#" class="btn btn-danger" data-bs-toggle="modal" data-toggle="modal" data-target="#modal-delete<?= $tanaman['id_tanaman_tanaman']; ?>">Delete</a>
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
    </section>
</div>

<div class="modal fade" id="modal-lg">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah Tanaman</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form action="/tambah-tanaman" method="POST" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Nama Tanaman</label>
                        <input type="text" class="form-control <?= ($validation->hasError('nama_tanaman')) ? 'is-invalid' : ''; ?>" id="exampleInputEmail1" name="nama_tanaman" value="<?= old('nama_tanaman'); ?>" autofocus>
                        <div class="invalid-feedback"><?= $validation->getError('nama_tanaman');  ?></div>
                    </div>

                    <div class="form-group">
                        <label>Image</label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input <?= ($validation->hasError('image_tanaman')) ? 'is-invalid' : '';  ?>" id="exampleInputFile" name="image_tanaman" onchange="prevGambar()">
                            <div class="invalid-feedback"><?= $validation->getError('image_tanaman'); ?></div>
                            <label class="custom-file-label" for="exampleInputFile">Pilih file</label>
                        </div>
                        <img src="/products/default.jpg" class="img-thumbnail img-preview">
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-8">
                                <label>Waktu</label>
                            </div>
                            <div class="col-sm-4">
                                <label for="exampleInputEmail1">Ditanam dimusim</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4">
                                <input type="number" class="form-control <?= ($validation->hasError('lama')) ? 'is-invalid' : ''; ?>" id="exampleInputEmail1" name="lama" value="<?= old('lama'); ?>" autofocus>
                                <div class="invalid-feedback"><?= $validation->getError('lama');  ?></div>
                            </div>
                            <div class="col-sm-4">
                                <select class="custom-select" name="waktu">
                                    <option value="Hari">Hari</option>
                                    <option value="Minggu">Minggu</option>
                                    <option value="Bulan">Bulan</option>
                                    <option value="Tahun">Tahun</option>
                                </select>
                            </div>
                            <div class="col-sm-4">
                                <select class="custom-select" name="musim">
                                    <option value="Semua">Semua Musim</option>
                                    <option value="Hujan">Hujan</option>
                                    <option value="Kemarau">Kemarau</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">keterangan</label>
                            <textarea class="form-control" rows="3" placeholder="Masukan Keterangan ..." value="<?= old('keterangan'); ?>" name="keterangan"></textarea>
                        </div>
                    </div>
                </div>

                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Tambahkan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php foreach ($data_tanamans as $tanamane) : ?>
    <div class="modal fade" id="modal-edit<?= $tanamane['id_tanaman_tanaman']; ?>">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Tambah Tanaman</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form action="/tambah-tanaman" method="POST" enctype="multipart/form-data">
                    <div class="modal-body">
                        <input type="hidden" name="id_tanaman" value="<?= $tanamane['id_tanaman_tanaman']; ?>">

                        <div class="form-group">
                            <label for="exampleInputEmail1">Nama Tanaman</label>
                            <input type="text" class="form-control <?= ($validation->hasError('nama_tanaman')) ? 'is-invalid' : ''; ?>" id="exampleInputEmail1" name="nama_tanaman" value="<?= !empty($tanamane['nama_tanaman']) ? $tanamane['nama_tanaman'] : '' ?>" placeholder="Enter email" autofocus>
                            <div class="invalid-feedback"><?= $validation->getError('nama_tanaman');  ?></div>
                        </div>

                        <div class="form-group">
                            <label>Image</label>
                            <div class="custom-file">
                                <input type="hidden" name="image_tanaman_lama" value="<?= $tanamane['image_tanaman']; ?>">
                                <input type="file" class="custom-file-input <?= ($validation->hasError('image_tanaman')) ? 'is-invalid' : ''; ?>" id="exampleInputFile" name="image_tanaman" onchange="prevGambar()">
                                <div class="invalid-feedback"><?= $validation->getError('image_tanaman'); ?></div>
                                <label class="custom-file-label" for="exampleInputFile">Pilih file untuk diupdate</label>
                            </div>
                            <img src="/set_admin/<?= $tanamane['image_tanaman']; ?>" class="img-thumbnail img-preview">
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-8">
                                    <label>Waktu</label>
                                </div>
                                <div class="col-sm-4">
                                    <label for="exampleInputEmail1">Ditanam dimusim</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-4">
                                    <input type="number" class="form-control <?= ($validation->hasError('lama')) ? 'is-invalid' : ''; ?>" id="exampleInputEmail1" name="lama" value="<?= !empty($tanamane['lama']) ? $tanamane['lama'] : '' ?>" autofocus>
                                    <div class="invalid-feedback"><?= $validation->getError('lama');  ?></div>
                                </div>
                                <div class="col-sm-4">
                                    <select class="custom-select" name="waktu">
                                        <option value="<?= !empty($tanamane['waktu']) ? $tanamane['waktu'] : '' ?>"><?= !empty($tanamane['waktu']) ? $tanamane['waktu'] : '' ?></option>
                                        <option value="Hari">Hari</option>
                                        <option value="Minggu">Minggu</option>
                                        <option value="Bulan">Bulan</option>
                                        <option value="Tahun">Tahun</option>
                                    </select>
                                </div>
                                <div class="col-sm-4">
                                    <select class="custom-select" name="musim">
                                        <option value="<?= !empty($tanamane['musim']) ? $tanamane['musim'] : '' ?>"><?= !empty($tanamane['musim']) ? $tanamane['musim'] : '' ?></option>
                                        <option value="Semua">Semua Musim</option>
                                        <option value="Hujan">Hujan</option>
                                        <option value="Kemarau">Kemarau</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Keterangan</label>
                                <textarea class="form-control <?= ($validation->hasError('keterangan')) ? 'is-invalid' : ''; ?>" rows="3" placeholder="Masukan keterangan ..." value="<?= old('keterangan'); ?>" name="keterangan"><?= $tanamane['keterangan']; ?></textarea>
                                <div class="invalid-feedback"><?= $validation->getError('keterangan'); ?></div>
                            </div>

                            <div class="modal-footer justify-content-between">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php endforeach ?>

<?php foreach ($data_tanamans as $tanamandel) : ?>
    <div class="modal fade" id="modal-delete<?= $tanamandel['id_tanaman_tanaman']; ?>">
        <div class="modal-dialog modal-lg">
            <div class="modal-content bg-danger">
                <div class="modal-header">
                    <h4 class="modal-title">Delete Tanaman</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form action="/delete-tanaman" method="POST">
                    <div class="modal-body">
                        <input type="hidden" name="id_tanaman" value="<?= $tanamandel['id_tanaman_tanaman']; ?>">
                        Apakah kamu yakin akan <strong>menghapus</strong> tanaman <?= $tanamandel['nama_tanaman']; ?>?
                    </div>

                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Tidak</button>
                        <button type="submit" class="btn btn-primary">Ya</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php endforeach ?>
<?= $this->endSection(); ?>