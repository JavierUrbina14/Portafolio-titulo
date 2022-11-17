<?php

namespace Model;


class Reserva extends ActiveRecord{

    protected static $tabla = 'Reserva';

    public $id_reserva;
    public $clientes_id;
    public $mesa_id;
    public $fecha_hora_reserva;

    public function __construct($args = [])
    {
        $this->id_reserva = $args['id_reserva'] ?? null;
        $this->clientes_id = $args['clientes_id'] ?? '';
        $this->mesa_id = $args['mesa_id'] ?? '';
        $this->fecha_hora_reserva = $args['fecha_hora_reserva'] ?? '';
    }

    public static function getReservas()
    {
        //Consultando todas las propiedades
        $query = 'SELECT * FROM ' . static::$tabla;
        $resultado = self::consultarDB($query);
        return $resultado;
        
    }
    
    public static function find($id)
    {
        $query = "SELECT * FROM Reserva WHERE id_reserva = ${id}";
        $resultado = self::consultarDB($query);
        return array_shift($resultado);
    }
    public function eliminar()
    {
        $query = "DELETE FROM Reserva WHERE id_reserva = " . $this->id_reserva;
        $resultado = self::$db->query($query);
        if($resultado) {
            header('location: /');
        }
    }


}