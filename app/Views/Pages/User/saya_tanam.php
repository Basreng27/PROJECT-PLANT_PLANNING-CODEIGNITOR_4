<?= $this->extend('Pages\Static\Layout_users\layout_users'); ?>

<?= $this->section('content_user'); ?>
<div class="container-xl">
    <!-- Page title -->
    <div class="page-header d-print-none">
        <div class="row g-2 align-items-center">
            <div class="col">
                <h2 class="page-title">
                    Saya Tanam
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
                                    <th>No</th>
                                    <th>Image</th>
                                    <th>Nama Tanaman</th>
                                    <th>Dari</th>
                                    <th>Perkiraan Panen</th>
                                    <th>Status</th>
                                    <th>Lihat Detail</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php $no = 1;
                                $today = date('Y-m-d');
                                foreach ($data_saya_tanam as $saya_tanam) : ?>
                                    <tr>
                                        <td><?= $no++; ?></td>
                                        <td> <span class="avatar me-2" style="background-image: url(tanam/<?= $saya_tanam['image_tanaman']; ?>)"></span></td>
                                        <td><?= $saya_tanam['nama_tanaman']; ?></td>
                                        <td><?= $saya_tanam['dari_tanggal']; ?> </td>
                                        <td><?= $saya_tanam['perkiraan_panen']; ?> </td>
                                        <?php if (strtotime($saya_tanam['perkiraan_panen']) > strtotime($today)) { ?>
                                            <td>
                                                <div style="background-color: green; border-radius: 50px; text-align: center; color: white;">Dalam Masa Budidaya</div>
                                            </td>
                                            <td>
                                                <a href="/detail/<?= $saya_tanam['id_mari_tanam']; ?>/<?= $saya_tanam['id_tanaman']; ?>" class="btn" title="Klik Untuk Melihat Cara Budidaya">Detail</a>
                                            </td>
                                        <?php } else if (strtotime($saya_tanam['perkiraan_panen']) < strtotime(date('Y-m-d'))) { ?>
                                            <td>
                                                <div style="background-color: red; border-radius: 50px; text-align: center; color: white;">Tanaman Selesai Budidaya (Silahkan Panen!!)</div>
                                            </td>
                                        <?php } ?>
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
<?= $this->endSection(); ?>