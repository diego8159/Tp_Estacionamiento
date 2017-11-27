<!DOCTYPE html>
<html lang="es">
<head>
    <title>Login</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="shortcut icon" href="imagenes/persona.jpg">
    <link rel="stylesheet" type="text/css" href="css/estilos.css">
    <script src="js/login.js"></script>
</head>
<body>

    <div class="container">
        <center><br>
            <img src="imagenes/persona.jpg" class="img-circle" width="100" height="100">
        </center>

        <form action = "" method="POST" class="form-horizontal" id="loginForm" name="loginForm">

                 <div class="form-group" ><br>
                     <label class="control-label col-sm-5" for="usuario">Usuario:</label>
                     <div class="col-sm-3">
                         <input type="text" class="form-control" name="usuario" id="usuario" placeholder="Ingrese usuario">
                     </div>
                 </div>

                <div class="form-group" >
                   <label class="control-label col-sm-5" for="clave">Contraseña:</label>
                   <div class="col-sm-3">
                        <input type="password" class="form-control" name="clave" id="clave" placeholder="Ingrese contraseña">
                   </div>
                </div>
                  
                <div class="form-group" id="id_Botones">
                    <div class="col-xs-9 col-xs-offset-3 col-sm-7 col-sm-offset-5 col-md-7 col-md-offset-5 col-lg-7 col-lg-offset-5">
                        <button type="button" class="btn btn-success btn-md" id="entrarbtn"> 
                            <span class="glyphicon glyphicon-user"></span> Ingresar
                        </button>
                        <button type="button" class="btn btn-danger btn-md" id="resetbtn">
                            <span class="glyphicon glyphicon-refresh"></span> Restablecer
                        </button>

                        <br><br>
                        <button type="button" class="btn btn-warning btn-md"  id="testUsuarioBTN"> 
                            <span class="glyphicon glyphicon-cog"></span> Test Usuario
                        </button> 
                        <button type="button" class="btn btn-warning btn-md" id="testAdminBTN"> <!-- btn-block (lo hace muy ancho, buscar como reducirlo)" -->
                            <span class="glyphicon glyphicon-cog"></span> Test Admin
                        </button>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-xs-9 col-xs-offset-3 col-sm-7 col-sm-offset-5 col-md-7 col-md-offset-5 col-lg-7 col-lg-offset-5">
                        <input type="checkbox" id="recordarme" checked> Recordame<br><br><br><br>

                        <div id="respuesta">
                         
                        </div>
                    </div>
                </div>        
        </form>
        <br>
    </div>
    <script src="./js/jquery-3.2.1.min.js"></script>
</body>
</html>
<?php

session_start();

 if(isset($_SESSION['usuario'])){ 
      
      echo "<script type='text/javascript'>";
      echo "window.location='index.php';"; 
      echo "</script>";
 }
 if(isset( $_COOKIE['login'])){

     echo "<script type='text/javascript'>";
     echo "document.getElementById('usuario').value = '".$_COOKIE['login']."';";
     echo "</script>";        
 }
 
?>