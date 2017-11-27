  <?php
  include_once"../Clases/AccesoDatos.php";
  include_once"../funciones.php";

  $patente = $_POST['patente'];
  $datos=buscarPorPatente($patente);
  ?>
  
  <div class="container" >
        <div class="col-md-13">

            <h1 class="page-header">
                  
                  
            </h1>
               

            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">Modificar Vehiculo</h3>
                    
                   
                </div>

                <div class="panel-body">

                                         <div class="form-group">
                                           <!-- <label for="nombre">Id:</label> -->
                                            <input class="form-control"type="hidden" id="id1" name="id1" placeholder=<?php  echo $datos[0]['id'];?> disabled> 
                                        </div>
                                         <div class="form-group">
                                            <label for="nombre">Numero de cochera:</label>
                                            <input class="form-control"type="text" id="numcochera" name="numcochera" placeholder=<?php  echo $datos[0]['numcochera'];?> disabled> 
                                        </div>

                                        <div class="form-group">
                                            <label for="nombre">Patente:</label>
                                            <input class="form-control"type="text" id="patente1" name="nombre1" placeholder=<?php  echo $datos[0]['patente'];?> > 
                                        </div>
                                        <div class="form-group">
                                            <label for="nombre">Marca:</label>
                                            <input class="form-control"type="text" id="marca1"name="marca1" placeholder=<?php  echo $datos[0]['marca'];?> >
                                        </div>
                                        <div class="form-group">
                                                
                                        <label for="nombre">Color:</label>
                                        <input class="form-control"type="text" id="color1" name="color1" placeholder=<?php  echo $datos[0]['color'];?>>
                                            </div>
                                        
                                        <div class="form-group">
                                         <label for="optradio">Es discapacitado/embarazada: </label>
                                          <?php if($datos[0]['esDisca'] == "si"){

                                            echo  '<input type="radio" name="optradio" id="optradiosi"  checked><b>Si</b>';
                                            echo '<input type="radio" name="optradio" id="optradiono" ><b>No</b> ';
                                          
                                          } 
                                          else{

                                             echo  '<input type="radio" name="optradio" id="optradiosi"><b>Si</b>';
                                             echo '<input type="radio" name="optradio" id="optradiono" checked ><b>No</b> ';

                                          }
                                          ?>
                                        </div>
                                      

                                    <br>
                                
                                    <input class="btn btn-primary btnactualizar " type="button" value="Actualizar" name="actualizar">
          
       
           

