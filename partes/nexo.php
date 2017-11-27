
<?php
include_once '../Clases/AccesoDatos.php';
include_once '../Clases/estacionamiento.php';
include_once '../Clases/vehiculo.php';
include_once '../funciones.php';

$operacion = $_POST['operacion'];
session_start();
switch($operacion)
{
    case "alta"://Funciona / Agregar un metodo para guardar foto en carpeta.
        if(empty($_POST['patente']) || 
           empty($_POST['marca']) ||
           empty($_POST['color']) ||
           $_POST['cochera'] == 0 ||
           empty($_POST['foto']) )     
         {
           echo "<center><p class='bg-danger'><b>Faltan completar datos</b></p></center>";  
         }else{
          $objVehiculo = new Vehiculo ($_POST['patente'],$_POST['marca'],$_POST['color'],$_POST['optradio'],$_POST['foto']);
          //$objVehiculo->patente=$_POST['patente'];
          //$objVehiculo->marca=$_POST['marca'];
          //$objVehiculo->color=$_POST['color'];
          //$objVehiculo->esdisca=$_POST['optradio'];
          //$objVehiculo->foto=$_POST['foto'];

          $objEstacionamiento = new Estacionamiento($_POST['cochera'], $objVehiculo);
          //echo $objEstacionamiento->getNumCochera();
          //var_dump($objVehiculo);
          //var_dump($objEstacionamiento);
          echo $objEstacionamiento->IngresarVehiculo(); 
        }
     break;

     case "mostrar"://Funciona
       $patente = $_POST['patente'];
       if(empty($patente)){
          echo "<center><p class='bg-danger'><b>Faltan completar datos</b></p></center>";
       }else{
          Estacionamiento::buscarVehiculo($patente);    
       }
     break;

     case "borrar":
        $patente = $_POST['patente'];
        echo Estacionamiento::retirarVehiculo($patente);
     break;

     case "verCocherasOcupadas"://Funciona
        $respuesta = Estacionamiento::verCocherasOcupadas();  
        echo $respuesta;
     break;

     case "modificar":
        Estacionamiento::modificarVehiculo();
     break;

     case "actualizar"://Funciona/Registrar...
       $patente = $_POST['patente'];
       $marca = $_POST['marca'];
       $color = $_POST['color'];
       $oldpatente = $_POST['oldpatente'];
       $esDisca= $_POST['esDisca'];
       $id= $_POST['id'];
       $numCochera = $_POST['numcochera'];
     
       if(empty($patente) || empty($marca) || empty($color) || empty ($esDisca)){
         echo "<center><p class='bg-danger'><b>Faltan completar datos</b></p></center>";
       break;
       }
       $patentes = traerPatentes(); 
       $flag= 0;
      
       for($i=0;$i<count($patentes);$i++){

           if($patentes[$i]['patente'] == $patente && $id != $patentes[$i]['id']){  
            $flag=1;
          
          }  
       }
       
       if(validarDiscapacitado($esDisca,$numCochera)){
         echo "<center><p class='bg-danger'><b>Esta cochera esta reservada para discapacitados</b></p></center>";
         break;
       }

       if($flag == 1){
         echo "<center><p class='bg-danger'><b>Error la patente ya existe</b></p></center>";
       }else{   
         $cantidad= update($oldpatente,$patente,$marca,$color,$esDisca);
         if($cantidad>0){
            //Rejistrar operacion modificar.
            echo "<center><p class='bg-success'><b>Se actualizo correctamente el vehiculo</b></p></center>";
         }
        
       }
     break;

     case "movercochera"://Funciona/Registrar...
    
       $oldcochera = $_POST['oldnumcochera'];
       $newcochera = $_POST['newnumcochera'];
       $retorno = updateDeCochera($oldcochera,$newcochera);
       if($retorno){
         //Registrar la operacion mover.
       }
     break;

}

?>