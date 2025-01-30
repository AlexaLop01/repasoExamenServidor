<?php

namespace App\Class;

use App\Modelo\ExpedienteModelo;
use DateTime;
use JsonSerializable;

class Expediente {


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




    public function load($id){
        $expediente = ExpedienteModelo::consultarExpediente($id);

        return $expediente;
    }




    public function delete($id){
        ExpedienteModelo::deleteExpediente($id);
    }

}