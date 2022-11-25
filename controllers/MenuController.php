<?php

namespace Controllers;

use MVC\Router;
use Model\IngresoTotem;

class MenuController {
    public static function index (Router $router)
    {
        $router->render('menu/menu',[
            'mensaje' => 'Desde el menu'
        ]);
    }
    public static function estadoorden (Router $router)
    {
        $router->render('pago/estadoorden',[
            'mensaje' => 'Desde estadoorden'
        ]);
    }
    public static function pedidoexitoso (Router $router)
    {
        $router->render('pago/pedidoexitoso',[
            'mensaje' => 'Desde pedidoexitoso'
        ]);
    }
    public static function ingresoexitoso (Router $router)
    {
        $router->render2('menu/ingresoexitoso',[
            'mensaje' => 'Desde ingresoexitoso'
        ]);
    }
    public static function totem (Router $router)
    {
        $ingresoTotem = new IngresoTotem;

        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $rut= $_POST['rut'];
        
            $ingreso = $ingresoTotem->inserciontotem($rut);
            
            
        }
        $router->render2('menu/totem',[
            'ingresototem' => $ingresoTotem,
            'ingreso' => $ingreso
        ]);
    }

}