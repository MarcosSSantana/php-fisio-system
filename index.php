<?php
require __DIR__."/vendor/autoload.php";
use CoffeeCode\Router\Router;

$router = new Router("http://localhost:8888/fisio-system");

$router->namespace("Source\Controllers");
$router->group(null);
$router->get("/", "Main:inicio");
$router->get("/paciente", "ctlPaciente:inicio");
$router->post("/paciente", "ctlPaciente:cadastro");
$router->get("/login", "Main:login");
/*
$router->post("/route/{id}", "Controller:method");
$router->put("/route/{id}/profile", "Controller:method");
$router->patch("/route/{id}/profile/{photo}", "Controller:method");
$router->delete("/route/{id}", "Controller:method");
*/

/**
 * This method executes the routes
 */
$router->dispatch();

/*
 * Redirect all errors
 */
if ($router->error()) {
    $router->redirect("name.hello");
}

