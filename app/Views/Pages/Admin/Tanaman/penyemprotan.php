<?= $this->extend('Pages\Static\Layout_admins\layout_admins'); ?>

<?= $this->section('content_admin'); ?>

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Penyemprotan Tanaman</h1>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card card-outline card-info">
                            <div class="card-body">
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-lg" style="float: right">
                                    Tambah Penyemprotan
                                </button>
                            </div>
                        </div>

                        <?php foreach ($data_semprot  as $semprot) : ?>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-3">
                                        Penyemprotan Ke :
                                    </div>
                                    <div class="col-sm-3">
                                        Setelah Tanaman ditanam :
                                    </div>
                                    <div class="col-sm-3">
                                    </div>
                                    <div class="col-sm-3">
                                        Action :
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-3">
                                        <input type="number" class="form-control" value="<?= $semprot['semprot_ke']; ?>" readonly>
                                    </div>
                                    <div class="col-sm-3">
                                        <input type="number" class="form-control" value="<?= $semprot['lama']; ?>" readonly>
                                    </div>
                                    <div class="col-sm-3">
                                        <select class="custom-select" name="waktu">
                                            <option value="<?= $semprot['waktu']; ?>"><?= $semprot['waktu']; ?></option>
                                            <option value="Hari">Hari</option>
                                            <option value="Minggu">Minggu</option>
                                            <option value="Bulan">Bulan</option>
                                            <option value="Tahun">Tahun</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-3">
                                        <a href="#" class="btn btn-info" data-bs-toggle="modal" data-toggle="modal" data-target="#modal-edit<?= $semprot['id']; ?>">Edit</a>
                                        ||
                                        <a href="#" class="btn btn-danger" data-bs-toggle="modal" data-toggle="modal" data-target="#modal-delete<?= $semprot['id']; ?>">Delete</a>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach ?>

                        <div class="modal-footer justify-content-between">
                            <a href="/admin-tanaman" type="button" class="btn btn-default" data-dismiss="modal">Back</a>
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
                <h4 class="modal-title">Tambah Penyemprotan</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form action="/tambah-semprot" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="id_tanaman" value="<?= $id_tanaman; ?>">

                <div class="modal-body">
                    <div class="modal-body">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-6">
                                    <label>Lama</label>
                                    <input type="number" class="form-control" name="lama" autofocus required>
                                </div>
                                <div class="col-sm-6">
                                    <label>Waktu</label>
                                    <select class="custom-select" name="waktu">
                                        <option value="Hari">Hari</option>
                                        <option value="Minggu">Minggu</option>
                                        <option value="Bulan">Bulan</option>
                                        <option value="Tahun">Tahun</option>
                                    </select>
                                </div>
                            </div>
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

<?php foreach ($data_semprot as $semprote) : ?>
    <div class="modal fade" id="modal-edit<?= $semprote['id']; ?>">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Edit Penyemprotan</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form action="/tambah-semprot" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="id_tanaman" value="<?= $semprote['id_tanaman']; ?>">
                    <input type="hidden" name="id" value="<?= $semprote['id']; ?>">
                    <div class="modal-body">
                        <div class="modal-body">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <input type="number" class="form-control" name="semprot_ke" value="<?= $semprote['semprot_ke']; ?>" autofocus required>
                                    </div>
                                    <div class="col-sm-4">
                                        <input type="number" class="form-control" name="lama" value="<?= $semprote['lama']; ?>" required>
                                    </div>
                                    <div class="col-sm-4">
                                        <select class="custom-select" name="waktu">
                                            <option value="<?= $semprote['waktu']; ?>"><?= $semprote['waktu']; ?></option>
                                            <option value="Hari">Hari</option>
                                            <option value="Minggu">Minggu</option>
                                            <option value="Bulan">Bulan</option>
                                            <option value="Tahun">Tahun</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php endforeach ?>


<?php foreach ($data_semprot as $tsemprotdel) : ?>
    <div class="modal fade" id="modal-delete<?= $tsemprotdel['id']; ?>">
        <div class="modal-dialog modal-lg">
            <div class="modal-content bg-danger">
                <div class="modal-header">
                    <h4 class="modal-title">Delete Penyemprotan</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form action="/delete-semprot" method="POST">
                    <div class="modal-body">
                        <input type="hidden" name="id" value="<?= $tsemprotdel['id']; ?>">
                        Apakah kamu yakin akan <strong>menghapus</strong> Penyemprotan Ke-<?= $tsemprotdel['semprot_ke']; ?>?
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