<h1>main</h1>
<?//=$list?>
<?php $this->layout('_theme') ?>
<?php
//print_r($this->data["pacientes"]);

foreach ($this->data["pacientes"] as $item) {
            print_r($item->nome);
        }
?>

<?=SITE?>
