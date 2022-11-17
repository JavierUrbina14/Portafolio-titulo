<?php

function obtenerProductos() : array {
    try {
        //code...
        require 'config/database.php';

        $db = conectarDB();

        $sql = "SELECT * FROM Producto";

        $consulta = mysqli_query($db, $sql);

        //Arreglo vacio

        $productos = [];

        $i = 0;


        while( $row = mysqli_fetch_assoc($consulta)) {
            $productos[$i]['id_producto'] = $row['id_producto'];
            $productos[$i]['nombre_producto'] = $row['nombre_producto'];
            $productos[$i]['precio_producto'] = $row['precio_producto'];
            $productos[$i]['imagen_producto'] = $row['imagen_producto'];

            $i++;

        }

        return $productos;

    } catch (\Throwable $th) {
        //throw $th;
        var_dump($th);
    }   
}

/*$servicios = obtenerProductos();

echo '<pre>';

var_dump($servicios);
echo '</pre>';*/

function incluirTemplates( $nombreTemplate ) {
    include "includes/templates/${nombreTemplate}.php";
}


function obtenerClientes ($rut) : array {
    try {
        //code...
        require 'config/database.php';

        $db = conectarDB();

        $clientes = [];

        $sql = "CALL SP_buscarReserva('$rut');";

        $consulta = mysqli_query($db, $sql);

        $clientes = [];

        $i = 0;


        while( $row = mysqli_fetch_assoc($consulta)) {
            $clientes[$i]['id_reserva'] = $row['id_reserva'];
            $clientes[$i]['Cliente'] = $row['Cliente'];
            $clientes[$i]['rut_cliente'] = $row['rut_cliente'];
            $clientes[$i]['telefono_cliente'] = $row['telefono_cliente'];
            $clientes[$i]['correo_cliente'] = $row['correo_cliente'];
            $clientes[$i]['fecha_hora_reserva'] = $row['fecha_hora_reserva'];
            $i++;
            

        }

        return $clientes;

        
    } catch (\Throwable $th) {
        //throw $th;
        var_dump($th);
    }
}
/*
$servicios = obtenerClientes('20576204-3');

echo '<pre>';

var_dump($servicios);
echo '</pre>';*/

function conectarDB2() : mysqli {
    $db = mysqli_connect('localhost', 'root', 'root', 'restaurantxxi');

    if(!$db) {
        echo "No se ha conectado la bd";
        exit;
    }

    return $db;
}

function debuguear($variable){
    echo '<pre>';
    var_dump($variable);
    echo '</pre>';
}