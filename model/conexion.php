<?php

class  Conexion{

    public function conectar(){
        define('DB_SERVER', 'localhost');
        define('DB_USERNAME', 'root');
        define('DB_PASSWORD', '');
        define('DB_NAME', 'soa');

        $opc = array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8");

        try {
            $connection = new PDO("mysql:host=" .DB_SERVER.";dbname=".DB_NAME, DB_USERNAME, DB_PASSWORD, $opc);
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
        return $connection;
    }
}