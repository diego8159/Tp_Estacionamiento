<?php

include_once "Clases/AccesoDatos.php";

sleep(2);

$password = $_POST['password'];
$usuario = $_POST['usuario'];
$error =  $_POST['error'];
$cookies = $_POST['cookies'];

$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
$consulta = $objetoAccesoDato->RetornarConsulta(" SELECT * FROM empleados WHERE mail = '$usuario' AND clave = '$password' ");
$resultado = $consulta->execute();
$cantidad = $consulta->rowCount();

 $row = $consulta->fetch();	    
 $perfil =	$row['perfil'];
 $turno = $row['turno'];
 $id= $row['id'];
 $suspendido = $row['suspendido'];	

if($cantidad == 1 && $suspendido == 'no')
{
        if($cookies == "true")
        {             
            setcookie("login",$usuario,  time()+360000 , '/');         
        }
        else{
            setcookie("login",$usuario,  time()-360000 , '/');
        }
      
    session_start();
    $_SESSION['usuario'] = $usuario;
    $_SESSION['perfil']= $perfil;
    $_SESSION['turno'] = $turno;
    $_SESSION['id']= $id;
    $error = 'true';

    if($perfil != 'admin')
    {
        $hsIngreso = date("H:i:s");              
        $fechaIngreso =  date('Y-m-d'); 
        $fecha_hora_ingreso = $fechaIngreso . " / " . $hsIngreso;        

        $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
        $consulta = $objetoAccesoDato->RetornarConsulta("INSERT into ingresos_empleados (fecha_hora_ingreso,id_empleado)values('$fecha_hora_ingreso','$id')");
        $resultado = $consulta->execute();
    }
      
}
if($error == 'false')
{
    echo 'error';
}


?>