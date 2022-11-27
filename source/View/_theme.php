<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= SITE ?> | <?= $this->e($title) ?></title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="<?= ROOT ?>assets/dist/css/css.css">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="<?= ROOT ?>assets/plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= ROOT ?>assets/dist/css/adminlte.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="<?= ROOT ?>assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="<?= ROOT ?>assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="<?= ROOT ?>assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
</head>
<body class="sidebar-mini layout-fixed control-sidebar-slide-open text-sm">

<div class="wrapper">
    <!-- Navbar -->
    <?= $this->insert('_includes/navbar', [
        'title' => 'terste'
    ]);
    ?>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <?= $this->insert('_includes/sidebar') ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0"><?= $this->e($title) ?></h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="<?= ROOT ?>">Home</a></li>
                            <li class="breadcrumb-item active"><?= $this->e($title) ?></li>

                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <?= $this->section('content') ?>

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Card title</h5>

                                <p class="card-text">
                                    Some quick example text to build on the card title and make up the bulk of the
                                    card's
                                    content.
                                </p>

                                <a href="#" class="card-link">Card link</a>
                                <a href="#" class="card-link">Another link</a>
                            </div>
                        </div>

                        
                    </div>
                    <!-- /.col-md-6 -->
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="m-0">Featured</h5>
                            </div>
                            <div class="card-body">
                                <h6 class="card-title">Special title treatment</h6>

                                <p class="card-text">With supporting text below as a natural lead-in to additional
                                    content.</p>
                                <a href="#" class="btn btn-primary">Go somewhere</a>
                            </div>
                        </div>

                    </div>
                    <!-- /.col-md-6 -->
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <!-- Main Footer -->
    <?= $this->insert('_includes/footer') ?>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="<?= ROOT ?>assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?= ROOT ?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= ROOT ?>assets/dist/js/adminlte.min.js"></script>
<?= $this->section('scripts') ?>

</body>
</html>
