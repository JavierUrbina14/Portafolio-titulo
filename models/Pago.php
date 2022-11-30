<?php

namespace Model;

class Pago extends ActiveRecord{
    public static $tabla = 'informacionfinal';

    public $producto; 
    public $precio_unitario;
    public $cantidad;
    public $mesa;
    public $cliente;
    public $total;

    public function __construct($args = [])
    {
        $this->producto = $args['producto'] ?? null;
        $this->precio_unitario = $args['precio_unitario'] ?? '';
        $this->cantidad = $args['cantidad'] ?? '';
        $this->mesa = $args['mesa'] ?? '';
        $this->cliente = $args['cliente'] ?? '';
        $this->total = $args['total'] ?? '';
    }
}