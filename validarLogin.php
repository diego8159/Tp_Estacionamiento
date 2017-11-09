<?php

include_once "Clases/AccesoDatos.php";

sleep(2);

$password = $_POST['password'];
$usuario = $_POST['usuario'];
$error =  $_POST['error'];
$recordar = $_POST['recordar'];

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
        if($recordar == "true")
        {             
            setcookie("login",$usuario,  time()+360000 , '/');         
            //echo "RECORDANDO!!!";
        }
        else{
            setcookie("login",$usuario,  time()-360000 , '/');
            //echo "OLVIDANDO!!!";
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
    echo json_encode(array('error' => false, 'usuario' => $usuario,'perfil' => $perfil, 'recordar' => $recordar) );
}
    if($error == 'false')
    {
        //echo 'error';
        echo json_encode(array('error' => true));
    }


?>