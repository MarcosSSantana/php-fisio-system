<?php
require __DIR__ . "/../vendor/autoload.php";

/*
use CoffeeCode\DataLayer\Connect;

$con = Connect::getInstance();
$error = Connect::getError();

if($error){
    echo $error->getMessage();
}

$query = $con->query("select * from user")->fetch(true);

var_dump($query);*/

use Source\Models\User;
use Source\Models\Endereco;
var_dump($_GET);
if ($_GET["act"] == "create") {
    $user = new User();
    $user->nome = "Marcos";
    $user->save();

    $uendereco  = new Endereco();
    $uendereco->add($user, "av do teste", 15, 14806345);
    $uendereco->save();

}else{
    $user = new User();
    $list = $user->findById('1');
    echo "<pre>";
    //var_dump($list);
    echo "</pre>";

    var_dump($list->data()->nome);
    echo "<pre>";
    var_dump($list->enderecos()->data());
    echo "<br>";

    echo "<pre>";
    $list2 = (new User())->find()->fetch(true);
   // var_dump($list2);
    echo "</pre>";
}




