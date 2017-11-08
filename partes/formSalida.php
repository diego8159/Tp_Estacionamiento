<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="crossorigin="anonymous"></script>
    <script src="js/panel.js"></script>
    <link rel="stylesheet" href="./css/estilos2.css">
</head>
<body>
    <div class="container">
        <div class="row">
          <h3 class="alert alert-danger" style="text-align:center">SALIDA DEL VEHICULO</h3>
        </div>
        
        <form class="form-horizontal" method="POST" action="#" autocomplete="off">
          <div class="form-group">
            <label for="patente" class="col-sm-2 control-label">Patente</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="patente" name="patente" placeholder="Patente" required>
            </div>
          </div>

          <div class="form-group">
            <center>
                  <button type="button" class="btn btn-success" id="mostrarPatenteBtn"> <!--button no submit-->
                          <span class="glyphicon glyphicon-search"></span> Retirar vehiculo
                  </button> 
                  <button type="button" class="btn btn-info" id="resetbtn2">
                          <span class="glyphicon glyphicon-refresh"></span> Reiniciar
                  </button>
            </center>
          </div>
        </form>

        <div id="respuesta">
            </div>
    </div> 

    <div id= "respuesta">
    </div>
</body>
</html>
<?php
//sleep(2);
?>