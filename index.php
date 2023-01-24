<?php
require __DIR__."/vendor/autoload.php";
use CoffeeCode\Router\Router;

$router = new Router(ROOT);

$router->namespace("Source\Controllers");
$router->group(null);
$router->get("/", "Main:inicio");
//$router->get("/paciente", "ctlPaciente:inicio");
//$router->post("/paciente", "ctlPaciente:cadastro");
$router->get("/login", "Main:login");

//paciente
$router->group("paciente");
$router->get("/", "ctlPaciente:inicio");
$router->post("/", "ctlPaciente:cadastro");
$router->post("/dados/{id}", "ctlPaciente:list");
$router->post("/detalhes", "ctlPaciente:listTotal");
$router->get("/sessoes/{id}", "ctlPaciente:sessoes");


//sessao
$router->group("sessao");
$router->get("/", "ctlSessao:inicio");
$router->post("/", "ctlSessao:cadastro");
$router->post("/dados/{id}", "ctlSessao:list");

/*
$router->post("/route/{id}", "Controller:method");
$router->put("/route/{id}/profile", "Controller:method");
$router->patch("/route/{id}/profile/{photo}", "Controller:method");
$router->delete("/route/{id}", "Controller:method");
*/
$router->group("ops");
$router->get("/{errcode}", function ($data){
    echo "<h1>Erro {$data["errcode"]}</h1>";
    var_dump($data);
});

/**
 * This method executes the routes
 */
$router->dispatch();

/*
 * Redirect all errors
 */
if ($router->error()) {
    $router->redirect("/ops/{$router->error()}");
}


