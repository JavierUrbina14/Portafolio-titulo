<?php

namespace MVC;

class Router {

    public $rutasGET = [];
    public $rutasPOST = [];

    public function get($url, $fn)
    {
        $this->rutasGET[$url] = $fn;
    }
    public function post($url, $fn)
    {
        $this->rutasPOST[$url] = $fn;
    }
    
    public function comprobarRutas()
    {
        $urlActual = $_SERVER['PATH_INFO'] ?? '/';
        $metodo = $_SERVER['REQUEST_METHOD'];

        if($metodo === 'GET'){
            $fn = $this->rutasGET[$urlActual] ?? null;
        }
        else{
            
            $fn = $this->rutasPOST[$urlActual] ?? null;
        }
        if($fn){
            call_user_func($fn, $this);
        }else{
            echo 'pagina no encontrada';
        }

        
    }

    //Muestra una vista

    public function render($view, $datos = [] )
    {
        //debuguear($datos);
        foreach($datos as $key => $value) {
            $$key = $value;
        }


        ob_start();
        include __DIR__ . "/views/$view.php";
        
        $contenido = ob_get_clean();

        include __DIR__ . "/views/layout.php";
    }
    public function render2($view, $datos = [] )
    {
        //debuguear($datos);
        foreach($datos as $key => $value) {
            $$key = $value;
        }


        ob_start();
        include __DIR__ . "/views/$view.php";
        
        $contenido2 = ob_get_clean();

        include __DIR__ . "/views/layoutdefault.php";
    }
}