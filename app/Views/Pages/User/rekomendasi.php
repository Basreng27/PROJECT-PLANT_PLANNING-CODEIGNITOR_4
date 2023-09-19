<?= $this->extend('Pages\Static\Layout_users\layout_users'); ?>

<?= $this->section('content_user'); ?>
<div class="container-xl">
    <div class="page-header d-print-none">
        <div class="row g-2 align-items-center">
            <div class="col">
                <h2 class="page-title">
                    Rekomendasi Untuk Anda
                </h2>
            </div>
        </div>
    </div>
</div>

<div class="page-body">
    <div class="container-xl">
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
                                foreach ($rekomendasi as $tanaman_rekomendasi) : ?>
                                    <tr>
                                        <td><?= $no++; ?></td>
                                        <td> <span class="avatar me-2" style="background-image: url(tanam/<?= $tanaman_rekomendasi['image_tanaman']; ?>)"></span></td>
                                        <td><?= $tanaman_rekomendasi['nama_tanaman']; ?></td>
                                        <td><?= $tanaman_rekomendasi['lama']; ?> <?= $tanaman_rekomendasi['waktu']; ?></td>
                                        <td>
                                            <?php if (session()->get('stat') == 'login-admin' || session()->get('stat') == 'login-user') {  ?>
                                                <a href="#" class="btn" title="Klik Untuk Melihat Cara Budidaya" data-bs-toggle="modal" data-bs-target="#modal-mari-rek<?= $tanaman_rekomendasi['id_tanaman'] ?>">Budidaya</a>
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

<?php foreach ($rekomendasi as $tanamanrek) : ?>
    <div class="modal modal-blur fade" id="modal-mari-rek<?= $tanamanrek['id_tanaman'] ?>" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <form action="/save-tanam" method="POST">
                    <div class="modal-body">
                        <input type="hidden" name="id_tanaman" value="<?= $tanamanrek['id_tanaman']; ?>">
                        <input type="hidden" name="id_user" value="<?= session()->get('id_user') ?>">
                        <div class="mb-3">
                            <label class="form-label">Nama Tanaman</label>
                            <input type="text" class="form-control" name="nama" value="<?= $tanamanrek['nama_tanaman']; ?>" readonly>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Waktu</label>
                            <input type="text" class="form-control" name="nama_madu" value="<?= $tanamanrek['lama']; ?>  <?= $tanamanrek['waktu']; ?>" readonly>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Dari Tangal</label>
                            <input type="date" id="dari-tanggal-<?= $tanamanrek['id_tanaman'] ?>" class="form-control" name="dari_tanggal" onchange="perkiraan(<?= $tanamanrek['id_tanaman'] ?>,'<?= $tanamanrek['waktu'] ?>',<?= $tanamanrek['lama'] ?>)">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Perkiraan Panen</label>
                            <input type="date" id="perkiraan-panen-<?= $tanamanrek['id_tanaman'] ?>" class="form-control" name="perkiraan_panen" value="" readonly>
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
<?= $this->endSection(); ?>