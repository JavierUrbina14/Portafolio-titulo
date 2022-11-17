<?php

namespace Controllers;

use Model\Productos;

class APIController {
    public static function index()
    {
        $productos = Productos::all();

        echo json_encode($productos);
    }
}