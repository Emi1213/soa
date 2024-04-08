<?php


class Consulta{
    public static function getConsult(){
        include 'connection.php';
        $objeto = new Connection();
        $connect = $objeto->getConnection();
        $sql = "SELECT * FROM student";	
        $result = $connect->prepare($sql);
        $result->execute();
        $data = $result->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($data);
    }

}