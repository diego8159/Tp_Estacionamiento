<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="imagenes/persona.jpg">
    <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="crossorigin="anonymous"></script>
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script type="text/javascript" src="js/panel.js"></script> 
    <script type="text/javascript" src="js/panelAdmin.js"></script> 
    <link rel="stylesheet" href="./css/estilos2.css">

    <title>Panel</title>
</head>
<body>
	
<?php
include_once "funciones.php";

session_start();

mostrarBotones($_SESSION['perfil'],$_SESSION['usuario']);
?>
    <!-- Aqui va el jumbotron -->
    <section class="jumbotron">
        <div class="container">
            <h1>Estacionamiento Blog</h1>
            <p>Blog de diseño web</p>
        </div>
    </section>
    <!-- Fin del jumbotron -->

<div id="contenido">
  
    <div class="container">
        <div class="row">
            <h2 class="alert alert-warning" style="text-align:center">Bienvenido</h2>
            <center>
                <img class="img-inicio" src="./imagenes/fondo_porDefecto.png" alt="No se pudo visualizar">
            </center>
            <p class="post-contenido text-justify">
                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
            </p>
        </div>
    </div>

    <br><br>
    
    <div class="text-center center-block">
            <p class="txt-railway">- Diego Espa&ntilde;a -</p>
            <br />
                <a href="https://www.facebook.com/diego.espanahernan" target="_blank"><i id="social-fb" class="fa fa-facebook-square fa-3x social"></i></a>
                <a href="https://github.com/diego8159" target="_blank"><i id="social-tw" class="fa fa-github-square fa-3x social"></i></a>
                <a href="https://plus.google.com/u/0/101105611364934944020" target="_blank"><i id="social-gp" class="fa fa-google-plus-square fa-3x social"></i></a>
                <a href="mailto:diego8159@hotmail.com" target="_blank"><i id="social-em" class="fa fa-envelope-square fa-3x social"></i></a>
    </div>
</div>

    <script type="text/javascript" src="./js/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="./js/bootstrap.min.js"></script>

</body>
</html>