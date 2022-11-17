<?php

namespace Model;

class IngresoTotem extends ActiveRecord{

    //base de datos


    public $rut;

    public function __construct($run)
    {
        $this->rut = $run;
    }

    public function insercion()
    {
        $inyeccion = "call SP_reservacionTotem('$this->rut');";
        $resultado = self::$db->query($inyeccion);
    }


}