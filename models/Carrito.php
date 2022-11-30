<?php

namespace Model;

class Carrito extends ActiveRecord {
    public $producto_id;
    public $cantidad_producto;
    public $reserva_id;

    public function __construct($args = [])
    {
        $this->producto_id = $args['producto_id'] ?? '';
        $this->cantidad_carrito = $args['cantidad_carrito'] ?? '';
        $this->reserva_id = $args['reserva_id'] ?? null;
    }
    public function insercionCarro()
    {
        $query = "INSERT INTO carrito (producto_id, cantidad_carrito, reserva_id) VALUES ('$this->producto_id','$this->cantidad_carrito','$this->reserva_id')";
        
        $resultado = self::$db->query($query);
        
        
    }
}