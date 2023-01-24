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
                <div class="card card-lightblue card-tabs">
                    <div class="card-header p-0 pt-1">
                        <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link lista" id="tabs-lista-tab" data-toggle="pill"
                                   href="#lista" role="tab" aria-controls="tabs-lista"
                                   aria-selected="true">Lista</a>
                            </li>
                            <li class="nav-item">
                                <a class="active nav-link cadastro" id="tabs-cadastro-tab" data-toggle="pill"
                                   href="#cadastro" role="tab" aria-controls="tabs-cadastro"
                                   aria-selected="false">Cadastro</a>
                            </li>
                        </ul>
                    </div>
                    <div class="card-body">
                        <div class="tab-content" id="custom-tabs-one-tabContent">
                            <div class="tab-pane lista" id="lista">
                                <table id="example1" name="example1" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Data</th>
                                        <th>idPaciente</th>
                                        <th>PA</th>
                                        <th>FC</th>
                                        <th>Ação</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach ($this->data["sessoes"] as $item) { ?>
                                        <tr>
                                            <td><?= $item->id ?></td>
                                            <td><?= $item->created_at ?></td>
                                            <td><?= $item->idPaciente ?></td>
                                            <td><?= $item->pa ?></td>
                                            <td><?= $item->fc ?></td>
                                            <td>
                                                <div class="btn-group">
                                                    <button class="btn btn-warning btn-sm"
                                                            onclick="carregar_dados('sessao/dados/<?= $item->id ?>')">
                                                        <i class="fas fa-pencil-alt"></i>
                                                        Editar
                                                    </button>

                                                    <a class="btn btn-danger btn-sm deletar_dados"
                                                       href="sessao/deletar/<?= $item->id ?>">
                                                        <i class="fas fa-trash">
                                                        </i>
                                                        Delete
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                            <div class="active tab-pane cadastro" id="cadastro">
                                <form action="<?= ROOT ?>sessao" method="post">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="idPaciente">Paciente</label>
                                                    <select class="form-control slc_paciente" name="idPaciente" required>
                                                        <option value="">Paciente</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="ap">AP</label>
                                                    <input type="text" class="form-control" name="ap" placeholder="AP">
                                                </div>
                                            </div>

                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label for="pa">PA</label>
                                                    <input type="tel" class="form-control" name="pa" placeholder="PA"
                                                           data-inputmask='"mask": "99[9]x99[9]mmHg"' data-mask>
                                                </div>
                                            </div>

                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label for="fc">FC</label>
                                                    <input type="tel" class="form-control" name="fc" placeholder="FC"
                                                           data-inputmask='"mask": "99[9]bpm"' data-mask>
                                                </div>
                                            </div>

                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label for="sp">SpO2</label>
                                                    <input type="tel" class="form-control" name="sp" placeholder="SP"
                                                           data-inputmask='"mask": "99[9]%"' data-mask>
                                                </div>
                                            </div>


                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="observacao">Observação</label>
                                                    <textarea class="form-control" name="observacao"
                                                              rows="5"></textarea>
                                                </div>
                                            </div>
                                            <input type="hidden" name="id">
                                        </div>


                                    </div>
                                    <!-- /.card-body -->

                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary btn-block">Cadastrar</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- /.card -->
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
    window.addEventListener("load", function(event) {
        // $(function () {
        $('a[data-toggle="pill"]').on('shown.bs.tab', function(e) {
            $('form').trigger("reset");
            $("[name='id']").val("");
        });

        if ($(".slc_paciente").length > 0) {
            $.ajax({
                url: '<?= ROOT ?>/paciente/detalhes',
                type: 'POST',
                success: function(retorno) {
                    // console.log(retorno);
                    let obj = JSON.parse(retorno);
                    let opt = "<option value=''>Paciente</option>";
                        opt += Object.entries(obj).map((item) => {
                        return "<option value='" + item[1].id + "'>" + item[1].nome +
                            "</option>"
                    });
                    // console.log(opt);
                    $(".slc_paciente").html(opt);
                }
            });
        }

        $('table').DataTable({
            "responsive": true, "lengthChange": false, "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"],
            "paging": true,
            "searching": true,
            "ordering": true,
            "info": true,
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');

        $(":input").inputmask();

        $('.carregar_dados').click(function (event) {
            event.preventDefault();
            let url = $(this).attr('href');
            $.ajax({
                url: url,
                type: 'POST',
                success: function (retorno) {
                    let obj = JSON.parse(retorno);
                    // let obj = retorno;
                    console.log(obj);
                    Object.entries(obj).forEach(([key, value]) => {
                        console.log(value)
                        if (!value) return;
                        let campo = "[name='" + key + "']";

                        // if (value == 1) {
                            $(campo).val(value);
                        // }
                    });
                    $('.lista').removeClass('active');
                    $('.cadastro').addClass('active');
                }
            });
        });


    });

    function carregar_dados(url) {
        $.ajax({
            url: url,
            type: 'POST',
            success: function (retorno) {
                let obj = JSON.parse(retorno);
                // let obj = retorno;
                console.log(obj);
                Object.entries(obj).forEach(([key, value]) => {
                    console.log(value)
                    if (!value) return;
                    let campo = "[name='" + key + "']";

                    // if (value == 1) {
                    $(campo).val(value);
                    // }
                });
                $('.lista').removeClass('active');
                $('.cadastro').addClass('active');
            }
        });
    }
</script>
<?php $this->end() ?>



