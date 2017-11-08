<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="js/panel.js"></script> 
    <link rel="stylesheet" href="./css/estilos2.css">
</head>
<body>
    <div class="container">
        <div class="row">
          <h3 class="alert alert-success" style="text-align:center">INGRESO DEL VEHICULO</h3>
        </div>
        
        <form class="form-horizontal" method="POST" action="#" enctype="multipart/form-data" autocomplete="off">
          <div class="form-group">
            <label for="patente" class="col-sm-2 control-label">Patente</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="patente" name="patente" placeholder="Patente" name="txtpatente" required>
            </div>
          </div>

          <div class="form-group">
            <label for="marca" class="col-sm-2 control-label">Marca</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="marca" name="marca" placeholder="Apellido" name="txtmarca" required>
            </div>
          </div>

          <div class="form-group">
                      <label for="color" class="col-sm-2 control-label">Color</label>
                      <div class="col-sm-10">
                        <input type="date" class="form-control" id="color" name="color" placeholder="Color" name="txtcolor">
                      </div>
                  </div>

                  <div class="form-group">
            <label for="optradio" class="col-sm-2 control-label">Discapacitado/Embarazada: </label>
            
            <div class="col-sm-10">
              <label class="radio-inline">
                <input type="radio" id="optradiosi" name="optradio" checked> SI
              </label>
              
              <label class="radio-inline">
                <input type="radio" id="optradiono" name="optradio" > NO
              </label>
            </div>
          </div>
          
          <div class="form-group">
            <label for="numCochera" class="col-sm-2 control-label">Numero de cochera: </label>
            <div class="col-sm-10">
              <select class="form-control" id="numCochera"  name="lista">
                <option hidden value="0" id="0">Seleccione una Cochera</option>
                       <optgroup label="Piso numero 1" name = "piso1">
                           <option value="1_1" id="1_1"   >Cochera 1 - (Reservada)</option>
                           <option value="1_2" id="1_2">Cochera 2 </option>
                           <option value="1_3" id="1_3">Cochera 3 </option>
                         </optgroup>
                          <optgroup label="Piso numero 2" name = "piso2">
                           <option value="2_1" id="2_1" >Cochera 1 - (Reservada)</option>
                           <option value="2_2" id="2_2">Cochera 2 </option>
                           <option value="2_3"id= "2_3">Cochera 3 </option>
                         </optgroup>
                          <optgroup label="Piso numero 3"  name = "piso3">
                           <option value="3_1" id="3_1"  >Cochera 1 - (Reservada)</option>
                           <option value="3_2" id="3_2">Cochera 2 </option>
                           <option value="3_3" id="3_3">Cochera 3 </option>
                         </optgroup>
              </select>
            </div>
          </div>
          <div class="form-group">
            <center>
              <a href="index.html" class="btn btn-success">Regresar</a>
                  <button type="button" class="btn btn-primary" id="guardarbtn" > 
                           <span class="glyphicon glyphicon-floppy-disk"></span> Guardar 
                  </button> 
                  <button type="button" class="btn btn-info" id="resetbtn">
                          <span class="glyphicon glyphicon-refresh"></span> Reiniciar
                  </button>
                  <button type="button" class="btn btn-info" id="ocupadasbtn">
                          <span class="glyphicon glyphicon-eye-open "></span> Ver cocheras ocupadas
                  </button>
                </center>
              </div>
        </form>

        <div id="respuesta">
            </div>
  </div>

</body>
</html>
<?php
//sleep(2);
?>