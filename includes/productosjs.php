<?php

    require 'funciones.php';
    $productosarray = obtenerProductos();
    echo json_encode($productosarray);