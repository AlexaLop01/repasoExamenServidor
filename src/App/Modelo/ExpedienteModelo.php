<?php

namespace App\Modelo;

use App\Class\Expediente;
use \DateTime;
use PDO;

class ExpedienteModelo
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

    public static function consultarExpediente(string $referencia): ?Expediente {
        $conexion = ExpedienteModelo::conexionAlaBD();

        if (!$conexion) {
            echo "Error en la conexión a la base de datos\n";
            return null;
        }

        $sql = "SELECT referencia, contenido, date_format(fecha_modificacion, '%d/%m/%Y') as fechaModificacion FROM expediente WHERE referencia = ?";
        $sentencia = $conexion->prepare($sql);
        $sentencia->bindValue(1, $referencia);

        if (!$sentencia->execute()) {
            echo "Error al ejecutar la consulta SQL\n";
            return null;
        }

        $resultado = $sentencia->fetch(PDO::FETCH_ASSOC);

        if (!$resultado) {
            echo "No se encontraron resultados en la BD\n";
            return null;
        }

        $expediente = new Expediente();
        $expediente->setReferencia($resultado['referencia']);
        $expediente->setContenido($resultado['contenido']);
        $expediente->setFechaModificacion(DateTime::createFromFormat('d/m/Y', $resultado['fechaModificacion']));

        return $expediente;
    }


    public static function deleteExpediente(string $referencia){
        $conexion = ExpedienteModelo::conexionAlaBD();

        $sql = "DELETE FROM expediente WHERE referencia = ?";

        $sentencia = $conexion->prepare($sql);

        $sentencia->bindValue(1,$referencia);

        $resultado = $sentencia->execute();

    }
}