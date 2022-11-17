<?php

namespace Model;

class Registro extends ActiveRecord{

    
      //Validaciones
    protected static $errores = [];
    


    public $nombre;
    public $apellido;
    public $rut;
    public $cel;
    public $correo;
    public $mesa;
    public $fecha;

    public function __construct($args = [])
    {
        $this->nombre = $args['nombre'] ?? '';
        $this->apellido = $args['apellido'] ?? '';
        $this->rut = $args['rut'] ?? '';
        $this->cel = $args['cel'] ?? '';
        $this->correo = $args['correo'] ?? '';
        $this->mesa = $args['mesa'] ?? '';
        $this->fecha = $args['fecha'] ?? '';
    }

    public function insercion()
    {
        $query = "call SP_reservacion('$this->nombre','$this->apellido','$this->rut','$this->cel','$this->correo','$this->mesa','$this->fecha')";
        $resultado = self::$db->query($query);
    }
    public function eliminacion()
    {
        $query = "call SP_reservacion('$this->nombre','$this->apellido','$this->rut','$this->cel','$this->correo','$this->mesa','$this->fecha')";
        $resultado = self::$db->query($query);
    }


    public static function getValidacion()
    {
        return self::$errores;
    }
    
    public function validar()
    {
        if (!$this->nombre){
            self::$errores[] = "¡Debes ingresar tu nombre!";
        }
        if (!$this->apellido){
            self::$errores[] = "¡Debes ingresar tu apellido!";
        }
        if (!$this->rut){
            self::$errores[] = "¡Debes ingresar tu rut!";
        }
        if (!$this->cel){
            self::$errores[] = "¡Debes ingresar tu numero celular!";
        }
        if (!$this->correo){
            self::$errores[] = "¡Debes ingresar tu correo electronico!";
        }
        if (!$this->mesa){
            self::$errores[] = "¡Debes ingresar una mesa valida!";
        }
        if (!$this->fecha){
            self::$errores[] = "¡Debes ingresar una fecha valida!";
        }

        return self::$errores;
    }

    
}
