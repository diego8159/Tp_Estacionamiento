<?php
include_once "../funciones.php";

$patente = $_POST['patente'];
$datos=buscarPorPatente($patente);
                             
$cocherasDisponibles = array("1_1","1_2","1_3","2_1","2_2","2_3","3_1","3_2","3_3");
$cocherasOcupadas = traerCocherasOcupadas();


    for ($i=0; $i <count($cocherasDisponibles) ; $i++) { 
         
         for($j=0;$j<count($cocherasOcupadas);$j++){

               if( $cocherasOcupadas[$j]['numCochera'] == $cocherasDisponibles[$i] ){
                      unset ($cocherasDisponibles[$i]);
                      $cocherasDisponibles = array_values($cocherasDisponibles);
               }
       

         }
      
    }                                            
?>

  <div class="container" >
        <div class="col-md-13">

            <h1 class="page-header">
                  
                  
            </h1>
               

            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">Mover Vehiculo de cochera</h3>
                    
                   
                </div>

                <div class="panel-body">

                                       
                                         <div class="form-group">
                                            <label for="nombre">Numero de cochera:</label>
                                            <input class="form-control"type="text" id="numcochera" name="numcochera" placeholder=<?php  echo $datos[0]['numcochera'];?> disabled> 
                                        </div>

                                        <div class="form-group">
                                            <label for="nombre">Patente:</label>
                                            <input class="form-control"type="text" id="patente1" name="nombre1" placeholder=<?php  echo $datos[0]['patente'];?>  disabled> 
                                        </div>
                                        
                                        

                                       
                                            <div class="form-group">
                                            <label class="control-label col-sm-5" for="numCochera">Numero de cochera: </label>
                                            
                                                 <select class="form-control" id="numCochera"  name="lista">
                                                     <option hidden value="0" id="0">Seleccione una Cochera</option>
                           
                                                            <optgroup label="Piso numero 1" name = "piso1"> 
                                                                 <?php 
                                                                 ValidarSelect($cocherasDisponibles , "1_1"); 
                                                                 ValidarSelect($cocherasDisponibles , "1_2"); 
                                                                 ValidarSelect($cocherasDisponibles , "1_3");                 
                                                                 ?>
                                                           </optgroup>

                                                           <optgroup label="Piso numero 2" name = "piso2">
                                                                <?php 
                                                                 ValidarSelect($cocherasDisponibles , "2_1"); 
                                                                 ValidarSelect($cocherasDisponibles , "2_2"); 
                                                                 ValidarSelect($cocherasDisponibles , "2_3");  
                                                                ?>
                                                           </optgroup>

                                                            <optgroup label="Piso numero 3"  name = "piso3">
                                                                <?php 
                                                                 ValidarSelect($cocherasDisponibles , "3_1"); 
                                                                 ValidarSelect($cocherasDisponibles , "3_2"); 
                                                                 ValidarSelect($cocherasDisponibles , "3_3");  
                                                                ?>
                                                            </optgroup>
                                                   
                                                </select>
                                            
                                            </div>
                                             
                                            </div>            
                  
                <div class="form-group">      
                   <input class="btn btn-primary btnmover " type="button" value="Mover de cochera" name="movercochera">
               </div>