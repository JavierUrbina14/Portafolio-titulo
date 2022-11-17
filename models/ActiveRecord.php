<?php

namespace Model;

class ActiveRecord{
    protected static $db;
    protected static $tabla = '';

    

    public static function setDB($database)
    {
        self::$db = $database;
    }

    public static function all()
    {
        //Consultando todas las propiedades
        $query = 'SELECT * FROM ' . static::$tabla;
        $resultado = self::consultarDB($query);
        return $resultado;
        
    }
    public static function consultarDB($query)
    {
        //Consultar la BD
        $resultado = self::$db->query($query);

        //Iterar los resultado
        $array = [];
        while($registro = $resultado->fetch_assoc()){
            $array[] = self::crearObjeto($registro);
        }

        //liberar la memoria
        $resultado->free();

        //Retornar los resultados
        return $array;
    }

    protected static function crearObjeto($registro)
    {
        $objeto = new static;
        

        foreach($registro as $key => $value) {
            if(property_exists ($objeto, $key)){
                $objeto->$key = $value;
            }

        }
        return $objeto;
    }
    
    
}