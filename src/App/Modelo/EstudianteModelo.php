<?php

namespace App\Modelo;
use App\Class\Estudiante;
USE \PDO;
use \PDOException;

class EstudianteModelo
{
    private static function conexionAlaBD(){
        try{
            $conexion = new PDO("mysql:host=".NOMBRE_CONTAINER_DATABASE.";dbname=".NOMBRE_DATABASE,
                USUARIO_DATABASE,
                PASS_DATABASE);
            $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $conexion;
        }catch (PDOException $e){
            echo "Fallo en la conexion".$e->getMessage();
        }
        return null;
    }

    public static function guardarEstudiante(Estudiante $estudiante){
        $conexion=EstudianteModelo::conexionAlaBD();

        $sql="INSERT INTO estudiante(nia, nombre, correo) values (:nia, :nombre, :correo)";

        $sentencia=$conexion->prepare($sql);
        $sentencia->bindValue("nia",$estudiante->getNia());
        $sentencia->bindValue("nombre",$estudiante->getNombre());
        $sentencia->bindValue("correo",$estudiante->getCorreo());

        $sentencia->execute();

    }

}