<?php

namespace Model;

class IngresoTotem extends ActiveRecord{

    //base de datos


    public $id_invitado;
    public $rut_invitado;
    public $fecha_ingreso;

    public function __construct($args = [])
    {
        $this->id_invitado = $args['id_invitado'] ?? null;
        $this->rut_invitado = $args['rut_invitado'] ?? '';
        $this->fecha_ingreso = $args['fecha_ingreso'] ?? '';
    }

    public function inserciontotem($rutificador)
    {
        $inyecciontotem = "call SP_reservacionTotem('$rutificador');";
        $resultado = self::$db->query($inyecciontotem);
        if($resultado) {
            header('location: /ingresoexitoso');
        }

    }


}