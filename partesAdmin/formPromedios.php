<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="js/promedios.js"></script> <!--con on en panel no hace falta incluirlo-->
 
</head>

<body>
<div class="row">
<center><h1 class= "text-success bg-primary">Promedios</h1></center>
    <br>
    <div class="col-xs-1"> 
    </div>
    <div class="col-xs-3"> 
             <select id='selectmes' class='class= form-control selectpicker'>
                             <option value="1">Enero</option>
                             <option value="2">Febrero</option>
                             <option value="3">Marzo</option>
                             <option value="4">Abril</option>
                             <option value="5">Mayo</option>
                             <option value="6">Junio</option>
                             <option value="7">Julio</option>
                             <option value="8">Agosto</option>
                             <option value="9">Septiembre</option>
                             <option value="10">Octubre</option>
                             <option value="11">Noviembre</option>
                             <option value="12">Diciembre</option>
               </select>
    </div>
    <div class="col-xs-3"> 
               <input type="text" class="form-control  " name="empleadoname" id="empleadoname" placeholder="Nombre de empleado ej empleado1" >
    </div>
    <div class="col-xs-3"> 
                <button type="button" class="btn btn-success btn-md " id="btnverpromedio">
                     <span class="glyphicon glyphicon-signal"></span> <b>Ver promedio de importe por empleado</b>
                </button>
    </div>
       
</div>


<div class="row">
    <br>
    <div class="col-xs-1"> 
    </div>
    <div class="col-xs-3"> 
             <select id='selectmes2' class='class= form-control selectpicker'>
                             <option value="01">Enero</option>
                             <option value="02">Febrero</option>
                             <option value="03">Marzo</option>
                             <option value="04">Abril</option>
                             <option value="05">Mayo</option>
                             <option value="06">Junio</option>
                             <option value="07">Julio</option>
                             <option value="08">Agosto</option>
                             <option value="09">Septiembre</option>
                             <option value="10">Octubre</option>
                             <option value="11">Noviembre</option>
                             <option value="12">Diciembre</option>
               </select>
    </div>
    <div class="col-xs-3"> 
               <input type="text" class="form-control" name="cocheraname" id="cocheraname" placeholder="Numero de cochera ej 1_3" >
    </div>
    <div class="col-xs-3"> 
                <button type="button" class="btn btn-success btn-md " id="btnverpromedio2">
                     <span class="glyphicon glyphicon-signal"></span> <b>Ver promedio de importe por cochera</b>
                </button>
    </div>
       
</div>


<div class="row">
    <br>
    <div class="col-xs-1"> 
    </div>
    <div class="col-xs-3"> 
             <select id='selectmes3' class='class= form-control selectpicker'>
                             <option value="01">Enero</option>
                             <option value="02">Febrero</option>
                             <option value="03">Marzo</option>
                             <option value="04">Abril</option>
                             <option value="05">Mayo</option>
                             <option value="06">Junio</option>
                             <option value="07">Julio</option>
                             <option value="08">Agosto</option>
                             <option value="09">Septiembre</option>
                             <option value="10">Octubre</option>
                             <option value="11">Noviembre</option>
                             <option value="12">Diciembre</option>
               </select>
    </div>
    <div class="col-xs-3"> 
               <input type="text" class="form-control" name="patentename" id="patentename" placeholder="Numero de patente ej lyt290" >
    </div>
    <div class="col-xs-3"> 
                <button type="button" class="btn btn-success btn-md " id="btnverpromedio3">
                     <span class="glyphicon glyphicon-signal"></span> <b>Ver promedio de importe por patente</b>
                </button>
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