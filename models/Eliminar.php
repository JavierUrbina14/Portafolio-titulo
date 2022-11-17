<?php

namespace Model;

class Eliminar extends ActiveRecord{
    protected static $tabla = '';

    public $id_reserva;
    public $Cliente;
    public $rut_cliente;
    public $telefono_cliente;
    public $correo_cliente;
    public $fecha_hora_reserva;


    public function __construct($args = [])
    {
        $this->id_reserva = $args['id_reserva'] ?? '';
        $this->Cliente = $args['Cliente'] ?? '';
        $this->rut_cliente = $args['rut_cliente'] ?? '';
        $this->telefono_cliente = $args['telefono_cliente'] ?? '';
        $this->correo_cliente = $args['correo_cliente'] ?? '';
        $this->fecha_hora_reserva = $args['fecha_hora_reserva'] ?? '';
    }
    public static function buscacion($rutificacion)
    {
        $query = "call SP_buscarReserva('$rutificacion')";
        $resultado = self::consultarDB($query);
        return $resultado;
    }
    

}