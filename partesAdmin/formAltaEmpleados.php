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
    <div class="container">
                <div class="row col-sm-10 col-sm-offset-2 col-md-10 col-md-offset-2">
                    <h3 class="alert alert-success" style="text-align:center">NUEVO REGISTRO</h3>
                </div>
                
                <form class="form-horizontal" enctype="multipart/form-data" autocomplete="off">
                    <div class="form-group">
                        <label for="nombre" class="col-sm-2 control-label">Nombre</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="apellido" class="col-sm-2 control-label">Apellido</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="apellido" name="apellido" placeholder="Apellido" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="fecha_creacion" class="col-sm-2 control-label">Fecha:</label>
                        <div class="col-sm-10">
                            <input type="date" class="form-control" id="fecha_creacion" name="fecha_creacion">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="foto" class="col-sm-2 control-label">Foto:</label>
                        <div class="col-sm-10">
                            <input type="file" class="form-control" id="foto" name="foto">
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="turno" class="col-sm-2 control-label">Turno</label>
                        <div class="col-sm-10">
                            <select class="form-control" id="turno" name="turno">
                                <option value="MA&Ntilde;ANA" id="1">MAÑANA</option>
                                <option value="TARDE" id="2">TARDE</option>
                                <option value="NOCHE" id="3">NOCHE</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="usuario" class="col-sm-2 control-label">Usuario</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="usuario" name="usuario" placeholder="Usuario" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="clave" class="col-sm-2 control-label">Clave</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="clave" name="clave" placeholder="Clave" required>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <a href="./index.php" class="btn btn-default">Regresar</a>
                            <button type="submit" class="btn btn-primary" id="btningresar">Guardar</button>
                        </div>
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