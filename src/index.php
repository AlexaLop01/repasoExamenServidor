<?php

include_once "environment.php";
include_once "vendor/autoload.php";

use App\Router\Router;
use App\Class\Estudiante;
use App\Controller\ExpedienteController;

$router = new Router();


//Rutas de páginas estáticas
$router->addRoute('get','/',function(){
    include_once DIRECTORIO_VISTAS."informacion.php";
});

//Estudiante
$router ->addRoute('post','/estudiante',function(){
    $estudiante = new Estudiante();
    $estudiante->setNia($_POST['nia']);
    $estudiante->setNombre($_POST['nombre']);
    $estudiante->setCorreo($_POST['correo']);

    $estudiante->save();
});

//Expediente
$router->addRoute('get','/expediente/{id}',[ExpedienteController::class, 'show']);
$router->addRoute('delete','/expediente/{id}',[ExpedienteController::class, 'destroy']);

//Rutas enlazadas a controladores, lógica de la aplicación
//Usuarios
//$router->addRoute('get','/users',[\App\Controller\UsuarioController::class,'index']);


//Usuario API
//$router->addRoute('post','/api/users/{id}',[\App\Controller\UsuarioController::class,'store']);

$router->resolver($_SERVER['REQUEST_METHOD'],$_SERVER['REQUEST_URI']);

