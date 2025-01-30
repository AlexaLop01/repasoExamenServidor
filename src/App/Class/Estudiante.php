<?php

namespace App\Class;

use App\Modelo\EstudianteModelo;
use Ramsey\Uuid\Type\Integer;
use \JsonSerializable;

//Usamos la implementación del jsonSerializable.
class Estudiante implements JsonSerializable{

    //Variables
    private integer $nia;
    private string $nombre;
    private string $correo;

    private Expediente $expediente;

    /**
     * @param int $nia
     * @param string $nombre
     * @param string $correo
     */
    public function __construct(int $nia, string $nombre, string $correo)
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


    public function jsonSerialize()
    {
        //Devolvemos con un return en forma de array asociativo las variables predefinidas anteriormente.
        return [
          'NIA' => $this->nia,
          'nombre' => $this->nombre,
          'correo' => $this->correo,
          'expediente' => $this->expediente
        ];
    }
}