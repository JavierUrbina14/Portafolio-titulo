<?php

namespace Controllers;
use MVC\Router;
use Model\Productos;
use Model\Registro;
use Model\Mesa;
use Model\Eliminar;
use Model\Reserva;
use Model\IngresoTotem;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


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
                sleep(2);
                header('Location: /');
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
                sleep(2);
                $busqueda->eliminar();
            }        
        }
           
        $router->render('reservacion/eliminar',[
            'llamado' => $llamado
        ]);
    }

    public static function totem(Router $router)
    {
        $errores = IngresoTotem::getValidaciontotem();
        

        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $ingresototem = new IngresoTotem($_POST);
            $errores = $ingresototem->validartotem();


            if (empty($errores)){
                $ingresototem->inserciontotem();
                
            }  
           
        }
        $router->render2('menu/totem',[
            'errores' => $errores,
            'ingresototem' => $ingresototem
        ]);
    }
    public static function pagado(Router $router){

        //if($_SERVER['REQUEST_METHOD'] === 'GET'){
            
        //};
        
        $router->render2('pago/pagado');
    }
    public static function pagadoefectivo(Router $router){
        $router->render2('pago/pagoefectivo');
    }
}