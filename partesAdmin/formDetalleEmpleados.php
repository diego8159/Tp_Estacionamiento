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
<center><h1 class= "text-success bg-primary">Alta Borrar Suspender</h1></center>
        <div class="col-xs-3">
        </div>
        <div class="col-xs-2">
                <button type="button" class="btn btn-success btn-lg botonalta" id="btnalta">
                     <span class="glyphicon glyphicon-plus "></span> Alta de empleado
                </button>
        </div>
         <div class="col-xs-2">
                <button type="button" class="btn btn-danger btn-lg botonbaja" id="btnbaja">
                     <span class="glyphicon glyphicon-minus "></span> Borrar empleado
                </button>
        </div>
         <div class="col-xs-2">
                <button type="button" class="btn btn-warning btn-lg botonsuspender" id="btnsuspender">
                     <span class="glyphicon glyphicon-time "></span> Suspender empleado
                </button>
        </div>
        <div class="col-xs-3">
        </div>
</div>

<div class="row">
    <center><h1 class= "text-success bg-primary">Buscar por lapso de tiempo</h1></center>
    <div class="col-sm-12">
    <br>
         <div class="col-xs-3">
             <label class="control-label " for="patente">Nombre del empleado:</label>
             <input type="text" class=" form-control  input-lg" name="nombreempleado" id="nombreempleado" placeholder="Ingrese nombre empleado" name="txtempleado">
         </div>
        
         <div class="col-xs-3">
             <label class="control-label c" for="patente">Desde:</label>
             <input type="text" class="form-control  input-lg" name="fechaDesde" id="fechaDesde" placeholder="ejemplo: 2017-07-13" name="txtempleado">
         </div>
         
          <div class="col-xs-3">
              <label class="control-label " for="patente">Hasta:</label>
              <input type="text" class="form-control  input-lg" name="fechaHasta" id="fechaHasta" placeholder="ejemplo: 2017-07-13" name="txtempleado">
              
          </div>
          <br>
          <div class="col-xs-3">
                <button type="button" class="btn btn-info btn-lg botonbuscar" id="btnbuscar">
                     <span class="glyphicon glyphicon-search "></span> Buscar
                </button>
          </div>
             
     </div>
    
  </div>
  <br>
  <br>
  <br>
 <div class="row">
    <div class="col-sm-12">
         <br>
         <center><h1 class= "text-success bg-primary">Buscar por una fecha particular</h1></center>
             <div class="col-xs-3">
                     <label class="control-label " for="patente">Nombre del empleado:</label>
                     <input type="text" class=" form-control  input-lg" name="nombreempleado2" id="nombreempleado2" placeholder="Ingrese nombre empleado" name="txtempleado2">
             </div>
             <div class="col-xs-3">
                     <label class="control-label c" for="patente">Fecha:</label>
                     <input type="text" class="form-control  input-lg" name="fecha2" id="fecha2" placeholder="ejemplo: 2017-07-13" name="fecha">
             </div>
             <br>
             <div class="col-xs-3">
                     <button type="button" class="btn btn-info btn-lg botonbuscar2" id="btnbuscar2">
                             <span class="glyphicon glyphicon-search "></span> Buscar
                     </button>
            </div>
     </div>
 </div>
<br>
<br>
<div class="row">
    <div class="col-sm-12">
         <br>
         <center><h1 class= "text-success bg-primary">Cantidad de operaciones por empleado</h1></center>
          <div class="col-xs-3">
             <label class="control-label " for="patente">Nombre del empleado:</label>
             <input type="text" class=" form-control  input-lg" name="nombremp" id="nombremp" placeholder="Ingrese nombre empleado" name="txtempleado">
         </div>
         <div class="col-xs-3">
                     <label class="control-label c" for="patente">Fecha:</label>
                     <input type="text" class="form-control  input-lg" name="fecha3" id="fecha3" placeholder="ejemplo: 2017-07-13" name="fecha">
             </div>
         <div class="col-xs-3">
         <br>
                     <button type="button" class="btn btn-info btn-lg botonbuscar2" id="btnbuscar3">
                             <span class="glyphicon glyphicon-filter "></span> Buscar operaciones
                     </button>
            </div>
    </div>
 </div>
<br>
<br>
      <div id="respuesta">
      </div>
</body>
</html>
<?php
//sleep(2);
?>