<?php

namespace Model;

class Mesa extends ActiveRecord{
    protected static $tabla = 'Mesa';

    public $id_mesa;
    public $numero_mesa;
    public $mesa_disponible;

    public function __construct($args = [])
    {
        $this->id_mesa = $args['id_mesa'] ?? null;
        $this->numero_mesa = $args['numero_mesa'] ?? '';
        $this->mesa_disponible = $args['mesa_disponible'] ?? '';
    }

    public static function traermesas()
    {
        $query = 'SELECT * FROM mesa WHERE mesa_disponible = true;';
        $resultado = self::consultarDB($query);
        return $resultado;
    }
    public static function traermesastotem()
    {
        $query = 'SELECT numero_mesa
        from reserva
        inner join mesa
        on mesa_id = mesa.id_mesa
        ORDER BY id_reserva DESC LIMIT 1';
        $resultado = self::consultarDB($query);
        
        return $resultado;
        
    }
    
}