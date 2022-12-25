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
            Product Berhasil ditambahkan
        </div>
    <?php } ?>

    <?php if (session()->getFlashdata('berhasilUpdate')) { ?>
        <div class="alert alert-success" role="alert">
            Product Berhasil diupdate
        </div>
    <?php } ?>

    <?php if (session()->getFlashdata('delete')) { ?>
        <div class="alert alert-success" role="alert">
            Product Berhasil didelete
        </div>
    <?php } ?>

    <?php if (session()->getFlashdata('gagal')) { ?>
        <div class="alert alert-danger" role="alert">
            Product gagal ditambahkan
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
                                            <td><?= $tanaman['musim']; ?></td>
                                            <?php if (!empty($tanaman['isi_artikel'])) { ?>
                                                <td><a href="#" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#artikel<?= $tanaman['id_artikel']; ?>" data-toggle="modal" data-target="#artikel" class="btn btn-info">Edit Article</a></td>
                                            <?php } else { ?>
                                                <td><a href="#" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#artikel" data-toggle="modal" data-target="#artikel<?= $tanaman['id_tanaman_tanaman']; ?>" class="btn btn-info">Tambah Article</a></td>
                                            <?php } ?>

                                            <?php if (!empty($tanaman['isi_budidaya'])) { ?>
                                                <td><a href="#" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#cara<?= $tanaman['id_budidaya']; ?>" data-toggle="modal" data-target="#cara" class="btn btn-info">Edit Budidaya</a></td>
                                            <?php } else { ?>
                                                <td><a href="#" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#cara" data-toggle="modal" data-target="#cara<?= $tanaman['id_tanaman_tanaman']; ?>" class="btn btn-info">Tambah Budidaya</a></td>
                                            <?php } ?>
                                            <td><?= $tanaman['keterangan']; ?></td>
                                            <td>
                                                <a href="#" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#modal-keranjang" data-toggle="modal" data-target="#modal-edit">Edit</a>
                                                ||
                                                <a href="#" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modal-keranjang" data-toggle="modal" data-target="#modal-delete">Delete</a>
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
                        <input type="text" class="form-control <?= ($validation->hasError('nama_tanaman')) ? 'is-invalid' : ''; ?>" id="exampleInputEmail1" name="nama_tanaman" value="<?= old('nama_tanaman'); ?>" placeholder="Enter email" autofocus>
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

<div class="modal fade" id="cara">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Cara Budidaya Tanaman</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <form action="/tambah-budidaya" method="POST" enctype="multipart/form-data">
                        <div class="card card-outline card-info">
                            <div class="card-body">
                                <textarea id="summernote1" name="isi_budidaya"></textarea>
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
    </div>
</div>

<?php foreach ($data_tanamans as $tanamant) : ?>
    <div class="modal fade" id="artikel<?= $tanamant['id_tanaman_tanaman']; ?>">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Article Tanaman</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <form action="/tambah-artikel" method="POST">
                            <input type="hidden" name="id_tanaman" value="<?= $tanamant['id_tanaman_tanaman']; ?>">
                            <div class="card card-outline card-info">
                                <div class="card-body">
                                    <textarea id="summernote<?= $tanamant['id_tanaman_tanaman']; ?>" name="isi_artikel"></textarea>
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
        </div>
    </div>
<?php endforeach ?>

<?php /* foreach ($data_products as $product) : ?>
    <div class="modal fade" id="modal-edit<?= $product['id_madu']; ?>">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Edit Product</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form action="/update-product" method="POST" enctype="multipart/form-data">
                    <div class="modal-body">
                        <input type="hidden" name="id_madu" value="<?= $product['id_madu']; ?>">

                        <div class="form-group">
                            <label for="exampleInputEmail1">Nama Madu</label>
                            <input type="text" class="form-control <?= ($validation->hasError('nama_madu')) ? 'is-invalid' : ''; ?>" id="exampleInputEmail1" name="nama_madu" value="<?= $product['nama_madu']; ?>" placeholder="Enter email" autofocus>
                            <div class="invalid-feedback"><?= $validation->getError('nama_madu'); ?></div>
                        </div>

                        <div class="form-group">
                            <label>Image</label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input <?= ($validation->hasError('image')) ? 'is-invalid' : ''; ?>" id="exampleInputFile" name="image" onchange="prevGambar()">
                                <input type="hidden" name="image_lama" value="<?= $product['image']; ?>">
                                <div class="invalid-feedback"><?= $validation->getError('image'); ?></div>
                                <label class="custom-file-label" for="exampleInputFile">Pilih file untuk diupdate</label>
                            </div>
                            <img src="/products/<?= $product['image']; ?>" class="img-thumbnail img-preview">
                        </div>

                        <div class="form-group">
                            <label>Deskripsi</label>
                            <textarea class="form-control <?= ($validation->hasError('deskripsi')) ? 'is-invalid' : ''; ?>" rows="3" placeholder="Masukan Deskripsi ..." name="deskripsi"><?= $product['deskripsi']; ?></textarea>
                            <div class="invalid-feedback"><?= $validation->getError('deskripsi'); ?></div>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Harga</label>
                            <input type="number" class="form-control <?= ($validation->hasError('harga')) ? 'is-invalid' : ''; ?>" id="exampleInputEmail1" placeholder="Masukan Harga" value="<?= $product['harga']; ?>" name="harga">
                            <div class="invalid-feedback"><?= $validation->getError('harga'); ?></div>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Sisa Barang</label>
                            <input type="number" class="form-control <?= ($validation->hasError('sisa')) ? 'is-invalid' : ''; ?>" id="exampleInputEmail1" placeholder="Masukan Sisa Barang" value="<?= $product['sisa']; ?>" name="sisa">
                            <div class="invalid-feedback"><?= $validation->getError('sisa'); ?></div>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Stock Barang</label>
                            <input type="number" class="form-control <?= ($validation->hasError('stock')) ? 'is-invalid' : ''; ?>" id="exampleInputEmail1" placeholder="Masukan Stock Barang" value="<?= $product['stock']; ?>" name="stock">
                            <div class="invalid-feedback"><?= $validation->getError('stock'); ?></div>
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

<?php foreach ($data_products as $productdel) : ?>
    <div class="modal fade" id="modal-delete<?= $productdel['id_madu']; ?>">
        <div class="modal-dialog modal-lg">
            <div class="modal-content bg-danger">
                <div class="modal-header">
                    <h4 class="modal-title">Delete Product</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <!-- <form action="/delete-product/<?= $productdel['id_madu']; ?>" method="POST"> -->
                <form action="/delete-product" method="POST">
                    <div class="modal-body">
                        <input type="hidden" name="id_madu" value="<?= $productdel['id_madu']; ?>">
                        Apakah kamu yakin akan <strong>menghapus</strong> product <?= $productdel['nama_madu']; ?>?
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
<?php endforeach */ ?>
<?= $this->endSection(); ?>