<?php
$this->layout('_theme', [
    'title' => $this->data["title"]
]);

?>

<section class="content">
    <div class="container-fluid">

        <div class="row">

            <div class="col-lg-3 col-6">

                <div class="small-box bg-info">
                    <div class="inner">
                        <h3><?=$this->data["qtdSessoes"];?></h3>
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
                        <h3><?=$this->data["qtdPacientes"];?></h3>
                        <p>Pacientes</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-person-add"></i>
                    </div>
                    <a href="<?= url('paciente') ?>" class="small-box-footer">Mais informações <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>


        </div>
    </div>
</section>
