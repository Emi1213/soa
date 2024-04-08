<?php 
    header('Content-Type: application/json');
    $objeto = new stdClass();

    $nombre= "nombre";
    $apellido= "apellido";
    $edad= "edad";

    $objeto -> $nombre = "Nuñez";
    $objeto -> $apellido = "Perez";
    $objeto -> $edad = 30;
    echo json_encode($objeto);

    


    $lista = '{"nombre":"Nuñez","apellido":"Perez","edad":"30"}';