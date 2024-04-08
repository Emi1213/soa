<?php
include "conexion.php";

class Estudiante{

    private $conexion;
    public function __construct() {
        $conect = new Conexion();
        $this->conexion = $conect->conectar();
    }

    public function insertarEstudiante($cedula, $nombre, $apellido, $direccion, $telefono){
        try {
            if(!$this->validarDatos($cedula, $nombre, $apellido, $direccion, $telefono)){
                http_response_code(400);
                return json_encode(["error" => "No se han enviado todos los datos"]);
            }else{
                $sql = "INSERT INTO student (cedula, nombre, apellido, direccion, telefono) VALUES ('$cedula', '$nombre', '$apellido', '$direccion', '$telefono')";
                $resultado = $this->conexion->prepare($sql);
                $resultado->execute();

                if($resultado->rowCount() == 0){
                    http_response_code(400);
                    return json_encode(["error" => "No se ha podido crear el estudiante"]);
                }

                http_response_code(201);
                return json_encode(["mensaje" => "Estudiante creado correctamente"]);
            }
        } catch (Exception $e) {
            http_response_code(500);
            return json_encode(["error" => $e->getMessage()]);
        }
    }

    public function obtenerEstudiantes(){
        try {
            $sql= "SELECT * FROM student";
            $resultado = $this->conexion->prepare($sql);
            $resultado->execute();
            $data = $resultado->fetchAll(PDO::FETCH_ASSOC);
            return json_encode($data);
        } catch (Exception $e) {
            http_response_code(500);
            return json_encode(["error" => $e->getMessage()]);
        }
    }

    public function updateEstudiante($cedula, $nombre, $apellido, $direccion, $telefono){
        try {
            if(!$this->validarDatos($cedula, $nombre, $apellido, $direccion, $telefono)){
                http_response_code(400);
                return json_encode(["error" => "No se han enviado todos los datos"]);
            }

            $sql= "UPDATE student set nombre= '$nombre', apellido= '$apellido', direccion= '$direccion', telefono= '$telefono' WHERE cedula= '$cedula'";
            $resultado = $this->conexion->prepare($sql);
            $resultado->execute();

            if($resultado->rowCount() == 0){
                http_response_code(400);
                return json_encode(["error" => "No se ha podido actualizar el estudiante"]);
            }

            http_response_code(201);
            return json_encode(["mensaje" => "Estudiante actualizado correctamente"]);

        } catch (Exception $e) {
            http_response_code(500);
            return json_encode(["error" => $e->getMessage()]);
        }

    }

    public function eliminarEstudiante($cedula){
        try {
            if(empty($cedula)){
                http_response_code(400);
                return json_encode(["error" => "No se ha enviado la cedula"]);
            }

            $sql= "DELETE FROM student WHERE cedula= '$cedula'";
            $resultado = $this->conexion->prepare($sql);
            $resultado->execute();

            if($resultado->rowCount() == 0){
                http_response_code(400);
                return json_encode(["error" => "No se ha podido eliminar el estudiante"]);
            }

            http_response_code(201);
            return json_encode(["mensaje" => "Estudiante eliminado correctamente"]);
        } catch (Exception $e) {
            http_response_code(500);
            return json_encode(["error" => $e->getMessage()]);
        } 
    }

    public function obtenerEstudiante($cedula){
        try {
            if(empty($cedula)){
                http_response_code(400);
                return json_encode(["error" => "No se ha enviado la cedula"]);
            }

            $sql= "SELECT * FROM student WHERE cedula= '$cedula'";
            $resultado = $this->conexion->prepare($sql);
            $resultado->execute();
            $data = $resultado->fetchAll(PDO::FETCH_ASSOC);

            if($resultado->rowCount() == 0){
                http_response_code(400);
                return json_encode(["error" => "No se ha encontrado el estudiante"]);
            }

            http_response_code(201);
            return json_encode($data);

        } catch (Exception $e) {
            http_response_code(500);
            return json_encode(["error" => $e->getMessage()]);
        }
    }


    public function validarDatos($cedula, $nombre, $apellido, $direccion, $telefono){
        if(empty($cedula) || empty($nombre) || empty($apellido) || empty($direccion) || empty($telefono)){
            return false;
        }else{
            return true;
        }
    }
}