<?php

namespace App\Class;

use App\Modelo\EstudianteModelo;
use Ramsey\Uuid\Type\Integer;
use \JsonSerializable;

//Usamos la implementación del jsonSerializable.
class Estudiante{

    //Variables
    private int $nia;
    private string $nombre;
    private string $correo;

    private Expediente $expediente;

    /**
     * @param int $nia
     * @param string $nombre
     * @param string $correo
     */
    public function __construct(int $nia = 0, string $nombre = "", string $correo = "")
    {
        $this->nia = $nia;
        $this->nombre = $nombre;
        $this->correo = $correo;
    }


    //getter y setters
    public function getNia(): int
    {
        return $this->nia;
    }

    public function setNia(int $nia): Estudiante
    {
        $this->nia = $nia;
        return $this;
    }

    public function getCorreo(): string
    {
        return $this->correo;
    }

    public function setCorreo(string $correo): Estudiante
    {
        $this->correo = $correo;
        return $this;
    }

    public function getNombre(): string
    {
        return $this->nombre;
    }

    public function setNombre(string $nombre): Estudiante
    {
        $this->nombre = $nombre;
        return $this;
    }

    public function getExpediente(): Expediente
    {
        return $this->expediente;
    }

    public function setExpediente(Expediente $expediente): Estudiante
    {
        $this->expediente = $expediente;
        return $this;
    }

    //Funciones
    public function save(){
        EstudianteModelo::guardarEstudiante($this);
    }

    public function convertirAJson(array $expediente){
       $array =[
           "nia" => $expediente["nia"],
           "nombre" => $expediente["nombre"],
           "correo" => $expediente["correo"],
       ];
       return json_encode($array);
    }
}
