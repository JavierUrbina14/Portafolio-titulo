<?php

require 'funciones.php';
require 'config/database.php';
require __DIR__ . '/../vendor/autoload.php';

$db = conectarDB();


use Model\Productos;
use Model\Registro;
use Model\ActiveRecord;
use Model\Reservas;
use Model\Mesa;

Registro::setDB($db);


define('TEMPLATES_URL', '/templates');
define('FUNCIONES_URL', 'funciones.php');