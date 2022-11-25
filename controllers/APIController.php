<?php

namespace Controllers;

use Model\Productos;
use Model\Carrito;

class APIController {
    public static function index()
    {
        $productos = Productos::all();

        echo json_encode($productos);
    }
    public static function ordenar()
    {
        $carrito = new Carrito($_POST);
        
        $respuesta = $carrito->insercionCarro();
        /*$respuesta = [
            'hola' => $carrito
        ];*/
        echo json_encode($respuesta);
    }
}