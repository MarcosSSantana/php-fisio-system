<?php
$this->layout('_theme', [
    'title' => $this->data["title"]
])
?>

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <!-- general form elements -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Cadastro</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="<?=ROOT?>paciente" method="post">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label for="nome">Nome</label>
                                        <input type="text" class="form-control" name="nome" placeholder="Nome">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="cpf">CPF</label>
                                        <input type="text" class="form-control" name="cpf" placeholder="CPF">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="peso">Peso</label>
                                        <input type="text" class="form-control" name="peso" placeholder="Peso">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="altura">Altura</label>
                                        <input type="text" class="form-control" name="altura" placeholder="Altura">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="hd">HD</label>
                                        <input type="text" class="form-control" name="hd" placeholder="HD">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="ac">AC</label>
                                        <input type="text" class="form-control" name="ac" placeholder="AC">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="observacao">Observação</label>
                                        <textarea class="form-control" name="observacao" rows="5"></textarea>
                                    </div>
                                </div>
                            </div>


                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary btn-block">Cadastrar</button>
                        </div>
                    </form>
                </div>
                <!-- /.card -->

                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Lista</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table name="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>Nome</th>
                                <th>CPF</th>
                                <th>Idade</th>
                                <th>Peso</th>
                                <th>Altura</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($this->data["pacientes"] as $item) { ?>
                                <tr>
                                    <td><?=$item->nome?></td>
                                    <td><?=$item->cpf?></td>
                                    <td><?=$item->idade?></td>
                                    <td><?=$item->peso?></td>
                                    <td><?=$item->altura?></td>
                                </tr>
                            <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php $this->push('scripts') ?>
<!-- DataTables  & Plugins -->
<script src="<?= ROOT ?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?= ROOT ?>assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?= ROOT ?>assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?= ROOT ?>assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="<?= ROOT ?>assets/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?= ROOT ?>assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="<?= ROOT ?>assets/plugins/jszip/jszip.min.js"></script>
<script src="<?= ROOT ?>assets/plugins/pdfmake/pdfmake.min.js"></script>
<script src="<?= ROOT ?>assets/plugins/pdfmake/vfs_fonts.js"></script>
<script src="<?= ROOT ?>assets/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="<?= ROOT ?>assets/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="<?= ROOT ?>assets/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>

<script>
    $(function () {
        $('#example1').DataTable({
            "responsive": true, "lengthChange": false, "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"],
            "paging": true,
            "searching": true,
            "ordering": true,
            "info": true,
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    });
</script>
<?php $this->end() ?>



