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

    public static function consultarExpediente(string $referencia):Expediente{
        $conexion = ExpedienteModelo::conexionAlaBD();
        /*Hacemos el select a la base de datos , con los parametros, cabe recalcar que
        la fecha le ponemos el formato que deseamos que nos devuelva , ya que se guarda en formato ingles,
        ya después colocamos de donde y con que referencia , que es la que nos pasa por parámetro en la función.*/
    echo 'Estoy dentro'.$referencia;
        $sql = "SELECT referencia, contenido, date_format(fecha, 'd/m/Y') as fechaModificacion from expediente WHERE referencia = ?";

        $sentencia = $conexion->prepare($sql);
        $sentencia->bindValue(1,$referencia);

        $resultado = $sentencia->execute();

        $expediente = new Expediente();
        $expediente->setReferencia($resultado['referencia']);
        $expediente->setContenido($resultado['contenido']);
        $expediente->setFechaModificacion(DateTime::createFromFormat($resultado['fechaModificacion'], 'd/m/Y'));

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