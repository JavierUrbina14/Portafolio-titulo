<?php

namespace Model;

class Pagopaypal extends ActiveRecord {

    public $clavetransaccion;
    public $total_newventa;
    public $estado_newventa;

    public function __construct($args = [])
    {
        $this->clavetransaccion = $args['clavetransaccion'] ?? '';
        $this->total_newventa = $args['total_newventa'] ?? '';
        $this->estado_newventa = $args['estado_newventa'] ?? '';
    }
    public function insercionpaypal()
    {
        $query = "INSERT into Ventas (clavetransaccion,fecha_newventa,total_newventa,estado_newventa,tipopago) values ('$this->clavetransaccion',now(),'$this->total_newventa','$this->estado_newventa','Paypal')";
        $resultado = self::$db->query($query);
    }
}