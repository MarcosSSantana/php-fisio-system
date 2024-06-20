<?php
$this->layout('_theme', [
    'title' => $this->data["title"]
]);
?>
<pre>
<!--    --><?php //print_r($this->data["dataSessoes"])
            ?>
</pre>
<section class="content">
    <div class="container-fluid">

        <div class="row">

            <div class="col-lg-3 col-6">

                <div class="small-box bg-info">
                    <div class="inner">
                        <h3><?= $this->data["qtdSessoes"]; ?></h3>
                        <p>Sessões</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-stats-bars"></i>
                    </div>
                    <a href="<?= url('sessao') ?>" class="small-box-footer">Mais informações <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>

            <div class="col-lg-3 col-6">

                <div class="small-box bg-warning">
                    <div class="inner">
                        <h3><?= $this->data["qtdPacientes"]; ?></h3>
                        <p>Pacientes</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-person-add"></i>
                    </div>
                    <a href="<?= url('paciente') ?>" class="small-box-footer">Mais informações <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>

            <div class="col-lg-3 col-6">

                <div class="small-box bg-primary">
                    <div class="inner">
                        <h3><?= $this->data["qtdPacientesMasc"]; ?></h3>
                        <p>Sexo Masculino</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-man"></i>
                    </div>
                    <a href="<?= url('paciente') ?>" class="small-box-footer">Mais informações <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>

            <div class="col-lg-3 col-6">

                <div class="small-box bg-maroon">
                    <div class="inner">
                        <h3><?= $this->data["qtdPacientesFemi"]; ?></h3>
                        <p>Sexo Feminino</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-woman"></i>
                    </div>
                    <a href="<?= url('paciente') ?>" class="small-box-footer">Mais informações <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>

            <div class="col-lg-6 col-12">
                <canvas id="chartIdades"></canvas>
            </div>
        </div>
    </div>
</section>
<?php $this->push('scripts') ?>
<script src="<?= ROOT ?>assets/plugins/chart.js/Chart.min.js"></script>

<script>
    window.addEventListener("load", function(event) {
        let dados = <?= json_encode($listaIdades) ?>;

        let idades = dados.idades
        let quantidade = dados.quantidade;

        const ctx = document.getElementById('chartIdades');

        new Chart(ctx, {
            type: 'line',
            data: {
                labels: idades,
                datasets: [{
                    label: 'Idades pacientes',
                    data: quantidade,
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

    });
</script>
<?php $this->end() ?>