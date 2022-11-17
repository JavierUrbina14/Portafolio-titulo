<?php

require_once __DIR__ . '/../includes/app.php';

use MVC\Router;
use Controllers\RegistroController;
use Controllers\APIController;
use Controllers\MenuController;

$router = new Router();



$router->get('/', [RegistroController::class, 'index']);
$router->get('/reservacion', [RegistroController::class, 'reservacion']);
$router->post('/reservacion', [RegistroController::class, 'reservacion']);
$router->get('/reservacion/buscar', [RegistroController::class, 'buscar']);
$router->get('/reservacion/eliminar', [RegistroController::class, 'seleccionar']);
$router->post('/reservacion/eliminar', [RegistroController::class, 'eliminar']);


//Menu
$router->get('/menu', [MenuController::class, 'index']);

//API de productos
$router->get('/api/productos',[APIController::class, 'index']);

$router->comprobarRutas();