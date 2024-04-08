<?php

class Borrar{
    public static function deleteStundent(){
        include 'connection.php';
        $objeto = new Connection();
        $connect = $objeto->getConnection();

        $cedula = isset($_GET['cedula']) ? $_GET['cedula'] : '';
        $sql = "DELETE FROM student WHERE id = '$cedula'";
        $result= $connect->prepare($sql);
        $result->execute();
        echo json_encode($result);
    }
}