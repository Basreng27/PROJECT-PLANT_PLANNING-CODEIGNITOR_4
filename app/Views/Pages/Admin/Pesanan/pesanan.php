<?= $this->extend('Pages\Static\Layout_admins\layout_admins'); ?>

<?= $this->section('content_admin'); ?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Pesanan</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <?php if (session()->getFlashdata('berhasil')) { ?>
        <div class="alert alert-success" role="alert">
            Pesanan Berhasil disetujui, silahkan balas chat yang telah masuk
        </div>
    <?php } ?>

    <?php if (session()->getFlashdata('berhasilTolak')) { ?>
        <div class="alert alert-success" role="alert">
            Pesanan Berhasil ditolak
        </div>
    <?php } ?>

    <?php if (session()->getFlashdata('gagalTolak')) { ?>
        <div class="alert alert-danger" role="alert">
            Pesanan gagal ditolak
        </div>
    <?php } ?>

    <?php if (session()->getFlashdata('gagal')) { ?>
        <div class="alert alert-danger" role="alert">
            Pesanan gagal diteruskan karena jumlah pembelian melebihi sisa product
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
                            <h3 class="card-title">Data Pesanan</h3>
                        </div>

                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Kode</th>
                                        <th>Nama Pembeli</th>
                                        <th>Product Madu</th>
                                        <th>Jumlah dibeli</th>
                                        <th>Total Harga</th>
                                        <th>Alamat / Lokasi COD</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php $no = 1;
                                    foreach ($data_checkout as $data) : ?>
                                        <tr>
                                            <td><?= $no++; ?></td>
                                            <td><?= $data['id_keranjang']; ?></td>
                                            <td><?= $data['nama']; ?></td>
                                            <td><?= $data['nama_madu']; ?></td>
                                            <td><?= $data['jumlah']; ?></td>
                                            <td><?= $data['total']; ?></td>
                                            <td><?= $data['lokasi']; ?></td>
                                            <td>
                                                <?php if ($data['status'] == 'Setuju') { ?>
                                                    <a href="#" class="btn btn-success">Setuju</a>
                                                <?php } elseif ($data['status'] == 'Tolak') { ?>
                                                    <a href="#" class="btn btn-danger">Tolak</a>
                                                <?php } else { ?>
                                                    <a href="/admin-setuju/<?= $data['id_checkout']; ?>" class="btn btn-success">Setuju</a>
                                                    ||
                                                    <a href="#" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modal-keranjang" data-toggle="modal" data-target="#modal-delete<?= $data['id_checkout']; ?>">Tolak</a>
                                                <?php } ?>
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

<?php foreach ($data_checkout as $checkoutdel) : ?>
    <div class="modal fade" id="modal-delete<?= $checkoutdel['id_checkout']; ?>">
        <div class="modal-dialog modal-lg">
            <div class="modal-content bg-danger">
                <div class="modal-header">
                    <h4 class="modal-title">Tolak Pesanan</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form action="/admin-tolak" method="POST">
                    <div class="modal-body">
                        <input type="hidden" name="id_checkout" value="<?= $checkoutdel['id_checkout']; ?>">
                        Apakah kamu yakin akan <strong>menolak</strong> pesanan atas nama <?= $checkoutdel['nama']; ?>?

                        <div class="form-group">
                            <label>keterangan</label>
                            <textarea class="form-control <?= ($validation->hasError('keterangan')) ? 'is-invalid' : ''; ?>" rows="3" placeholder="Masukan Keterangan ..." value="<?= old('keterangan'); ?>" name="keterangan"></textarea>
                            <div class="invalid-feedback"><?= $validation->getError('keterangan'); ?></div>
                        </div>
                    </div>

                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Tolak</button>
                    </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
<?php endforeach ?>
<?= $this->endSection(); ?>