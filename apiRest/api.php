<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

error_reporting(0);

require 'vendor/autoload.php';
require '../EstacionamientoApi.php';
//require 'Clases/Middleware.php';

$app = new \Slim\App;


$app->group('/vehiculo', function () { 

$this->post('/', \EstacionamientoApi::class . ':CargarUno');   
$this->delete('/{patente}', \EstacionamientoApi::class . ':BorrarUno'); 
$this->put('/{oldpatente}/{newpatente}/{color}/{marca}', \EstacionamientoApi::class . ':ModificarUno'); 

});//->add(new Middleware());  

$app->group('/verificarusuario', function () { 
$this->post('/', \EstacionamientoApi::class . ':VerificarUsuario'); 
});

$app->group('/vehiculos', function () { 
  $this->get('/ocupadas', \EstacionamientoApi::class . ':TraerCocherasOcupadas'); 
});

$app->group('/empleados', function () { 
  $this->get('/', \EstacionamientoApi::class . ':TraerEmpleados'); 
});
/*
$app->group('/empleado', function () { 
  $this->post('/', \EstacionamientoApi::class . ':CargarEmpleado');   
  $this->delete('/{}', \EstacionamientoApi::class . ':BorrarEmpleado'); 
})->add(new Middleware()); 
*/
$app->run();

?>