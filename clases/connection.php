<?php
class Connection{
    public function getConnection (){
        define('DB_SERVER', 'localhost');
        define('DB_USERNAME', 'root');
        define('DB_PASSWORD', '');
        define('DB_NAME', 'soa');  

        $opc = array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8");

        try {
            $conn = new PDO("mysql:host=" . DB_SERVER . ";dbname=" . DB_NAME, DB_USERNAME, DB_PASSWORD, $opc);
        } catch (Exception $e) {
            //throw $th;
            die('Error: ' . $e->getMessage());
        }
        return $conn;
    }
}