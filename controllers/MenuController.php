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
    public static function finalizarcompra (Router $router)
    {
        $router->render('pago/finalizarcompra',[
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
}