<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="js/panelAdmin.js"></script> <!--con on en panel no hace falta incluirlo-->
</head>
<body>
<div class="row">
<center><h1 class= "text-success bg-primary">Informacion  de  cocheras por fecha</h1></center>
        
        <div class="col-xs-2">
                <button type="button" class="btn btn-success btn-sm botoninfo" id="btninfo">
                     <span class="glyphicon glyphicon-flag"></span> Informacion de cocheras
                </button>
        </div>
         <div class="col-xs-2">
                <input type="text" class="form-control  input-sm" name="fecha" id="fecha" placeholder="ejemplo: 2017-07-13" >
         </div>
</div>


<br>
<br>


<div class="row">
<center><h1 class= "text-success bg-primary">Informacion  de  cocheras por lapso</h1></center>
        
        <div class="col-xs-2">
                <button type="button" class="btn btn-success btn-sm botoninfo2" id="btninfo2">
                     <span class="glyphicon glyphicon-flag "></span> Informacion de cocheras
                </button>
        </div>
        <div class="col-xs-2">
                <input type="text" class="form-control  input-sm" name="fecha1" id="fecha1" placeholder="ejemplo desde: 2017-07-13" >
        </div>
         <div class="col-xs-2">
                <input type="text" class="form-control  input-sm" name="fecha2" id="fecha2" placeholder="ejemplo hasta: 2017-07-13" >
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