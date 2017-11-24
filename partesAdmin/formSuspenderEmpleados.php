<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="js/panelAdmin.js"></script> <!--con on en panel no hace falta incluirlo-->
    <link rel="stylesheet" href="./css/estilos2.css">
</head>
<body>
<div class="row">
     <div class="col-sm-12">
         <div class="col-xs-4">
             <label class="control-label" for="usuario">Usuario:</label> <!--rol,usuario,turno,clave,suspendido -->
             <input type="text" class="form-control  input-lg" id="usuario" name="usuario" placeholder="ingrese nombre de usuario">
        </div>
         <div class="col-xs-4">
             <label class="control-label" for="usuario">Suspendido:</label> <!--rol,usuario,turno,clave,suspendido -->
                  <select class="form-control input-lg" id="suspendido"  name="suspendido">
                         <option value="si" id="1">Si</option>
                         <option value="no" id="2">No</option>
                    
                 </select>         
                  
        </div>
        <div class="col-xs-4">
        <br>
             <button type="button" class="btn btn-warning btn-lg botonsuspender" id="btnsuspender123">
                     <span class="glyphicon glyphicon-time"></span> Suspender empleado
             </button>
        </div>
       
 </div> 
 
      <div id="respuesta">
      </div>
</body>
</html>
<?php
//sleep(2);
?>