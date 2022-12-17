<?= $this->extend('Pages\Static\Layout_users\layout_users'); ?>

<?= $this->section('content_user'); ?>
<div class="container-xl">
    <!-- Page title -->
    <div class="page-header d-print-none">
        <div class="row g-2 align-items-center">
            <div class="col">
                <h2 class="page-title">
                    Pesanan <?= session()->get('nama') ?>
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
                                    <th>Nama Madu</th>
                                    <th>Harga</th>
                                    <th>Jumlah</th>
                                    <th>Total</th>
                                    <th>Status</th>
                                    <th>Keterangan</th>
                                    <th>Beri Rating</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php
                                $no = 1;
                                foreach ($data_keranjang as $keranjang) :
                                    $this->RatingModel = new App\Models\Rating_model();

                                    $sumRating = $this->RatingModel->sumRatingS($keranjang['id_madu'], session()->get('id_user'));
                                    $countRating = $this->RatingModel->countRatingS($keranjang['id_madu'], session()->get('id_user'));

                                    $resultRating = 0;
                                    if ($countRating) {
                                        $resultRating = $sumRating['rating'] / $countRating;
                                    } ?>
                                    <tr>
                                        <td>
                                            <div><?= $no++; ?></div>
                                        </td>
                                        <td>
                                            <span class="avatar me-2" style="background-image: url(products/<?= $keranjang['image']; ?>)"></span>
                                        </td>
                                        <td>
                                            <div><?= $keranjang['nama_madu']; ?></div>
                                        </td>
                                        <td>
                                            <div><?= $keranjang['harga']; ?></div>
                                        </td>
                                        <td>
                                            <div><?= $keranjang['jumlah']; ?></div>
                                        </td>
                                        <td>
                                            <div><?= $keranjang['total']; ?></div>
                                        </td>
                                        <td>
                                            <?php if ($keranjang['status'] == 'Setuju') { ?>
                                                <div> <button class="btn btn-success"><?= $keranjang['status']; ?></button> </div>
                                            <?php } elseif ($keranjang['status'] == 'Tolak') { ?>
                                                <div> <button class="btn btn-danger"><?= $keranjang['status']; ?></button> </div>
                                            <?php } else { ?>
                                                <div> <button class="btn btn-info"><?= $keranjang['status']; ?></button> </div>
                                            <?php } ?>
                                        </td>
                                        <td>
                                            <div><?= $keranjang['keterangan']; ?></div>
                                        </td>
                                        <td>
                                            <div>
                                                <?php for ($i = 0; $i < 5; $i++) {
                                                    if (($i + 1) <= $resultRating) { ?>
                                                        <span class="fa fa-star checked"></span>
                                                    <?php } else { ?>
                                                        <span class="fa fa-star"></span>
                                                <?php }
                                                } ?>
                                            </div>
                                        </td>
                                        <td>
                                            <div>
                                                <button id="btn_ratig" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal-rating<?= $keranjang['id_keranjang']; ?>">Beri Rating</button>
                                            </div>
                                        </td>
                                    <?php endforeach ?>
                            </tbody>

                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<?php foreach ($data_keranjang as $keranjangs) : ?>
    <div class="modal modal-blur fade" id="modal-keranjang<?= $keranjangs['id_keranjang']; ?>" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">

                <form action="/user-checkout" method="POST">
                    <div class="modal-body">
                        <input type="hidden" name="id_user" value="<?= session()->get('id_user') ?>">
                        <input type="hidden" name="id_keranjang" value="<?= $keranjangs['id_keranjang']; ?>">
                        <div class="mb-3">
                            <label class="form-label">Nama Pemesan</label>
                            <input type="text" class="form-control" name="nama" value="<?= session()->get('nama') ?>" readonly>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Nama Madu</label>
                            <input type="text" class="form-control" name="nama_madu" value="<?= $keranjangs['nama_madu']; ?>" readonly>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Jumlah dibeli</label>
                            <input type="number" class="form-control" name="jumlah" maxlength="3" value="<?= $keranjangs['jumlah']; ?>" readonly>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Total Harga</label>
                            <input type="number" class="form-control" name="total" value="<?= $keranjangs['total']; ?>" readonly>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Alamat / Lokasi COD</label>
                            <textarea class="form-control <?= ($validation->hasError('lokasi')) ? 'is-invalid' : ''; ?>" name="lokasi" rows="3"><?= old('lokasi'); ?></textarea>
                            <div class="invalid-feedback"><?= $validation->getError('lokasi'); ?></div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <a href="#" class="btn btn-link link-secondary" data-bs-dismiss="modal">
                            Cancel
                        </a>
                        <button type="submit" class="btn btn-primary">Checkout</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php endforeach ?>

<?php foreach ($data_keranjang as $keranjangr) : ?>
    <div class="modal modal-blur fade" id="modal-rating<?= $keranjangr['id_keranjang']; ?>" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
            <div class="modal-content">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                <div class="modal-status bg-success"></div>

                <form action="/proses-rating" method="POST">
                    <div class="modal-body text-center py-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon mb-2 text-success icon-lg" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M12 9v2m0 4v.01" />
                            <path d="M5 19h14a2 2 0 0 0 1.84 -2.75l-7.1 -12.25a2 2 0 0 0 -3.5 0l-7.1 12.25a2 2 0 0 0 1.75 2.75" />
                        </svg>
                        <h3>Beri Kami Rating Product <?= $keranjangr['nama_madu']; ?>!!!</h3>
                        <!-- <div class="text-muted">Anda Harus Login!!</div> -->
                        <span class="fa fa-star" id="rating_1<?= $keranjangr['id_keranjang']; ?>" onclick="rating<?= $keranjangr['id_keranjang']; ?>(1)"></span>
                        <span class="fa fa-star" id="rating_2<?= $keranjangr['id_keranjang']; ?>" onclick="rating<?= $keranjangr['id_keranjang']; ?>(2)"></span>
                        <span class="fa fa-star" id="rating_3<?= $keranjangr['id_keranjang']; ?>" onclick="rating<?= $keranjangr['id_keranjang']; ?>(3)"></span>
                        <span class="fa fa-star" id="rating_4<?= $keranjangr['id_keranjang']; ?>" onclick="rating<?= $keranjangr['id_keranjang']; ?>(4)"></span>
                        <span class="fa fa-star" id="rating_5<?= $keranjangr['id_keranjang']; ?>" onclick="rating<?= $keranjangr['id_keranjang']; ?>(5)"></span>

                        <input type="hidden" name="id_madu" value="<?= $keranjangr['id_madu']; ?>">
                        <input type="hidden" name="id_user" value="<?= session()->get('id_user'); ?>">
                        <input type="hidden" id="ratingv<?= $keranjangr['id_keranjang']; ?>" name="rating">

                        <div>
                            <label class="form-label">Komentar</label>
                            <textarea class="form-control" name="komen" rows="3"><?= (!empty($keranjangr['komen'])) ? $keranjangr['komen'] : '' ?></textarea>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <div class="w-100">
                            <div class="row">
                                <div class="col">
                                    <a href="#" class="btn w-100" data-bs-dismiss="modal">Cancel</a>
                                </div>
                                <div class="col">
                                    <button class="btn btn-info w-100" type="submit" name="submit" value="Rate!!" id="btn_rating">Beri Rating</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php endforeach ?>

<script>
    var modal = document.getElementById('modal-rating');
    var btn = document.getElementById('btn_rating');

    <?php foreach ($data_keranjang as $keranjangrat) : ?>

        function rating<?= $keranjangrat['id_keranjang']; ?>(id) {
            document.getElementById('ratingv<?= $keranjangrat['id_keranjang']; ?>').value = id;

            switch (id) {
                case 1:
                    checkRating("rating_1<?= $keranjangrat['id_keranjang']; ?>");
                    uncheckRating("rating_2<?= $keranjangrat['id_keranjang']; ?>");
                    uncheckRating("rating_3<?= $keranjangrat['id_keranjang']; ?>");
                    uncheckRating("rating_4<?= $keranjangrat['id_keranjang']; ?>");
                    uncheckRating("rating_5<?= $keranjangrat['id_keranjang']; ?>");

                    break;
                case 2:
                    checkRating("rating_1<?= $keranjangrat['id_keranjang']; ?>");
                    checkRating("rating_2<?= $keranjangrat['id_keranjang']; ?>");
                    uncheckRating("rating_3<?= $keranjangrat['id_keranjang']; ?>");
                    uncheckRating("rating_4<?= $keranjangrat['id_keranjang']; ?>");
                    uncheckRating("rating_5<?= $keranjangrat['id_keranjang']; ?>");

                    break;
                case 3:
                    checkRating("rating_1<?= $keranjangrat['id_keranjang']; ?>");
                    checkRating("rating_2<?= $keranjangrat['id_keranjang']; ?>");
                    checkRating("rating_3<?= $keranjangrat['id_keranjang']; ?>");
                    uncheckRating("rating_4<?= $keranjangrat['id_keranjang']; ?>");
                    uncheckRating("rating_5<?= $keranjangrat['id_keranjang']; ?>");

                    break;
                case 4:
                    checkRating("rating_1<?= $keranjangrat['id_keranjang']; ?>");
                    checkRating("rating_2<?= $keranjangrat['id_keranjang']; ?>");
                    checkRating("rating_3<?= $keranjangrat['id_keranjang']; ?>");
                    checkRating("rating_4<?= $keranjangrat['id_keranjang']; ?>");
                    uncheckRating("rating_5<?= $keranjangrat['id_keranjang']; ?>");

                    break;
                case 5:
                    checkRating("rating_1<?= $keranjangrat['id_keranjang']; ?>");
                    checkRating("rating_2<?= $keranjangrat['id_keranjang']; ?>");
                    checkRating("rating_3<?= $keranjangrat['id_keranjang']; ?>");
                    checkRating("rating_4<?= $keranjangrat['id_keranjang']; ?>");
                    checkRating("rating_5<?= $keranjangrat['id_keranjang']; ?>");

                    break;
                default:
            }
        }
    <?php endforeach ?>

    function checkRating(star_id) {
        var element = document.getElementById(star_id);
        element.classList.add("checked");
    }

    function uncheckRating(star_id) {
        var element = document.getElementById(star_id);
        element.classList.remove("checked");
    }
</script>
<?= $this->endSection(); ?>