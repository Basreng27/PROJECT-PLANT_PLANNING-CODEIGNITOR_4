<?= $this->extend('Pages\Static\Layout_admins\layout_admins'); ?>

<?= $this->section('content_admin'); ?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Home Admin</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <img src="set_admin/tanaman1.jpg" alt="Logo" class="brand-image img-circle elevation-3" style="opacity: .8; display:block; margin:auto;" height="150" width="150">
            </div>
            <br>
            <!-- <div class="row"> -->
            <div class="card">
                <div class="card-body">
                    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Consequatur eum dolores at, provident magnam qui! Odio rem impedit laudantium sapiente commodi aliquid illum magni voluptatum, consequuntur excepturi accusamus eius ex.</p>
                </div>
            </div>
            <!-- </div> -->
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<?= $this->endSection(); ?>