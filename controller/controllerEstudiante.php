<?php

include "../model/estudiante.php";
$opc=$_SERVER['REQUEST_METHOD'];

$estudiante= new Estudiante();
switch ($opc) {
    case 'GET':
        $result=$estudiante->obtenerEstudiantes();
        echo $result;
        break;
    case 'POST':
        $cedula = isset($_POST['cedula']) ? $_POST['cedula'] : '';
        $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : '';
        $apellido = isset($_POST['apellido']) ? $_POST['apellido'] : '';
        $direccion = isset($_POST['direccion']) ? $_POST['direccion'] : '';
        $telefono = isset($_POST['telefono']) ? $_POST['telefono'] : '';
        $result=$estudiante->insertarEstudiante($cedula, $nombre, $apellido, $direccion, $telefono);
        echo $result;
        break;

    case 'PUT':
        $cedula = isset($_GET['cedula']) ? $_GET['cedula'] : '';
        $nombre = isset($_GET['nombre']) ? $_GET['nombre'] : '';
        $apellido = isset($_GET['apellido']) ? $_GET['apellido'] : '';
        $direccion = isset($_GET['direccion']) ? $_GET['direccion'] : '';
        $telefono = isset($_GET['telefono']) ? $_GET['telefono'] : '';
        $result=$estudiante->updateEstudiante($cedula, $nombre, $apellido, $direccion, $telefono);
        echo $result;
        break;

    case 'DELETE':
        $cedula = isset($_GET['cedula']) ? $_GET['cedula'] : '';
        $result=$estudiante->eliminarEstudiante($cedula);
        echo $result;
        break;
    
    default:
        $result= "Metodo no valido";
        echo $result;
        break;
}