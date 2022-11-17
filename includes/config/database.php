<?php

function conectarDB() : mysqli {
    $db = new mysqli('localhost', 'root', 'root', 'restaurantxxi');

    if(!$db) {
        echo "No se ha conectado la bd";
        exit;
    }

    return $db;
}