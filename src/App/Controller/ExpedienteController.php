<?php

namespace App\Controller;

use App\Class\Estudiante;
use App\Class\Expediente;
use App\Controller\InterfaceController;
use App\Modelo\ExpedienteModelo;

class ExpedienteController implements InterfaceController
{

    public function index($api)
    {
        // TODO: Implement index() method.
    }

    public function create($api)
    {
        // TODO: Implement create() method.
    }

    public function store($api)
    {
        // TODO: Implement store() method.
    }

    public function edit($id, $api)
    {
        // TODO: Implement edit() method.
    }

    public function update($id, $api)
    {
        // TODO: Implement update() method.
    }

    public function show($id, $api)
    {
        var_dump($id);
        $expediente = new Expediente();
        $data = $expediente->load($id);

        if (!$data) {
            echo "Expediente no encontrado\n";
            return;
        }

        echo "Referencia: " . $data->getReferencia() . "\n";
        echo "Contenido: " . $data->getContenido() . "\n";
        echo "Fecha de Modificación: " . $data->getFechaModificacion()->format("d/m/Y") . "\n";
    }



    public function destroy($id, $api)
    {
        $expediente = new Expediente();
        $expediente->delete($id);

        echo "Expediente eliminado\n";
    }

}