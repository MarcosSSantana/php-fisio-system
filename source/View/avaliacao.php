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
                        <!--<ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active lista" id="tabs-lista-tab" data-toggle="pill"
                                   href="#lista" role="tab" aria-controls="tabs-lista"
                                   aria-selected="true">Lista</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link cadastro" id="tabs-cadastro-tab" data-toggle="pill"
                                   href="#cadastro" role="tab" aria-controls="tabs-cadastro"
                                   aria-selected="false">Cadastro</a>
                            </li>
                        </ul>-->
                    </div>
                    <div class="card-body">
                        <div class="tab-content" id="custom-tabs-one-tabContent">
                            <div class="active tab-pane lista" id="lista">
                                <?php
                                $dados = $this->data["dados"];
                                ?>
                                <p>
                                    <b>NOME :</b>
                                    <span><?= $dados['paciente']->nome ?></span>
                                </p>
                                <p>
                                    <b>Sexo :</b>
                                    <span><?= $dados['paciente']->sexo ?></span>
                                </p>
                                <p>
                                    <b>Profissão :</b>
                                    <span><?= $dados['paciente']->profissao ?></span>
                                </p>
                                <p>
                                    <b>Idade :</b>
                                    <span><?= $dados['paciente']->idade ?></span>
                                </p>
                                <p>
                                    <b>Telefone :</b>
                                    <span><?= $dados['paciente']->telefone ?></span>
                                </p>
                                <p>
                                    <b>Peso :</b>
                                    <span><?= $dados['paciente']->peso ?></span>
                                </p>
                                <p>
                                    <b>Altura :</b>
                                    <span><?= $dados['paciente']->altura ?></span>
                                </p>
                                <p>
                                    <b>IMC :</b>
                                    <span><?= $dados['paciente']->imc ?></span>
                                </p>
                                <p>
                                    <b>Convênio :</b>
                                    <span><?= $dados['paciente']->convenio ?></span>
                                </p>
                                <p>
                                    <b>Cadastro :</b>
                                    <span><?= $dados['paciente']->created_at ?></span>
                                </p>
                                <?php
                                if (!empty($dados['sessoes'])) {
                                    foreach ($dados['sessoes'] as $item) { ?>
                                        <hr>
                                        <p>
                                            <b>Data :</b><span> <?= $item->created_at ?></span>
                                            <b>AP : </b><span><?= $item->ap ?></span>
                                        </p>
                                        <p>
                                            <b>SpO2 : </b><span><?= $item->sp ?></span>
                                            <b>FC : </b><span><?= $item->fc ?></span>
                                            <b>PA : </b><span><?= $item->pa ?></span>
                                        </p>
                                        <p><b>Observação : </b><span><?= $item->observacao ?></span></p>
                                    <?php }
                                } ?>

                            </div>
                            <div class="tab-pane cadastro" id="cadastro">
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
    window.addEventListener("load", function (event) {
        // $(function () {
        $('a[data-toggle="pill"]').on('shown.bs.tab', function (e) {
            $('form').trigger("reset");
            $("[name='id']").val("");
        });

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



