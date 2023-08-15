<?= $this->extend('Pages\Static\Layout_users\layout_users'); ?>

<?= $this->section('content_user'); ?>
<div class="container-xl">
    <div class="page-header d-print-none">
        <div class="row g-2 align-items-center">
            <div class="col">
                <h2 class="page-title">
                    Mari Tanam
                </h2>
            </div>
        </div>
    </div>
</div>


<div class="page-body">
    <div class="container-xl">
        <?php if (session()->getFlashdata('dari')) { ?>
            <div class="alert alert-danger" role="alert">
                Dari tanggal tidak boleh kosong
            </div>
        <?php }  ?>

        <?php if (session()->getFlashdata('berhasil')) { ?>
            <div class="alert alert-success" role="alert">
                Data Berhasil di tambahkan, silahkan cek fitur Saya Tanam
            </div>
        <?php }  ?>

        <div class="row row-cards">

            <div class="col-12">
                <div class="card">
                    <div class="table-responsive">
                        <table class="table table-vcenter card-table">

                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Image</th>
                                    <th>Nama Tanaman</th>
                                    <th>Waktu</th>
                                    <th>Cara / Budidaya</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php $no = 1;
                                foreach ($data_tanaman as $tanaman) : ?>
                                    <tr>
                                        <td><?= $no++; ?></td>
                                        <td> <span class="avatar me-2" style="background-image: url(tanam/<?= $tanaman['image_tanaman']; ?>)"></span></td>
                                        <td><?= $tanaman['nama_tanaman']; ?></td>
                                        <td><?= $tanaman['lama']; ?> <?= $tanaman['waktu']; ?></td>
                                        <td>
                                            <?php if (session()->get('stat') == 'login-admin' || session()->get('stat') == 'login-user') {  ?>
                                                <a href="#" class="btn" title="Klik Untuk Melihat Cara Budidaya" data-bs-toggle="modal" data-bs-target="#modal-mari<?= $tanaman['id_tanaman'] ?>">Budidaya</a>
                                            <?php } else { ?>
                                                <a href="#" class="btn" title="Klik Untuk Melihat Cara Budidaya" data-bs-toggle="modal" data-bs-target="#modal-belum-login">Budidaya</a>
                                            <?php } ?>
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
</div>

<?php
foreach ($data_tanaman as $tanamanbud) : ?>
    <div class="modal modal-blur fade" id="modal-mari<?= $tanamanbud['id_tanaman'] ?>" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">

                <form action="/save-tanam" method="POST">
                    <div class="modal-body">
                        <input type="hidden" name="id_tanaman" value="<?= $tanamanbud['id_tanaman']; ?>">
                        <input type="hidden" name="id_user" value="<?= session()->get('id_user') ?>">
                        <div class="mb-3">
                            <label class="form-label">Nama Tanaman</label>
                            <input type="text" class="form-control" name="nama" value="<?= $tanamanbud['nama_tanaman']; ?>" readonly>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Waktu</label>
                            <input type="text" class="form-control" name="nama_madu" value="<?= $tanamanbud['lama']; ?>  <?= $tanamanbud['waktu']; ?>" readonly>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Dari Tangal</label>
                            <input type="date" id="dari-tanggal-<?= $tanamanbud['id_tanaman'] ?>" class="form-control" name="dari_tanggal" onchange="perkiraan(<?= $tanamanbud['id_tanaman'] ?>,'<?= $tanamanbud['waktu'] ?>',<?= $tanamanbud['lama'] ?>)">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Perkiraan Panen</label>
                            <input type="date" id="perkiraan-panen-<?= $tanamanbud['id_tanaman'] ?>" class="form-control" name="perkiraan_panen" value="" readonly>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Jumlah Bibit Yang Ditanam (Satuan Bibit)</label>
                            <input type="number" class="form-control" name="bibit">
                        </div>
                    </div>

                    <div class="modal-footer">
                        <a href="#" class="btn btn-link link-secondary" data-bs-dismiss="modal">Cancel </a>
                        <button type="submit" class="btn btn-primary">Budidaya</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        function perkiraan(id_tanaman, waktu, lama) {
            if (waktu == "Hari") {
                lama = lama;
            } else if (waktu == "Minggu") {
                lama = lama * 7;
            } else if (waktu == "Bulan") {
                lama = lama * 30;
            } else if (waktu == "Tahun") {
                lama = lama * 365;
            } else {
                lama = 0;
            }
            // mengambil tanggal sekarang
            var dariTanggal = document.getElementById('dari-tanggal-' + id_tanaman).value;
            // perkiraan
            var perkiraanPanen = document.getElementById('perkiraan-panen-' + id_tanaman);
            // membuat function date
            var date = new Date(dariTanggal);
            // mengambil tanggal saja
            // var tanggal = date.getDate()
            // Menambahkan hari ke tanggal
            date.setDate(date.getDate() + parseInt(lama));
            // Tampilkan tanggal yang dihasilkan kembali ke form 
            perkiraanPanen.value = date.toISOString().slice(0, 10);
        }
    </script>
<?php endforeach ?>

<div class="modal modal-blur fade" id="modal-belum-login" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
        <div class="modal-content">
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            <div class="modal-status bg-danger"></div>
            <div class="modal-body text-center py-4">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon mb-2 text-danger icon-lg" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <path d="M12 9v2m0 4v.01" />
                    <path d="M5 19h14a2 2 0 0 0 1.84 -2.75l-7.1 -12.25a2 2 0 0 0 -3.5 0l-7.1 12.25a2 2 0 0 0 1.75 2.75" />
                </svg>
                <h3>Belum Login?</h3>
                <div class="text-muted">Anda Harus Login!!</div>
            </div>
            <div class="modal-footer">
                <div class="w-100">
                    <div class="row">
                        <div class="col">
                            <a href="#" class="btn w-100" data-bs-dismiss="modal">Cancel</a>
                        </div>
                        <div class="col">
                            <a href="/login" class="btn btn-info w-100">Login</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>