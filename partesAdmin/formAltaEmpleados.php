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
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="col-xs-3">
                    <label class="control-label" for="usuario">Nombre:</label> <!--perfil,usuario,turno,clave,suspendido -->
                    <input type="text" class="form-control  input-lg" id="nombre" name="nombre" placeholder="ingrese nombre">
                </div>
                <br>
                <div class="col-xs-3">
                    <label class="control-label" for="usuario">Apellido:</label> <!--perfil,usuario,turno,clave,suspendido -->
                    <input type="text" class="form-control  input-lg" id="apellido" name="apellido" placeholder="ingrese apellido">
                </div>
                <br>
                <div class="col-xs-3">
                    <label class="control-label" for="usuario">Fecha:</label> <!--perfil,usuario,turno,clave,suspendido -->
                    <input type="date" class="form-control  input-lg" id="fecha_creacion" name="fecha_creacion">
                    <!--
                        Probar asignarle por defecto la fecha actual del dia que ingrese.
                        <input type="date" name="cumpleanios" step="1" min="2013-01-01" max="2013-12-31" value="<?php //echo date("Y-m-d");?>">
                    -->
                </div>
                <br>
                <div class="col-xs-3">
                    <form method="post" enctype="multipart/form-data">
                        <label class="control-label" for="usuario">Foto:</label> <!--perfil,usuario,turno,clave,suspendido -->
                        <input type="file" class="form-control  input-lg" id="foto" name="foto">
                        <br>
                        <img  src="./imagenes/pordefecto.png" alt="No se pudo visualizar la foto por defecto"/>
                    </form>
                </div>
                <br>
                <div class="col-xs-3">
                    <label class="control-label" for="usuario">Usuario:</label> <!--perfil,usuario,turno,clave,suspendido -->
                    <input type="text" class="form-control  input-lg" id="usuario" name="usuario" placeholder="ingrese mail">
                </div>
                <br>
                <div class="col-xs-3">
                    <label class="control-label" for="usuario">Turno:</label> <!--perfil,usuario,turno,clave,suspendido -->
                    <select class="form-control input-lg" id="turno"  name="turno">
                        <option value="Mañana" id="1">Mañana</option>
                        <option value="Tarde" id="2">Tarde</option>
                        <option value="Noche" id="3">Noche</option>
                    </select>         
                </div>
                <br>
                <div class="col-xs-3">
                    <label class="control-label" for="usuario">Clave:</label> <!--perfil,usuario,turno,clave,suspendido -->
                    <input type="password" class="form-control  input-lg" id="clave" name="clave" placeholder="ingrese clave">
                </div>
                <br><br>
                <div class="col-xs-3">
                    <button type="button" class="btn btn-info btn-lg botoningresar" id="btningresar">
                        <span class="glyphicon glyphicon-plus"></span> Ingresar empleado
                    </button>
                </div>
       
            </div> 

 
      <div id="respuesta">
      </div>
        </div>
    </div>
 
</body>
</html>
<?php
//sleep(2);
?>