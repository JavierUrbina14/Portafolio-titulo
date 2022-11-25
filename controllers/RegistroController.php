<?php

namespace Controllers;
use MVC\Router;
use Model\Productos;
use Model\Registro;
use Model\Mesa;
use Model\Eliminar;
use Model\Reserva;


class RegistroController{

    public static function index(Router $router){
        $router->render('/index');
    }
    public static function reservacion(Router $router){

        $errores = Registro::getValidacion();

        //Consulta para la mesa
        $mesas = Mesa::traermesas();
    
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $registro = new Registro($_POST);
            $errores = $registro->validar();
        

            if (empty($errores)){
                $registro->insercion();
                header('Location: /index.php');
            }           
        }
        
        $router->render('reservacion/reservacion',[
            'mesas' => $mesas,
            'errores' => $errores,
            'registro' => $registro
        ]);
    }
    public static function buscar(Router $router){
        $router->render('reservacion/buscar');
    }
    public static function seleccionar(Router $router){
        $rut = $_GET['rut'];
        $llamado = Eliminar::buscacion($rut);
        $router->render('reservacion/eliminar',[
            'llamado' => $llamado
        ]);
    }
    public static function eliminar(Router $router){
        
        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            $identificador = $_POST['idreserva'];
            if($identificador){
                $busqueda = Reserva::find($identificador);
                $busqueda->eliminar();
                debuguear($busqueda);
            }
            //$busqueda = Reserva::find($identificador);
            
        }
            //echo ($identificador);
           /* echo "DELETE FROM Reserva WHERE id_reserva = ${identificador}";
            $resultado = mysqli_query($db,"DELETE FROM Reserva WHERE id_reserva = ${identificador}");
            if($resultado) {
                //header('location: /index.php');
            }
        }*/
        $router->render('reservacion/eliminar',[
            'llamado' => $llamado
        ]);
    }
    
}