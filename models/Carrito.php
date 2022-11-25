<?php

namespace Model;

class Carrito extends ActiveRecord {
    public $producto_id;
    public $cantidad_producto;

    public function __construct($args = [])
    {
        $this->producto_id = $args['producto_id'] ?? '';
        $this->cantidad_producto = $args['cantidad_producto'] ?? '';
    }
    public function insercionCarro()
    {
        $query = "INSERT INTO carrito2 (producto_id, cantidad_producto) VALUES ('$this->producto_id','$this->cantidad_producto')";
        $resultado = self::$db->query($query);
        
    }
}