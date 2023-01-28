<?= $this->extend('Pages\Static\Layout_admins\layout_admins'); ?>

<?= $this->section('content_admin'); ?>

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Pupuk Tanaman</h1>
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
                                <!-- <button id="add" class="btn btn-primary">Tambah</button> -->
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-lg" style="float: right">
                                    Tambah Pupuk
                                </button>
                            </div>
                        </div>

                        <?php foreach ($data_pupuk  as $pupuk) : ?>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-3">
                                        Pupuk Ke :
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
                                        <input type="number" class="form-control" value="<?= $pupuk['pupuk_ke']; ?>" readonly>
                                    </div>
                                    <div class="col-sm-3">
                                        <input type="number" class="form-control" value="<?= $pupuk['lama_pupuk']; ?>" readonly>
                                    </div>
                                    <div class="col-sm-3">
                                        <select class="custom-select" name="waktu_pupuk">
                                            <option value="<?= $pupuk['waktu_pupuk']; ?>"><?= $pupuk['waktu_pupuk']; ?></option>
                                            <option value="Hari">Hari</option>
                                            <option value="Minggu">Minggu</option>
                                            <option value="Bulan">Bulan</option>
                                            <option value="Tahun">Tahun</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-3">
                                        <a href="#" class="btn btn-info" data-bs-toggle="modal" data-toggle="modal" data-target="#modal-edit<?= $pupuk['id_pupuk']; ?>">Edit</a>
                                        ||
                                        <a href="#" class="btn btn-danger" data-bs-toggle="modal" data-toggle="modal" data-target="#modal-delete<?= $pupuk['id_pupuk']; ?>">Delete</a>
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
                <h4 class="modal-title">Tambah Pupuk</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form action="/tambah-pupuk" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="id_tanaman" value="<?= $id_tanaman; ?>">

                <div class="modal-body">
                    <div class="modal-body">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-6">
                                    <label>Lama</label>
                                    <input type="number" class="form-control" name="lama_pupuk" autofocus required>
                                </div>
                                <div class="col-sm-6">
                                    <label>Waktu</label>
                                    <select class="custom-select" name="waktu_pupuk">
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

<?php foreach ($data_pupuk as $pupuke) : ?>
    <div class="modal fade" id="modal-edit<?= $pupuke['id_pupuk']; ?>">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Edit Pupuk</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form action="/tambah-pupuk" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="id_tanaman" value="<?= $pupuke['id_tanaman']; ?>">
                    <input type="hidden" name="id_pupuk" value="<?= $pupuke['id_pupuk']; ?>">
                    <div class="modal-body">
                        <div class="modal-body">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <input type="number" class="form-control" name="pupuk_ke" value="<?= $pupuke['pupuk_ke']; ?>" autofocus required>
                                    </div>
                                    <div class="col-sm-4">
                                        <input type="number" class="form-control" name="lama_pupuk" value="<?= $pupuke['lama_pupuk']; ?>" required>
                                    </div>
                                    <div class="col-sm-4">
                                        <select class="custom-select" name="waktu_pupuk">
                                            <option value="<?= $pupuke['waktu_pupuk']; ?>"><?= $pupuke['waktu_pupuk']; ?></option>
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


<?php foreach ($data_pupuk as $tpupukdel) : ?>
    <div class="modal fade" id="modal-delete<?= $tpupukdel['id_pupuk']; ?>">
        <div class="modal-dialog modal-lg">
            <div class="modal-content bg-danger">
                <div class="modal-header">
                    <h4 class="modal-title">Delete Pupuk</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form action="/delete-pupuk" method="POST">
                    <div class="modal-body">
                        <input type="hidden" name="id_pupuk" value="<?= $tpupukdel['id_pupuk']; ?>">
                        Apakah kamu yakin akan <strong>menghapus</strong> Pupuk Ke-<?= $tpupukdel['pupuk_ke']; ?>?
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