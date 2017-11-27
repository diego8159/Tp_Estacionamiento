<?php
include_once "Clases/AccesoDatos.php";
    function mostrarBotones($perfil,$username)
    {
        if($perfil == 'admin')
        {
            $botones = '
                        <header>
                            <nav class="navbar navbar-inverse navbar-static-top" role="navigation">
                                <div class="container">
                                    <div class="navbar-header">
                                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navegacion-fm">
                                            <span class="sr-only"> Desplegar / Ocultar Menu</span>
                                            <span class="icon-bar"></span>
                                            <span class="icon-bar"></span>
                                            <span class="icon-bar"></span>
                                        </button>
                                        <a href="#" class="navbar-brand">Estacionamiento</a>
                                    </div>
                                    <!-- Inicia Menu -->
                                    <div class="collapse navbar-collapse" id="navegacion-fm">
                                        <ul class="nav navbar-nav">
                                            <li class="active"><a href="index.php">Inicio</a></li>
                                            <li class="dropdown">
                                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button">
                                                    Listados
                                                </a>
                                                <ul class="dropdown-menu" role="menu">
                                                    <li class="disabled"><a href="#">Acciones del empleado</a></li>
                                                    <li><a href="#" id="ingresabtn">Ingresar Vehiculo</a></li>
                                                    <li><a href="#" id="buscarbtn">Retirar Vehiculo</a></li>
                                                    <li class="divider"></li>
                                                    <li class="disabled"><a href="#">Acciones del administrador</a></li>
                                                    <li><a href="#" id="empleadosbtn">Detalles de Empleados</a></li>
                                                    <li><a href="#" id="cocherasbtn">Detalle de Cocheras</a></li>
                                                    <li><a href="#" id="autosbtn">Detalle de Vehiculos</a></li>
                                                    <li><a href="#" id="promediosbtn">Promedios</a></li>
                                                    <li><a href="#" id="pdfbtn">Generar PDF</a></li>
                                                </ul>
                                            </li>
                                            <li><a href="logout.php"><span class="glyphicon glyphicon-off"></span> <b>Cerrar sesion <font color="#99FF99">'.$username.'</font></b></a></li>
                                        </ul>
                                    </div>
                                    <!-- Fin Menu -->
                                </div>
                            </nav>
                        </header>
                    ';
            //echo $botones;
            echo $botones;
        }
        else if ( $perfil == "empleado")
        { 
            $botones = '
                        <header>
                            <nav class="navbar navbar-inverse navbar-static-top" role="navigation">
                                <div class="container">
                                    <div class="navbar-header">
                                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navegacion-fm">
                                            <span class="sr-only"> Desplegar / Ocultar Menu</span>
                                            <span class="icon-bar"></span>
                                            <span class="icon-bar"></span>
                                            <span class="icon-bar"></span>
                                        </button>
                                        <a href="#" class="navbar-brand">Estacionamiento</a>
                                    </div>
                                    <!-- Inicia Menu -->
                                    <div class="collapse navbar-collapse" id="navegacion-fm">
                                        <ul class="nav navbar-nav">
                                            <li><a href="index.php">Inicio</a></li><!-- class="active" -->
                                            <li class="dropdown">
                                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button">
                                                    Listados
                                                </a>
                                                <ul class="dropdown-menu" role="menu">
                                                    <li class="disabled"><a href="#">Acciones del empleado</a></li>
                                                    <li><a href="#" id="ingresabtn">Ingresar vehiculo</a></li>
                                                    <li><a href="#" id="buscarbtn">Retirar Vehiculo</a></li>
                                                </ul>
                                            </li>
                                            <li><a href="logout.php"><span class="glyphicon glyphicon-off"></span> <b>Cerrar sesion <font color="#99FF99">'.$username.'</font></b></a></li>
                                        </ul>
                                    </div>
                                    <!-- Fin Menu -->
                                </div>
                            </nav>
                        </header>
                    ';

            echo $botones;
        }
        else 
        {
            header('location: login.php'); 
        }
    }

    function validarPatenteRepetida($patente)//Verificada
    {
        $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
	    $consulta = $objetoAccesoDato->RetornarConsulta("SELECT patente FROM operaciones WHERE patente = '$patente'");
	    $resultado = $consulta->execute();
        $cantidad = $consulta->rowCount();         
        if($cantidad >  0 )
        {
            return true;
        }else
        {
            return false;
        }
    }

    function estaOcupadaCochera($numCochera)//Verificada
    {
        $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
	    $consulta = $objetoAccesoDato->RetornarConsulta("SELECT * FROM operaciones WHERE numCochera = '$numCochera'");
	    $resultado = $consulta->execute();
        $cantidad = $consulta->rowCount(); 
        if($cantidad >  0 )
        {
            return true;
        }else
        {
            return false;
        }   
    }

    function validarDiscapacitado($esDisca,$numCochera)//Verificada
    {
        if(($numCochera == "1_1" || $numCochera == "2_1" || $numCochera == "3_1") && $esDisca == "no") 
            { return true; }
        else
            { return false; }
    }

    function calcularImporte($hsIngreso,$fechaIngreso,$hsSalida,$fechaSalida)
    {
        $diaIngresoArray = explode('-',$fechaIngreso);
        $diaIngreso =(int) $diaIngresoArray[2];
        $diaSalidaArray = explode('-',$fechaSalida);
        $diaSalida =(int) $diaSalidaArray[2];

        $hsIngresoArray = explode(':',$hsIngreso);
        $hsIng = (int)$hsIngresoArray[0];
        $hsSalidaArray = explode(':',$hsSalida);
        $hsSal = (int)$hsSalidaArray[0];
       
        // hs = 10, media = 90 , completa = 170
        if($diaIngreso == $diaSalida)
        {
            $totalhs = $hsSal - $hsIng;
            if($totalhs < 0)
            {
                $totalhs = $hsIng - $hsSal;
            }
            if($totalhs > 0 && $totalhs  <= 11 )
            {
                return $totalhs * 10;
            }else if($totalhs >= 12 && $totalhs <= 24 )
            {
                return (($totalhs - 12 )*10)+90;
            }else if($totalhs == 24)
            {
                return 170;
            }      
        }

        $totaldias =   $diaSalida - $diaIngreso ;
        $calcularIngreso=  24 - $hsIng;

        if($totaldias == 01)
        {
            $calcularEgreso = $hsSal;
            $cantHoras = $calcularIngreso + $calcularEgreso;
            $totalImporte = $cantHoras *10;
            return $totalImporte;
        }
        if($totaldias > 01)
        {
           $calcularEgreso= (($totaldias - 1 )* 24 ) + $hsSal;
           $totalImporte = $calcularIngreso + $calcularEgreso;
           $totalImporte = $totalImporte *10;
           return $totalImporte; 
        }

        $totalHs = $hsSal - $hsIng; 
        $importe = 0;
        if($totalHs > 0 && $totalHs < 12) 
        {
            $importe = $totalHs * 10 ; 
            return $importe;
        }
        if($totalHs >= 12 && $totalHs < 24){
            $importe = 90;
            return $importe;
        }

        if($totalHs == 24)
        {
            $importe= 170;
            return $improte;
        }
        if($totalHs == 0)
        {
            return $importe;
        }       
    }

    function ValidarStatus($usuario)
    {
        $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
        $consulta = $objetoAccesoDato->RetornarConsulta(" SELECT * FROM empleados WHERE usuario = '$usuario' ");
        $resultado = $consulta->execute();
        $cantidad = $consulta->rowCount();

        if($cantidad > 0)
        {
            return true;
        }
        return false;
    }

    function Update ($oldpatente,$newpatente,$marca,$color,$esDisca)//Funciona
    {
        $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
        $consulta = $objetoAccesoDato->RetornarConsulta(" UPDATE operaciones SET patente = '$newpatente', marca = '$marca',color = '$color', esDisca = '$esDisca' WHERE patente = '$oldpatente' ");
        $resultado = $consulta->execute();
        $cantidad = $consulta->rowCount();
        return $cantidad;   
    }

    function traerPatentes()//Funciona
    {
        $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
	    $consulta = $objetoAccesoDato->RetornarConsulta("SELECT patente,id_empleado_ingreso FROM  operaciones");
	    $resultado = $consulta->execute();
        $patentes = $consulta->fetchAll();
	 
        return $patentes; 
    }

    function buscarPorPatente($patente)//Funciona
    {
        $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
	    $consulta = $objetoAccesoDato->RetornarConsulta("SELECT * FROM  operaciones WHERE patente = '$patente'");
	    $resultado = $consulta->execute();
        $cantidad = $consulta->rowCount();
        if($cantidad > 0)
        {
            $json_array = array(); 
            while ($row = $consulta->fetch()) 
            {
                array_push($json_array,array("patente"=>$row['patente'],"marca"=>$row['marca'],"color"=>$row['color'],"esDisca"=>$row['esDisca'],"id"=>$row["id_empleado_ingreso"],"numcochera"=>$row['numCochera']));
            }
            return  $json_array;
        }
    }

    function traerCocherasOcupadas()//Funciona
    {
        $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
	    $consulta = $objetoAccesoDato->RetornarConsulta("SELECT numCochera FROM  operaciones");
	    $resultado = $consulta->execute();
        $cocheras =  $consulta->fetchAll();

        return $cocheras;
    }

    function ValidarSelect($cocheras , $piso)//Probando...
    {
        $PisoDeCochera= explode("_",$piso);
        for($i=0;$i<count($cocheras);$i++)
        {
            if($cocheras[$i] == $piso )
            {
                echo '<option value="'.$cocheras[$i].'" id=".aca valor." >Cochera '.$PisoDeCochera[1] .' </option>';
            }
        }
    }

    function updateDeCochera($oldcochera,$newcochera)//Funciona
    {
        $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
        $consulta = $objetoAccesoDato->RetornarConsulta(" UPDATE operaciones SET numCochera = '$newcochera' WHERE numCochera = '$oldcochera' ");
        $resultado = $consulta->execute();
        if($resultado)
        {
            echo "<center><p class='bg-success'><b>Se movio correctamente el vehiculo de cochera</b></p></center>";
            return true;
        }
    }

    function registrarOperacion($usuario,$tipo,$fecha,$numcochera)
    {
       $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
       $consulta = $objetoAccesoDato->RetornarConsulta("INSERT into registrooperaciones (nombreempleado,tipo,fecha,numcochera)values('$usuario','$tipo','$fecha','$numcochera');"); 		                                                                                                                                                                                                                                                                                                                           
       $resultado = $consulta->execute();  
    }
    

?>



