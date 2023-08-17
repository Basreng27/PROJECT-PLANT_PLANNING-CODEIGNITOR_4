<?= $this->extend('Pages\Static\Layout_users\layout_users'); ?>

<?= $this->section('content_user'); ?>
<div class="container-xl">
    <div class="page-header d-print-none">
        <div class="row g-2 align-items-center">
            <div class="col">
                <h2 class="page-title">
                    Detail Tanaman <?= $tanaman['nama_tanaman']; ?>
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
                                    <th>Image</th>
                                    <th>Nama Tanaman</th>
                                    <?php foreach ($data_pupuk_mari_tanam  as $pempuk) : ?>
                                        <th>Pemberian Pupuk Ke-<?= $pempuk['pupuk_ke']; ?></th>
                                    <?php $tgl = $pempuk['dari_tanggal'];
                                    endforeach ?>
                                    <th>Status</th>
                                </tr>
                            </thead>

                            <tbody>
                                <tr>
                                    <td>
                                        <span class="avatar me-2" style="background-image: url(<?= base_url() ?>/tanam/<?= $tanaman['image_tanaman']; ?>)"></span>
                                        <input type="hidden" id="dari-tanggal" value="<?= $tgl; ?>">
                                    </td>
                                    <td><?= $tanaman['nama_tanaman']; ?></td>
                                    <?php $dari_tanggal = $data_pupuk_mari_tanam[0]['dari_tanggal'];
                                    foreach ($data_pupuk_mari_tanam  as $marpuk) : ?>
                                        <td><input class="form-control" type="date" id="pem-puk-<?= $marpuk['id_pupuk']; ?>" readonly><br>
                                            <div id="butto-<?= $marpuk['id_pupuk']; ?>"></div>
                                        </td>
                                    <?php endforeach ?>
                                    <td>Dalam Masa Budidaya</td>
                                </tr>
                            </tbody>

                        </table>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <br>
        <div class="row row-cards">
            <div class="col-12">
                <div class="card">
                    <div class="table-responsive">
                        <table class="table table-vcenter card-table">
                            <thead>
                                <tr>
                                    <th>Image</th>
                                    <th>Nama Tanaman</th>
                                    <?php foreach ($data_semprot_mari_tanam  as $semp) : ?>
                                        <th>Pemberian Penyemprotan Ke-<?= $semp['semprot_ke']; ?></th>
                                    <?php $tgl = $semp['dari_tanggal'];
                                    endforeach ?>
                                    <th>Status</th>
                                </tr>
                            </thead>

                            <tbody>
                                <tr>
                                    <td>
                                        <span class="avatar me-2" style="background-image: url(<?= base_url() ?>/tanam/<?= $tanaman['image_tanaman']; ?>)"></span>
                                        <input type="hidden" id="dari-tanggal" value="<?= $tgl; ?>">
                                    </td>
                                    <td><?= $tanaman['nama_tanaman']; ?></td>
                                    <?php $dari_tanggal = $data_semprot_mari_tanam[0]['dari_tanggal'];
                                    foreach ($data_semprot_mari_tanam  as $marprot) : ?>
                                        <td><input class="form-control" type="date" id="pem-sem-<?= $marprot['id']; ?>" readonly><br>
                                            <div id="buttosem-<?= $marprot['id']; ?>"></div>
                                        </td>
                                    <?php endforeach ?>
                                    <td>Dalam Masa Budidaya</td>
                                </tr>
                            </tbody>

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    window.onload = function() {
        var dariTanggal = "<?= $dari_tanggal; ?>";
        <?php foreach ($data_pupuk_mari_tanam  as $marpuks) : ?>
            var id_pupuk = "<?= $marpuks['id_pupuk']; ?>";
            var lama = "<?= $marpuks['lama_pupuk']; ?>";
            var status = "<?= $marpuks['status_pupuk']; ?>";
            var waktu_pupuk = "<?= $marpuks['waktu_pupuk']; ?>";
            pemPuk(id_pupuk, lama, status, waktu_pupuk);
        <?php endforeach ?>

        var dariTanggalSem = "<?= $dari_tanggal; ?>";
        <?php foreach ($data_semprot_mari_tanam  as $marsems) : ?>
            var id = "<?= $marsems['id']; ?>";
            var lama = "<?= $marsems['lama']; ?>";
            var status = "<?= $marsems['status']; ?>";
            var waktu = "<?= $marsems['waktu']; ?>";

            pemSem(id, lama, status, waktu);
        <?php endforeach ?>
    }

    function pemPuk(id_pupuk, lama, status, waktu_pupuk) {
        if (waktu_pupuk == "Hari") {
            lama = lama;
        } else if (waktu_pupuk == "Minggu") {
            lama = lama * 7;
        } else if (waktu_pupuk == "Bulan") {
            lama = lama * 30;
        } else if (waktu_pupuk == "Tahun") {
            lama = lama * 365;
        } else {
            lama = 0;
        }

        var dariTanggal = document.getElementById('dari-tanggal').value;
        var pemPupuk = document.getElementById('pem-puk-' + id_pupuk);
        var date = new Date(Date.parse(dariTanggal));
        var butto = document.getElementById("butto-" + id_pupuk);

        date.setDate(date.getDate() + parseInt(lama));
        pemPupuk.value = date.toISOString().slice(0, 10);

        var now = new Date();
        if (Date.parse(pemPupuk.value) > now && status == 1) {
            butto.innerHTML = `<button class="btn btn-primary">Diberikan</button>`;
        } else if (Date.parse(pemPupuk.value) > now && status == 2) {
            butto.innerHTML = `<button class="btn btn-danger">Tidak Diberikan</button>`;
        } else if (Date.parse(pemPupuk.value) < now && status == 2) {
            butto.innerHTML = `<button class="btn btn-danger">Tidak Diberikan</button>`;
        } else if (Date.parse(pemPupuk.value) < now && status == 1) {
            butto.innerHTML = `<button class="btn btn-primary">Diberikan</button>`;
        } else if (Date.parse(pemPupuk.value) < now) {
            butto.innerHTML = `<button class="btn btn-danger">Terlambat</button>`;
        } else {
            butto.innerHTML = `<a href="/update-pupuk/` + id_pupuk + `/1" class="btn btn-primary">Diberikan</a> <a href="/update-pupuk/` + id_pupuk + `/2" class="btn btn-danger">Tidak</a>`;
        }
    }

    function pemSem(id, lama, status, waktu) {
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

        var dariTanggalSem = document.getElementById('dari-tanggal').value;
        var pemSem = document.getElementById('pem-sem-' + id);
        var date = new Date(Date.parse(dariTanggalSem));
        var buttoSem = document.getElementById("buttosem-" + id);

        date.setDate(date.getDate() + parseInt(lama));
        pemSem.value = date.toISOString().slice(0, 10);

        var now = new Date();
        if (Date.parse(pemSem.value) > now && status == 1) {
            buttoSem.innerHTML = `<button class="btn btn-primary">Diberikan</button>`;
        } else if (Date.parse(pemSem.value) > now && status == 2) {
            buttoSem.innerHTML = `<button class="btn btn-danger">Tidak Diberikan</button>`;
        } else if (Date.parse(pemSem.value) < now && status == 2) {
            buttoSem.innerHTML = `<button class="btn btn-danger">Tidak Diberikan</button>`;
        } else if (Date.parse(pemSem.value) < now && status == 1) {
            buttoSem.innerHTML = `<button class="btn btn-primary">Diberikan</button>`;
        } else if (Date.parse(pemSem.value) < now) {
            buttoSem.innerHTML = `<button class="btn btn-danger">Terlambat</button>`;
        } else {
            buttoSem.innerHTML = `<a href="/update-semprot/` + id + `/1" class="btn btn-primary">Diberikan</a> <a href="/update-semprot/` + id + `/2" class="btn btn-danger">Tidak</a>`;
        }
    }
</script>
<?= $this->endSection(); ?>