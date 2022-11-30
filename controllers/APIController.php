<?php

namespace Controllers;

use Model\Productos;
use Model\Carrito;
use Model\Pago;

class APIController {
    public static function index()
    {
        $productos = Productos::all();

        echo json_encode($productos);
    }
    public static function pago()
    {
        $pago = Pago::all();

        $respuesta = [
            'pago' => $pago
        ];

        echo json_encode($pago);
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