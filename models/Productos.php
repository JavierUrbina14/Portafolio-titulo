<?php

namespace Model;

class Productos extends ActiveRecord{
    protected static $tabla = 'Producto';

    public $id_producto;
    public $nombre_producto;
    public $precio_producto;
    public $imagen_producto;
    public $estado_producto;
    public $tipoproducto_id;

    public function __construct($args = [])
    {
        $this->id_producto = $args['id_producto'] ?? '';
        $this->nombre_producto = $args['nombre_producto'] ?? '';
        $this->precio_producto = $args['precio_producto'] ?? '';
        $this->imagen_producto = $args['imagen_producto'] ?? '';
        $this->estado_producto = $args['estado_producto'] ?? '';
        $this->tipoproducto_id = $args['tipoproducto_id'] ?? '';
        
    }

}