<?php 
include_once 'consulta.php';
include_once 'guardar.php';
include_once 'borrar.php';


$opc=$_SERVER['REQUEST_METHOD'];
switch($opc){
    case "GET":
            Consulta::getConsult();
            break;
    case "POST":
            Guardar::setStudent();
            break;
    case "DELETE":
            Borrar::deleteStundent();
            break;
    case "PUT":
            $result= "You're in a PUT";
            echo $result;
            break;
}

