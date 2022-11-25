<?php
$this->layout('_theme', [
    'title' => $this->data["title"]
])
?>
<?php

foreach ($this->data["pacientes"] as $item) {
    print_r($item->nome);
}
?>

<?= SITE ?>
