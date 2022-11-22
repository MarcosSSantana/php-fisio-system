<h1>main</h1>

<?php
//print_r($this->data["pacientes"]);

foreach ($this->data["pacientes"] as $item) {
            print_r($item->nome);
        }
?>