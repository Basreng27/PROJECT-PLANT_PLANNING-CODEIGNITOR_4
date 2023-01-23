<?= $this->extend('Pages\Static\Layout_users\layout_users'); ?>

<?= $this->section('content_user'); ?>
<div class="container-xl">
    <!-- Page title -->
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

<?php /*if (session()->getFlashdata('gagal')) { ?>
    <div class="alert alert-danger" role="alert">
        Product gagal dicheckout
    </div>
<?php } */ ?>

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
    </div>
</div>

<script>
    // window.onload = function() {
    //     pemPuk(id_pupuk, lama);
    // }

    window.onload = function() {
        var dariTanggal = "<?= $dari_tanggal; ?>";
        <?php foreach ($data_pupuk_mari_tanam  as $marpuks) : ?>
            var id_pupuk = "<?= $marpuks['id_pupuk']; ?>";
            var lama = "<?= $marpuks['lama_pupuk']; ?>";
            pemPuk(id_pupuk, lama, dariTanggal);
        <?php endforeach ?>
    }

    function pemPuk(id_pupuk, lama) {
        var dariTanggal = document.getElementById('dari-tanggal').value;
        var pemPupuk = document.getElementById('pem-puk-' + id_pupuk);
        var date = new Date(Date.parse(dariTanggal));
        var butto = document.getElementById("butto-" + id_pupuk);

        date.setDate(date.getDate() + parseInt(lama));
        pemPupuk.value = date.toISOString().slice(0, 10);

        var now = new Date();
        if (Date.parse(pemPupuk.value) > now) {
            // butto.innerHTML = `<button class="btn btn-primary">Diberikan</button>`;
            butto.innerHTML = `<td><button class="btn btn-primary">Diberikan</button> <button class="btn btn-danger">Tidak</button></td>`;
        } else if (Date.parse(pemPupuk.value) < now) {
            butto.innerHTML = `<td><button class="btn btn-danger">Terlambat</button></td>`;
        }
    }
</script>
<?= $this->endSection(); ?>