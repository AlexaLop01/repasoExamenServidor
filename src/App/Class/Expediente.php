<?php

namespace App\Class;

use App\Modelo\ExpedienteModelo;
use DateTime;
use \JsonSerializable;

class Expediente implements JsonSerializable{

    //Los signos de interrogación se colocan para poder establecer el contenido de las variables a null en el constructor
    private ?string $referencia;
    private ?string $contenido;
    private ?DateTime $fechaModificacion;

    public function __construct(){
        $this->referencia = null;
        $this->contenido = null;
        $this->fechaModificacion = null;
    }

    public function getReferencia(): string
    {
        return $this->referencia;
    }

    public function setReferencia(string $referencia): Expediente
    {
        $this->referencia = $referencia;
        return $this;
    }

    public function getContenido(): string
    {
        return $this->contenido;
    }

    public function setContenido(string $contenido): Expediente
    {
        $this->contenido = $contenido;
        return $this;
    }

    public function getFechaModificacion(): DateTime
    {
        return $this->fechaModificacion;
    }

    public function setFechaModificacion(DateTime $fechaModificacion): Expediente
    {
        $this->fechaModificacion = $fechaModificacion;
        return $this;
    }

    public function jsonSerialize()
    {
        // Devolvemos en un return como un array asociativo las variables predefinidas anteriormente.
        return [
          'referencia' => $this->referencia,
          'contenido' => $this->contenido,
            //Tenemos que establecer el formato que queremos para la fecha, primero va el dia luego el mes y luego el año con la letra en mayúscula d/m/Y.
          'fechaModificacion' => $this->fechaModificacion->format("d/m/Y")
        ];
        // TODO: Implement jsonSerialize() method.
    }

    public function load($id){
        var_dump($id);
        ExpedienteModelo::consultarExpediente($id);
    }

    public function delete($id){
        ExpedienteModelo::deleteExpediente($id);
    }
}