<?php 

error_reporting(0); 
include_once 'AccesoDatos.php';
include_once 'vehiculo.php';
include_once '../funciones.php'; 

  Class Estacionamiento
  {
      //--------------------------ATRIBUTOS----------------------
      private $_objVehiculo;
      private $_numCochera;
      private $_empleado;
      private $_importe;
      private $_hsEntradaVehiculo;
      private $_fechaIngreso;
      private $_hsSalidaVehiculo;

      public  $horaEstadia = 10;
      public  $mediaEstadia = 90;
      public  $estadiaCompleta = 170;

      //--------------------------COSNSTRUCTOR----------------------
      public function __construct($numCochera=NULL , $objVehiculo=NULL)
      {
          $this->_objVehiculo =  $objVehiculo ;   
          $this->_numCochera=$numCochera;
          $this->_empleado= $_SESSION['usuario'];
          $fecha= date_default_timezone_set ('America/Argentina/Buenos_Aires');
      }

      //--------------------------GETERS----------------------
      public function getNumCochera(){
          return $this->_numCochera;
      }

      public function getEmpleado(){
          return $this->_empleado;
      }

      public function getHsEntradaVehiculo(){
          return $this->_hsEntradaVehiculo;
      }
      
      //--------------------------METODOS----------------------
      public function IngresarVehiculo()//Funciona
      {
          $validacion = 0;
          $json = array();

          if(estaOcupadaCochera($this->_numCochera))
          {
              $validacion=1;
              $json['msj'] = "Esta cochera ya esta ocupada";
          }
          if(validarDiscapacitado($this->_objVehiculo->getDiscapacitado(),$this->_numCochera))
          {
              $validacion=1;
              $json['msj'] = "Esta cochera esta reservada para discapacitados";
          }    
          if(validarPatenteRepetida($this->_objVehiculo->getPatente()))
          {
              $validacion=1;
              $json['msj'] = "Patente repetida";
          }
          if($validacion == 0)
          {
              //$fecha= date_default_timezone_set ('America/Argentina/Buenos_Aires'); 
              $hsIngreso = date("H:i");            
              //$this->_hsEntradaVehiculo = $hsIngreso;
              $this->_fechaIngreso =date('Y-m-d');
              $fecha_hora_ingreso = $this->_fechaIngreso . " / " . $hsIngreso;
              //$hsSalida = NULL;
              //$fechaSalida = NULL; 
              //$fecha_hora_salida = $this->fechaSalida . " / " . $hsSalida;
              //$id_empleado_ingreso= $this->_empleado['id'];
              //$id_empleado_salida= "";
              //$tiempo= NULL;
              //$importe= NULL;
              /*
                Para registrar tiempo/importe traer los datos por JSON en el metodo calcular importe.
              */

              $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
              $consulta1 = $objetoAccesoDato->RetornarConsulta("SELECT ingEmp.id_empleado FROM ingresos_empleados as ingEmp WHERE ($_SESSION[id] = ingEmp.id_empleado)"); 
              $resultado1 = $consulta1->execute();
              /*------------------------------------------------------*/
              while ($row = $consulta1->fetch()) {
                  $id_empleado_ingreso= $row['id_empleado'];

                  $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
                  $consulta2 =$objetoAccesoDato->RetornarConsulta("INSERT into operaciones (numCochera,esDisca,ocupada,marca,patente,color,foto,id_empleado_ingreso,fecha_hora_ingreso)values(:numCochera,:esDisca,:ocupada,:marca,:patente,:color,:foto,:id_empleado_ingreso,:fecha_hora_ingreso)");
                  $consulta2->bindValue(':numCochera',$this->_numCochera, PDO::PARAM_STR);
                  $consulta2->bindValue(':esDisca', $this->_objVehiculo->getDiscapacitado(), PDO::PARAM_STR);
                  $consulta2->bindValue(':ocupada', 'si', PDO::PARAM_STR);
                  $consulta2->bindValue(':marca', $this->_objVehiculo->getMarca(), PDO::PARAM_STR);
                  $consulta2->bindValue(':patente', $this->_objVehiculo->getPatente(), PDO::PARAM_STR);
                  $consulta2->bindValue(':color', $this->_objVehiculo->getColor(), PDO::PARAM_STR);
                  $consulta2->bindValue(':foto', $this->_objVehiculo->getFoto(), PDO::PARAM_STR);
                  $consulta2->bindValue(':id_empleado_ingreso', $id_empleado_ingreso, PDO::PARAM_INT);
                  $consulta2->bindValue(':fecha_hora_ingreso', $fecha_hora_ingreso, PDO::PARAM_STR);
                  //$consulta2->bindValue(':id_empleado_salida', $id_empleado_salida, PDO::PARAM_INT);
                  //$consulta2->bindValue(':fecha_hora_salida', $fecha_hora_salida, PDO::PARAM_STR);
                  //$consulta2->bindValue(':tiempo', $tiempo, PDO::PARAM_INT);
                  //$consulta2->bindValue(':importe', $importe, PDO::PARAM_STR);
                  $resultado2= $consulta2->execute();   
                  //$objetoAccesoDato->RetornarUltimoIdInsertado(); 
                  if($resultado2)
                  {
                      registrarOperacion($this->_empleado,'alta',date('Y-m-d'),$this->_numCochera);
                      $json['msj'] = "Se ingreso correctamente el vehiculo";
                      break;
                  }
              }
          }
          return json_encode($json);
      }//Fin IngresarVehiculo

      public static function buscarVehiculo($patente)
      {
          sleep(1);
          $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
          $consulta = $objetoAccesoDato->RetornarConsulta("SELECT * FROM  operaciones WHERE patente = '$patente' AND (ocupada = 'si')");
          $resultado = $consulta->execute();
          $cantidad = $consulta->rowCount();
          $datos = array();
          if($cantidad > 0)
          {
              echo  "<center>";
              echo  "<table class='table'  style=' background-color: beige;'>";
              echo  "<thead>";
              echo  "<tr>";
              echo   "<th>Patente</th><th>Marca</th><th>Color</th><th>Discapacitado</th><th>Cochera</th><th>Fecha/Hora entrada</th><th>ing. Empleado</th><th>Sacar de cochera</th><th>Modificar</th><th>Mover Vehiculo</th>";
              echo  "</tr>";
              echo  "</thead>";
              echo  "<tbody>";
              while ($row = $consulta->fetch())  
                {
                  $valor = "value=".$row['patente'];
                  
                  echo  "<tr>";
                  echo  "<td>".$row['patente']."</td>";
                  echo  "<td>".$row['marca']."</td>";
                  echo  "<td>".$row['color']."</td>";
                  echo  "<td>".$row['esDisca']."</td>";
                  echo   "<td>".$row['numCochera']."</td>";
                  echo   "<td>".$row['fecha_hora_ingreso']."</td>";
                  echo   "<td>".$row['id_empleado_ingreso']."</td>"; 
                  echo   "<td><button id='sacarbtn'".$valor." class='btn btn-danger btn-sm botonbaja'>Sacar de cochera  
                            <span class='glyphicon glyphicon-arrow-down'></span></button></td>";      
                  echo  "<td><button id='modificarbtn'".$valor." class='btn btn-warning btn-sm botonmodif'>Modificar
                            <span class='glyphicon glyphicon-cog'></span></button></td>";
                  echo  "<td><button id='moverbtn'".$valor." class='btn btn-warning btn-sm botonmover'>Mover Vehiculo
                            <span class='glyphicon glyphicon-resize-full'></span></button></td>";
                  echo  "</tr>";
                  array_push($datos,array("patente" => $row['patente'],"marca" => $row['marca'],"color" => $row['color'],"discapacitado" => $row['esDisca'],"numcochera" => $row['numCochera']));
                }  
                  echo   "</tbody>";
                  echo   "</table>";
                  echo   "</center>";
                  echo   "</body>";
                  echo   "</html>";
                  $consulta=null;
          }else
          {
            echo   "<center><p class='bg-danger'><b>No se encontro la patente del vehiculo</b></p></center>";
            array_push($datos,array("patente" => "no existe"));
          }
          return json_encode($datos);
      }//Fin buscarVehiculo

      public static function retirarVehiculo($patente)
      {
        $json = array();
        $json['importe'] = Estacionamiento::addOperaciones($patente);  

        $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
        $consulta2 = $objetoAccesoDato->RetornarConsulta("SELECT numCochera FROM  operaciones WHERE patente = '$patente'");
        $resultado2 = $consulta2->execute();
        $numcochera = $consulta2->fetch();

        $consulta = $objetoAccesoDato->RetornarConsulta("DELETE FROM operaciones WHERE (patente = '$patente') AND (ocupada = 'si')");
        $resultado = $consulta->execute();
        $cantidad = $consulta->rowCount();
              
        if($cantidad > 0)
        {        
            registrarOperacion($_SESSION['usuario'],'baja',date('Y-m-d'), $numcochera['numCochera']);
            $json['msj'] = "Se retiro ok";
            return json_encode($json);
        }
      }//Fin retirarVehiculo

      public static function verCocherasOcupadas()//Funciona
      {
            $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
            $consulta = $objetoAccesoDato->RetornarConsulta(" SELECT numCochera,patente FROM operaciones"); 
            $consulta->execute();
            $cantidad = $consulta->rowCount();
            $json_array = array(); 

            if($cantidad == 0)
            { 
                $json_array['msj'] = "No hay cocheras ocupadas actualmente ";
            }
            while ($row = $consulta->fetch()) 
            {
                array_push($json_array,array("numcochera"=>$row['numCochera'],"patente"=>$row['patente'])); 
            }
            $consulta=null;
             
            return json_encode($json_array);
      }//Fin verCocherasOcupadas

      public static function addOperaciones($patente)
      {
          $hsSalida = date("H:i");
          $fechaSalida =date('Y-m-d'); 
          $empleado = $_SESSION['usuario'];
          $fecha_hora_salida = $fechaSalida . " / " . $hsSalida;

          $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
          $consulta = $objetoAccesoDato->RetornarConsulta("SELECT * FROM operaciones WHERE patente = '$patente'"); 
          $resultado = $consulta->execute(); 
       
          $importe = 0;
          while ($row = $consulta->fetch()) 
          {
            $id_empleado_salida= $row['id_empleado_ingreso'];
            $fecha_hora_ingresoArray = explode(' / ',$row['fecha_hora_ingreso']);
            $hsIng = $fecha_hora_ingresoArray[1];
            $fechIng = $fecha_hora_ingresoArray[0];
            $importe = calcularImporte($hsIng,$fechIng,$hsSalida,$fechaSalida);

            $ahora=date("Y-m-d H:i:s");              
            $tiempo = strtotime($fecha_hora_salida) - strtotime($row['fecha_hora_ingreso']);//Probar fecha_hora_ingresoArray
            $row['ocupada']= 'no';

            $consulta2 = $objetoAccesoDato->RetornarConsulta("INSERT into operaciones (numCochera,esDisca,ocupada,marca,patente,color,foto,id_empleado_ingreso,fecha_hora_ingreso,id_empleado_salida,fecha_hora_salida,tiempo,importe)values('".$row['numCochera']."','". $row['esDisca'] ."','".$row['ocupada']."','". $row['marca'] ."','". $row['patente'] ."','". $row['color']  ."', '".$row['foto']."', '".$row['id_empleado_ingreso']."' ,'".$row['fecha_hora_ingreso']."','$id_empleado_salida','$fecha_hora_salida','$tiempo','$importe')");                                                                                                                                                                                                                                                                                                                                
            $resultado2 = $consulta2->execute();
            $retorno = $importe;
            return $retorno;
          }          
      }//Fin addOperaciones

      public static function verificarLogin($user,$pass)
      {
          $json = array();
          $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
          $consulta = $objetoAccesoDato->RetornarConsulta(" SELECT * FROM empleados WHERE mail = '$user' AND clave = '$pass' ");
          $resultado = $consulta->execute();
          $cantidad = $consulta->rowCount();
          $objeto = new stdClass();
          if($cantidad > 0)
          {
            $row = $consulta->fetch();
            $objeto->respuesta = "OK";
          }else
          {
            $objeto->respuesta = "NO";     
          }
          return $objeto;
      }//Fin verificarLogin

      public static function ModificarVehiculo($oldpatente,$newpatente,$color,$marca)
      {
          $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
          $consulta = $objetoAccesoDato->RetornarConsulta("UPDATE operaciones SET patente = '$newpatente', marca = '$marca',color = '$color' WHERE patente = '$oldpatente'");
          $resultado = $consulta->execute();
          $cantidad = $consulta->rowCount();
          $objeto = new stdClass();
          if($cantidad > 0)
          {
              $objeto->respuesta = "OK";
          }else
          {
              $objeto->respuesta = "NO";
          }
          return $objeto;
      }//Fin ModificarVehiculo


  }//Fin Clase

?>