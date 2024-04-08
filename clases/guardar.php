<?php 

class Guardar{
    public static function setStudent(){
        include 'connection.php';

        $objeto = new Connection();
        $connect = $objeto->getConnection();
        $cedula = isset($_POST['cedula']) ? $_POST['cedula'] : '';
        $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : '';
        $apellido = isset($_POST['apellido']) ? $_POST['apellido'] : '';
        $telefono = isset($_POST['telefono']) ? $_POST['telefono'] : '';
        $direccion = isset($_POST['direccion']) ? $_POST['direccion'] : '';
        $sql = "INSERT INTO student (id, name, lastname, address, cellphone) VALUES ('$cedula', '$nombre', '$apellido', '$direccion', '$telefono')";
        $result= $connect->prepare($sql);
        $result->execute();
        echo json_encode($result);
    }
}


