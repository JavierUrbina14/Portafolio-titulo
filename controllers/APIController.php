<?php

namespace Controllers;

use Model\Productos;
use Model\Carrito;
use Model\Pago;
use Model\Pagopaypal;

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
    public static function pagopaypal()
    {
        $pagopaypal = new Pagopaypal($_POST);
        $respuesta = $pagopaypal->insercionpaypal();
        echo json_encode($respuesta);
    }
}