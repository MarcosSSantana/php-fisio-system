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
                                <a class="nav-link active lista" id="tabs-lista-tab" data-toggle="pill"
                                   href="#lista" role="tab" aria-controls="tabs-lista"
                                   aria-selected="true">Lista</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link cadastro" id="tabs-cadastro-tab" data-toggle="pill"
                                   href="#cadastro" role="tab" aria-controls="tabs-cadastro"
                                   aria-selected="false">Cadastro</a>
                            </li>
                        </ul>
                    </div>
                    <div class="card-body">
                        <div class="tab-content" id="custom-tabs-one-tabContent">
                            <div class="active tab-pane lista" id="lista">
                                <table id="example1" name="example1" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th>Nome</th>
                                        <th>CPF</th>
                                        <th>Idade</th>
                                        <th>Peso</th>
                                        <th>Altura</th>
                                        <th>Ação</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach ($this->data["pacientes"] as $item) { ?>
                                        <tr>
                                            <td><?= $item->nome ?></td>
                                            <td><?= $item->cpf ?></td>
                                            <td><?= $item->idade ?></td>
                                            <td><?= $item->peso ?></td>
                                            <td><?= $item->altura ?></td>
                                            <td>
                                                <div class="btn-group">
                                                    <button class="btn btn-warning btn-sm"
                                                            onclick="carregar_dados('paciente/dados/<?= $item->id ?>')">
                                                        <i class="fas fa-pencil-alt"></i>
                                                        Editar
                                                    </button>

                                                    <!--<a class="btn btn-warning btn-sm carregar_dados"
                                                       onclick="carregar_dados(this)"
                                                       href="paciente/dados/<?= $item->id ?>">
                                                        <i class="fas fa-pencil-alt">
                                                        </i>
                                                        Editar
                                                    </a>-->
                                                    <a class="btn btn-danger btn-sm deletar_dados"
                                                       href="paciente/deletar/<?= $item->id ?>">
                                                        <i class="fas fa-trash">
                                                        </i>
                                                        Delete
                                                    </a>
                                                    <a class="btn btn-info btn-sm"
                                                       href="paciente/sessoes/<?= $item->id ?>">
                                                        <i class="fas fa-pencil-alt"></i>
                                                        Ficha
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                            <div class="tab-pane cadastro" id="cadastro">
                                <form action="<?= ROOT ?>paciente" method="post">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="nome">Nome</label>
                                                    <input type="text" class="form-control" name="nome"
                                                           placeholder="Nome" required>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label for="sexo">Sexo</label>
                                                    <select class="form-control" name="sexo" required>
                                                        <option value="">Sexo</option>
                                                        <option value="Masculino">Masculino</option>
                                                        <option value="Feminino">Feminino</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label for="convenio">Convênio</label>
                                                    <select class="form-control" name="convenio">
                                                        <option value="">Convênio</option>
                                                        <option value="Unimed">Unimed</option>
                                                        <option value="São Francisco">São Francisco</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label for="idade">Idade</label>
                                                    <input type="number" class="form-control" name="idade"
                                                           placeholder="idade" required>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label for="cpf">CPF</label>
                                                    <input type="text" class="form-control" name="cpf"
                                                           data-inputmask='"mask": "999.999.999-99"' data-mask
                                                           placeholder="CPF" required>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label for="telefone">Telefone</label>
                                                    <input type="tel" class="form-control" name="telefone"
                                                           data-inputmask='"mask": "(99) 99999-9999"' data-mask
                                                           placeholder="Telefone">
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label for="peso">Peso</label>
                                                    <input type="text" class="form-control" name="peso"
                                                           placeholder="Peso" required>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label for="altura">Altura</label>
                                                    <input type="tel" class="form-control" name="altura"
                                                           data-inputmask='"mask": "9.99"' data-mask
                                                           placeholder="Altura">
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label for="imc">IMC</label>
                                                    <input type="text" class="form-control" name="imc"
                                                           placeholder="IMC">
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label for="hd">HD</label>
                                                    <input type="text" class="form-control" name="hd" placeholder="HD">
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label for="ac">AC</label>
                                                    <input type="text" class="form-control" name="ac" placeholder="AC">
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



