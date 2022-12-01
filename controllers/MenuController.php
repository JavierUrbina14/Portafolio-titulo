<?php

namespace Controllers;

use MVC\Router;
use Model\IngresoTotem;
use Model\Mesa;

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
        $mesaobtenida = Mesa::traermesastotem();
       

        $router->render2('menu/ingresoexitoso',[
            'mesaobtenida' => $mesaobtenida
        ]);
    }
}