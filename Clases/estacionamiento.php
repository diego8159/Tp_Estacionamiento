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
      public function IngresarVehiculo()//Verificado --> Probar funcionalidad.
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
              $fecha= date_default_timezone_set ('America/Argentina/Buenos_Aires'); 
              $hsIngreso = date("H:i:s");            
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
              $tipo= 'alta';
              /*
                Para registrar tiempo/importe traer los datos por JSON en el metodo calcular importe.
              */

              $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
              $consulta = $objetoAccesoDato->RetornarConsulta("SELECT ingEmp.id_empleado FROM ingresos_empleados as ingEmp WHERE ($_SESSION[id] = ingEmp.id_empleado)"); 
              $resultado = $consulta->execute();
              $row = $consulta->fetch();
              /*------------------------------------------------------*/
              while ($row = $consulta->fetch()) {
                  $id_empleado_ingreso= $row['id_empleado'];

                  $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
                  $consulta =$objetoAccesoDato->RetornarConsulta("INSERT into operaciones (numCochera,esDisca,ocupada,marca,patente,color,foto,id_empleado_ingreso,fecha_hora_ingreso,tipo)values(:numCochera,:esDisca,:ocupada,:marca,:patente,:color,:foto,:id_empleado_ingreso,:fecha_hora_ingreso,:tipo)");
                  $consulta->bindValue(':numCochera',$this->_numCochera, PDO::PARAM_STR);
                  $consulta->bindValue(':esDisca', $this->_objVehiculo->getDiscapacitado(), PDO::PARAM_STR);
                  $consulta->bindValue(':ocupada', 'si', PDO::PARAM_STR);
                  $consulta->bindValue(':marca', $this->_objVehiculo->getMarca(), PDO::PARAM_STR);
                  $consulta->bindValue(':patente', $this->_objVehiculo->getPatente(), PDO::PARAM_STR);
                  $consulta->bindValue(':color', $this->_objVehiculo->getColor(), PDO::PARAM_STR);
                  $consulta->bindValue(':foto', $this->_objVehiculo->getFoto(), PDO::PARAM_STR);
                  $consulta->bindValue(':id_empleado_ingreso', $id_empleado_ingreso, PDO::PARAM_INT);
                  $consulta->bindValue(':fecha_hora_ingreso', $fecha_hora_ingreso, PDO::PARAM_STR);
                  //$consulta->bindValue(':id_empleado_salida', $id_empleado_salida, PDO::PARAM_INT);
                  //$consulta->bindValue(':fecha_hora_salida', $fecha_hora_salida, PDO::PARAM_STR);
                  //$consulta->bindValue(':tiempo', $tiempo, PDO::PARAM_INT);
                  //$consulta->bindValue(':importe', $importe, PDO::PARAM_STR);
                  $consulta->bindValue(':tipo', $tipo, PDO::PARAM_STR);
                  $resultado= $consulta->execute();   
                  $objetoAccesoDato->RetornarUltimoIdInsertado(); 
                  if($resultado)
                  {
                      $json['msj'] = "Se ingreso correctamente el vehiculo";
                  }
              }
          }
          return json_encode($json);
      }//Fin IngresarVehiculo

      


  }//Fin Clase

?>