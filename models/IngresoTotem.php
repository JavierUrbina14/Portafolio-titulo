<?php

namespace Model;

class IngresoTotem extends ActiveRecord{

    //base de datos
    protected static $errores = [];

    public $rut;
    public $correo;

    public function __construct($args = [])
    {
        $this->rut = $args['rut'] ?? '';
        $this->correo = $args['correo'] ?? '';
    }

    public function inserciontotem()
    {
        $inyecciontotem = "call SP_reservacionTotem('$this->rut','$this->correo');";
        $resultado = self::$db->query($inyecciontotem);
        if($resultado){
            header('location: /ingresoexitoso');
        }
        

    }

    public static function getValidaciontotem()
    {
        return self::$errores;
    }

    public function validartotem()
    {
        if (!$this->rut){
            self::$errores[] = "¡Debes ingresar tu rut!";
        }
        if (!$this->correo){
            self::$errores[] = "¡Tu correo electronico es necesario para emitir tu boleta!";
        }
        return self::$errores;
    }


}