<?php

namespace App\Controller;

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
        // TODO: Implement show() method.

        Expediente::class->load($id);
    }

    public function destroy($id, $api)
    {
        // TODO: Implement destroy() method.
        var_dump($id);
        Expediente::class->delete($id);
    }
}