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
                            <div class="active tab-pane lista clearfix" id="lista">
                                <?php
                                $dados = $this->data["dados"];
                                ?>
<!--                                <div class="clearfix">-->
                                    <a class="btn btn-info btn-sm float-right"
                                       href="<?= url('sessao') ?>">
                                        Sessões
                                    </a>
<!--                                </div>-->

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
                                    <span><?= date_format(date_create($dados['paciente']->created_at), "d/m/Y H:i") ?></span>
                                </p>
                                <?php $graficofc = [];
                                if (!empty($dados['sessoes'])) { ?>
                                    <div class="table-responsive">
                                        <table class="table table-striped ">
                                            <thead>
                                            <tr>
                                                <th>Data</th>
                                                <th>Número sessão</th>
                                                <th>AP</th>
                                                <th>SpO2</th>
                                                <th>FC</th>
                                                <th>PA</th>
                                                <th>Observação</th>
                                            </tr>
                                            </thead>
                                            <?php foreach ($dados['sessoes'] as $key => $item) {
                                                $graficofc[$key]['key'] = $key + 1;
                                                $graficofc[$key]['fcN'] = $item->fc;
                                                $graficofc[$key]['fc'] = intval($item->fc);
                                                $graficofc[$key]['pa'] = intval($item->pa);
                                                $graficofc[$key]['sp'] = intval($item->sp);
                                                $graficofc[$key]['data'] = date_format(date_create($item->created_at), "d/m/Y H:i");
                                                ?>
                                                <tr>
                                                    <td>
                                                        <span> <?= date_format(date_create($item->created_at), "d/m/Y") ?></span>
                                                    </td>
                                                    <td>
                                                        <span><?= $item->numSessao ?></span>
                                                    </td>
                                                    <td>
                                                        <span><?= $item->ap ?></span>
                                                    </td>
                                                    <td>
                                                        <span><?= $item->sp ?></span>
                                                    </td>
                                                    <td>
                                                        <span><?= $item->fc ?></span>
                                                    </td>
                                                    <td>
                                                        <span><?= $item->pa ?></span>
                                                    </td>
                                                    <td><span><?= $item->observacao ?></span></td>
                                                </tr>
                                            <?php } ?>
                                        </table>
                                    </div>
                                <?php } ?>

                                <div class="container">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <canvas id="chartFC"></canvas>
                                        </div>
                                        <div class="col-md-6">
                                            <canvas id="chartSP"></canvas>
                                        </div>

                                    </div>
                                </div>
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

<script src="<?= ROOT ?>assets/plugins/chart.js/Chart.min.js"></script>

<script>
    window.addEventListener("load", function (event) {
        let dados = <?=json_encode($graficofc)?>;
        console.log(dados);
        let fc = dados.map((item) => item.fc);
        let sp = dados.map((item) => item.sp);
        let pa = dados.map((item) => item.pa);
        let datas = dados.map((item) => item.data);
        let key = dados.map((item) => item.key);

        const ctx = document.getElementById('chartFC');

        new Chart(ctx, {
            type: 'line',
            data: {
                labels: key,
                datasets: [{
                    label: 'FC em bpm',
                    data: fc,
                    borderWidth: 5,
                    fill: false,
                    borderColor: 'rgb(75, 192, 192)',
                    tension: 0.1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        const ctsp = document.getElementById('chartSP');

        new Chart(ctsp, {
            type: 'line',
            data: {
                labels: key,
                datasets: [{
                    label: 'SpO2 ',
                    data: sp,
                    borderWidth: 5,
                    fill: false,
                    borderColor: 'rgb(27,78,234)',
                    tension: 0.1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });


    });

</script>
<?php $this->end() ?>



