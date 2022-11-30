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
$router->get('/ingreso', [RegistroController::class, 'totem']);
$router->post('/ingreso', [RegistroController::class, 'totem']);


//Menu
$router->get('/menu', [MenuController::class, 'index']);
$router->get('/ingresoexitoso', [MenuController::class, 'ingresoexitoso']);
$router->get('/pedidoexitoso', [MenuController::class, 'pedidoexitoso']);
$router->get('/pago', [MenuController::class, 'finalizarcompra']);

//API de productos
$router->get('/api/productos',[APIController::class, 'index']);
$router->post('/api/orden',[APIController::class, 'ordenar']);
$router->get('/api/pago',[APIController::class, 'pago']);

$router->comprobarRutas();