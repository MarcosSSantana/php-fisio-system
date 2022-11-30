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
<body class="sidebar-mini sidebar-collapse layout-fixed control-sidebar-slide-open text-sm">

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
