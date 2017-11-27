<?php

Class EstacionamientoApi
{ 

  public function CargarUno($request, $response, $args) 
  {
      require_once 'Clases/estacionamiento.php'; 
      require_once 'Clases/vehiculo.php'; 
      require_once'funciones.php';
         
      $arrayDatos = $request->getParsedBody();
      $patente = $arrayDatos['patente'];
      $marca = $arrayDatos['marca'];
      $color = $arrayDatos['color'];
      $esdisca = $arrayDatos['esDisca'];
      $numcochera = $arrayDatos['numCochera'];
      $foto  = "/fotos_empleados/".$patente;

      $objVehiculo = new Vehiculo ($patente,$marca,$color,$esdisca,$foto);
      //$objVehiculo->patente=$patente;
      //$objVehiculo->marca=$marca;
      //$objVehiculo->color=$color;
      //$objVehiculo->esdisca=$esdisca;
      //$objVehiculo->foto=$foto;
      $objEstacionamiento = new Estacionamiento($numcochera, $objVehiculo);
      $json = $objEstacionamiento->IngresarVehiculo();
      //$objEstacionamiento->IngresarVehiculo();

      $archivos = $request->getUploadedFiles();
      $destino="./fotos_empleados/";
      $nombreAnterior=$archivos['foto']->getClientFilename();
      $extension= explode(".", $nombreAnterior);
      $extension=array_reverse($extension);

      $foto = $destino.$patente;

      $archivos['foto']->moveTo($destino.$patente.".".$extension[0]);
        
      $response->getBody()->write($json);//$json

      return $response;                  
  }

  public function verificarUsuario($request, $response, $args)
  {
    require_once 'Clases/estacionamiento.php'; 
    require_once 'Clases/vehiculo.php'; 
    require_once'funciones.php';

    $arrayDatosLogin = $request->getParsedBody();  
    $user= $arrayDatosLogin['user'];
    $pass = $arrayDatosLogin['password'];
    $respuesta = Estacionamiento::verificarLogin($user,$pass);
    ///*
      if($respuesta->respuesta == "OK" && $user == 'admin'){     
          $rta['token'] = autentificadorJWT::CrearToken($user);    
      }
    //*/
    if($respuesta->respuesta == "OK")
    { 
  		$rta['respuesta'] = $respuesta->respuesta;
      $rta['token'] = autentificadorJWT::CrearToken($user); // sacar
      return $response->withJson($rta);
  	}
    else
    {
      $respuesta->token = NULL;
  	  return $response->withJson($respuesta);
  	}
  }

  public function BorrarUno($request, $response, $args)
  {
    require 'Clases/estacionamiento.php'; 
    require 'funciones.php';

    $patente= $request->getAttribute('patente');
    $json = Estacionamiento::retirarVehiculo($patente); 
    $response->getBody()->write($json);

    return $response;
  }

  public function TraerCocherasOcupadas($request, $response, $args)
  {
      require 'Clases/estacionamiento.php';

      $msj = Estacionamiento::verCocherasOcupadas(); 
      $response->getBody()->write($msj);
      return $response;
  }

  public function TraerPorPatente($request, $response, $args)  // sacar?
  { 
      require 'Clases/estacionamiento.php';

      $patente= $request->getAttribute('patente');  
      $json = Estacionamiento::buscarVehiculo($patente);
      $response->getBody()->write($json);

      return $response;
  }

  public function TraerEmpleados($request, $response, $args)
  {
      require 'Clases/AccesoDatos.php';
      $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
      $consulta = $objetoAccesoDato->RetornarConsulta("SELECT * FROM  empleados ");
      $resultado = $consulta->execute();
      $numcochera = $consulta->fetchAll(PDO::FETCH_ASSOC);

      return $response->withJson($numcochera);
  }

  public function ModificarUno($request, $response, $args)
  {
    require 'Clases/estacionamiento.php';

    $oldpatente= $request->getAttribute('oldpatente');  
    $newpatente= $request->getAttribute('newpatente');  
    $color= $request->getAttribute('color'); 
    $marca= $request->getAttribute('marca'); 

    $respuesta = Estacionamiento::ModificarVehiculo($oldpatente,$newpatente,$color,$marca);
    return $response->withJson($respuesta);
  }   
}

?>