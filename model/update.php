<?php

include "./conexion.php";

$conexion = new Conexion();
$conect= $conexion->conectar();

$cedula = $_GET['cedula'];
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$direccion = $_POST['direccion'];
$telefono = $_POST['telefono'];

$consulta = "UPDATE student SET nombre = '$nombre', apellido = '$apellido', direccion = '$direccion', telefono = '$telefono' WHERE cedula = '$cedula'";

$resultado = $conect->prepare($consulta);
$resultado->execute();

$response = array();

if($resultado->rowCount() == 0){
    $response['status'] = 'error';
    $response['message'] = 'Error al actualizar el estudiante';
}

    $response['status'] = 'success';
    $response['message'] = 'Estudiante actualizado correctamente';


echo json_encode($response);