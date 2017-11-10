<?php
include_once '../Clases/AccesoDatos.php';
include_once '../Clases/estacionamiento.php';
include_once '../Clases/vehiculo.php';
include_once '../funciones.php';

$operacion = $_POST['operacion'];

switch($operacion){

    case 'buscarreportes':

      $nombreempleado = $_POST['nombreempleado'];
      $desde = $_POST['desde'];
      $hasta = $_POST['hasta'];

      $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
      $consulta = $objetoAccesoDato->RetornarConsulta(" SELECT * FROM registroempleados WHERE nombre='$nombreempleado' AND fechaing BETWEEN '$desde'  AND '$hasta' "); 
      $consulta->execute();
      echo "<center><div class='text-success bg-warning' style='border: 5px groove #006600;'>";
      while ($row = $consulta->fetch()) 
  	    {
          echo "Nombre: ".$row['nombre']." Dia: ".$row['fechaing']." Horario: ".$row['hsing']."<br>";
  	    }
      echo "</div></center>";
    break;

    case'buscarreportesporfecha':

      $nombreempleado = $_POST['nombreempleado'];
      $fecha = $_POST['fecha'];

      $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
      $consulta = $objetoAccesoDato->RetornarConsulta(" SELECT * FROM registroempleados WHERE nombre='$nombreempleado' AND fechaing = '$fecha' "); 
      $consulta->execute();
       echo "<center><div class='text-success bg-warning' style='border: 5px groove #006600;'>";
      while ($row = $consulta->fetch()) 
  	  {
        echo "Nombre: ".$row['nombre']." Dia: ".$row['fechaing']." Horario: ".$row['hsing']."<br>";
  	  }
      echo "</div></center>";
    break;

    case 'altaempleado':
      $nombre =  $_POST['nombre'];
      $apellido =  $_POST['apellido'];
      $fecha_creacion =  $_POST['fecha_creacion'];
      $foto =  $_POST['foto'];
      $usuario =  $_POST['usuario'];
      $turno =  $_POST['turno'];
      $clave =  $_POST['clave'];

      $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
      $consulta = $objetoAccesoDato->RetornarConsulta("INSERT into empleados (nombre,apellido,clave,mail,turno,perfil,suspendido,fecha_creacion,foto)values('$nombre','apellido','$clave','$usuario','$turno','empleado','no','$fecha_creacion','$foto')");
      $consulta->execute();
      $cantidad = $consulta->rowCount();
      if($cantidad >0){
          echo "<center><b class='bg-success'>El empleado se ingreso correctamente.<b></center>";     
      }else{
          echo "<center><b class='bg-danger'>El empleado no se ingreso correctamente.<b></center>";
      }
    break;

    case 'borrarempleado':
      $usuario =  $_POST['usuario'];
      $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
      $consulta = $objetoAccesoDato->RetornarConsulta("DELETE FROM  empleados WHERE usuario = '$usuario'");
      $consulta->execute();
      $cantidad = $consulta->rowCount();
       if($cantidad >0){
           echo "<center><b class='bg-success'>El empleado se borro correctamente.<b></center>";     
      }else{
           echo "<center><b class='bg-danger'>El empleado no se borro correctamente.<b></center>";
      }
    break;

    case 'suspenderempleado':
      $usuario =  $_POST['usuario'];
      $suspendido = $_POST['suspendido'];
      $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
      $consulta = $objetoAccesoDato->RetornarConsulta(" UPDATE empleados SET suspendido = '$suspendido' WHERE usuario = '$usuario' ");
      $consulta->execute();
      $cantidad = $consulta->rowCount();
       if($cantidad >0){
           echo "<center><b class='bg-success'>El empleado se suspendio correctamente.<b></center>";     
      }else{
           echo "<center><b class='bg-danger'>El empleado no se suspendio correctamente.<b></center>";
      }
    break;

    case 'veroperaciones':
      $usuario =  $_POST['usuario'];
      $fecha =  $_POST['fecha'];
      $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
      $consulta = $objetoAccesoDato->RetornarConsulta(" SELECT * FROM registrooperaciones WHERE nombreempleado = '$usuario' AND fecha = '$fecha'");
      $consulta->execute();
      $cantidad = $consulta->rowCount();
      if($cantidad > 0){
           
           echo "<center><div class='text-success bg-warning' style='border: 5px groove #006600;'>";
           while ($row = $consulta->fetch()) 
  	     {
  	
               echo "Nombre: ".$row['nombreempleado']." Operacion: ".$row['tipo']."<br>";
  	     }
          echo "<font color='red'>cantidad total: ".$cantidad."</font>";
          echo "</div></center>";

      }else{
          echo "<center><b class='bg-danger'>No se encontraron operaciones para este usuario.<b></center>";
      }
    break;

    case 'verinfoxfecha':
      error_reporting(0);
      $fecha =  $_POST['fecha'];
      $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
      $consulta = $objetoAccesoDato->RetornarConsulta(" SELECT numcochera,COUNT(*) as cantidad FROM registrooperaciones  WHERE fecha = '$fecha' group by numcochera order by cantidad asc");
      $consulta->execute();
      $cantidad = $consulta->rowCount();
      if($cantidad >0)
      {
          $resultado  = $consulta->fetchAll();
       
          $cant = count($resultado);

          $max = $resultado[$cant-1]["cantidad"];
          $min = $resultado[0]["cantidad"];
          $arrMin= array();
          $arrMaaximo = array();

              for ($i=0; $i <= count($resultado)-1 ; $i++) 
              { 
                  if($resultado[$i]["cantidad"] == $min){
                     array_push($arrMin ,$resultado[$i]["numcochera"]);
                  }
              }
             
              for ($i=0; $i <= count($resultado)-1 ; $i++) 
              { 
                  if($resultado[$i]["cantidad"] == $max){
                     array_push($arrMaaximo ,$resultado[$i]["numcochera"]);
                  }
              }

          for($i=0;$i<count($arrMaaximo);$i++){
           echo "<center><b class='bg-success'>Cochera que mas se utilizo ".$arrMaaximo[$i]."<b></center><br>";
          }
          for($i=0;$i<count($arrMin);$i++){
           echo "<center><b class='bg-success'>Cochera que menos se utilizo ".$arrMin[$i]."<b></center><br>";
          }
         
          $cocherasUtilizadas = array();
          $cocherasTotales = array("1_1", "1_2", "1_3", "2_1", "2_2", "2_3", "3_1", "3_2", "3_3");

          for($i=0;$i<count($resultado);$i++){
               array_push($cocherasUtilizadas,$resultado[$i]['numcochera']);
          }
          $arrayAux = array();
          $arrayAux =  $cocherasUtilizadas;
         
        
          $cocherasTotales = array_values($cocherasTotales);
          $arrayAux2 = array();
          for($i=0;$i<count($cocherasTotales);$i++){
            if(in_array($cocherasTotales[$i],$arrayAux)){
                continue;
            }else{
               array_push($arrayAux2,$cocherasTotales[$i]);
            }
          }

          echo "<center><b class='bg-success'>Cocheras que no se utilizaron <b></center><br>";
          for($i=0;$i<count($arrayAux2);$i++){
             echo "<center>".$arrayAux2[$i]."</center><br>";
          }
      } // end if 
      else{
        echo "<center><b class='bg-danger'>No se encontraron cocheras<b></center>";
      }
    break;

    case'verinfoautosestacionados':
      $fecha =  $_POST['fecha'];
      $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
      $consulta = $objetoAccesoDato->RetornarConsulta(" SELECT * FROM  operaciones WHERE fechaingreso = '$fecha' ");
      $consulta->execute();
      $cantidad = $consulta->rowCount();

      if($cantidad > 0){

           echo "<center><div class='text-success bg-warning' style='border: 5px groove #006600;'>";
           while ($row = $consulta->fetch()) 
  	     {
  	
              echo "Cochera: ".$row['numCochera']." Horario ingreso: ".$row['hsingreso']." Horario salida: ".$row['hssalida']."Cuanto pago: ".$row['importe']."<br>";
  	     }
           echo "</div></center>";
      }else{
          echo "<center><b class='bg-danger'>No se encontro informacion<b></center><br>";
      }
    break; 

    case'verinfoautosestacionados2':
      $fechaDesde =  $_POST['fechaDesde'];
      $fechaHasta =  $_POST['fechaHasta'];
      $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
      $consulta = $objetoAccesoDato->RetornarConsulta(" SELECT * FROM operaciones WHERE  fechaingreso BETWEEN '$fechaDesde'  AND '$fechaHasta' "); 
      $consulta->execute();
      $cantidad = $consulta->rowCount();
        if($cantidad > 0){

           echo "<center><div class='text-success bg-warning' style='border: 5px groove #006600;'>";
           while ($row = $consulta->fetch()) 
  	     {
  	
              echo "Cochera: ".$row['numCochera']." Horario ingreso: ".$row['hsingreso']." Horario salida: ".$row['hssalida']."Cuanto pago: ".$row['importe']."<br>";
  	     }
           echo "</div></center>";
      }else{
          echo "<center><b class='bg-danger'>No se encontro informacion<b></center><br>";
      }
    break;

    case'verinfoxlapso':
      error_reporting(0);
      $fechaDesde =  $_POST['fechaDesde'];
      $fechaHasta =  $_POST['fechaHasta'];

       $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
      $consulta = $objetoAccesoDato->RetornarConsulta(" SELECT numcochera,COUNT(*) as cantidad FROM registrooperaciones  WHERE fecha BETWEEN '$fechaDesde' AND '$fechaHasta' group by numcochera order by cantidad asc");
      $consulta->execute();
      $cantidad = $consulta->rowCount();
      
      
      if($cantidad >0)
      {
        $resultado  = $consulta->fetchAll();
       
        $cant = count($resultado);
        $max = $resultado[$cant-1]["cantidad"];
        $min = $resultado[0]["cantidad"];
        $arrMin= array();
        $arrMaaximo = array();
        // array_push($arrMaaximo ,$resultado[$cant-1]["numcochera"]);
        //array_push($arrMin , $resultado[0]["numcochera"]);

            for ($i=0; $i <= count($resultado)-1 ; $i++) { 
                
                if($resultado[$i]["cantidad"] == $min){
                   array_push($arrMin ,$resultado[$i]["numcochera"]);

                }
               
            }
             for ($i=0; $i <= count($resultado)-1 ; $i++) { 
                
                if($resultado[$i]["cantidad"] == $max){
                   array_push($arrMaaximo ,$resultado[$i]["numcochera"]);

                }
               
            }

       
        for($i=0;$i<count($arrMaaximo);$i++){
         echo "<center><b class='bg-success'>Cochera que mas se utilizo ".$arrMaaximo[$i]."<b></center><br>";
        }
        for($i=0;$i<count($arrMin);$i++){
         echo "<center><b class='bg-success'>Cochera que menos se utilizo ".$arrMin[$i]."<b></center><br>";
        }
       
        $cocherasUtilizadas = array();
        $cocherasTotales = array("1_1", "1_2", "1_3", "2_1", "2_2", "2_3", "3_1", "3_2", "3_3");

        for($i=0;$i<count($resultado);$i++){
             array_push($cocherasUtilizadas,$resultado[$i]['numcochera']);
        }
        /*
        for($i=0;$i<count($cocherasTotales);$i++){
        
           for($j=0;$j<count($cocherasUtilizadas);$j++){
               if($cocherasTotales[$i] == $cocherasUtilizadas[$j]){
                   unset($cocherasTotales[$i]);
                  $cocherasTotales =  array_values($cocherasTotales);
               }
           }

        }
        */
        $arrayAux = array();
        $arrayAux =  $cocherasUtilizadas;

        $cocherasTotales = array_values($cocherasTotales);
        $arrayAux2 = array();
        for($i=0;$i<count($cocherasTotales);$i++)
        {
          if(in_array($cocherasTotales[$i],$arrayAux)){
              continue;
          }else{
             array_push($arrayAux2,$cocherasTotales[$i]);
          }
        }

        echo "<center><b class='bg-success'>Cocheras que no se utilizaron <b></center><br>";
        for($i=0;$i<count($arrayAux2);$i++){
           echo "<center>".$arrayAux2[$i]."</center><br>";
        }
      } // end if 
      else{
        echo "<center><b class='bg-danger'>No se encontraron cocheras<b></center>";
      }
    break;
}

?>