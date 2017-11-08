<?php
include_once '../Clases/AccesoDatos.php';
include_once'GoogChart.class.php';
$operacion = $_POST['operacion'];
switch($operacion){
    case 'promedioempleado':
    $empleado = $_POST['empleado'];
    $mes = $_POST['mes'];  
    if(empty($empleado)||empty($mes)){
         echo "<center><b class='bg-danger'>Debe completar todos los campos</center><br>";
         break;
    } 
    
    $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
	$consulta = $objetoAccesoDato->RetornarConsulta("SELECT fechaingreso,importe FROM  operaciones WHERE empingreso = '$empleado' AND EXTRACT(MONTH FROM fechaingreso) = '$mes'");
	$resultado = $consulta->execute();
    $cantidad = $consulta->rowCount(); 
    $importe = 0;
    $datosArray = array();

    if($cantidad >0){
         while ($row = $consulta->fetch()) {
           
            if($row['importe']>0){
                 if(array_key_exists($row["fechaingreso"],$datosArray)){ // si el indice ya existe en el array
                         $datosArray[$row["fechaingreso"]] += $row['importe'];
                 }else{
                        $datosArray[$row["fechaingreso"]] = $row['importe'];
                 }
                
            }
            
         // echo  "Mes: ".$row["fechaingreso"]."Importe: ".$row['importe']."<br>";
             $importe += $row['importe'];
         }
    
    $promedio = $importe/$cantidad;
    
    echo "<center><b class='bg-success'>Suma de importes totales facturados en el mes:</b> ".$importe."$</center><br>";
    echo "<center><b class='bg-success'>Cantidad de operaciones finalizadas en el mes :</b> ".$cantidad."</center><br>";
    echo "<center><b class='bg-success'>Promedio: </b>". round($promedio,2)."$  </center><br>";
    
    }
    else{
        echo "<center><b class='bg-danger'>No se registrarion importes facturados"."</center><br>";
    }
    $chart = new GoogChart();
    $color = array(
        '#99C754',
        '#54C7C5',
        '#999999',
    );
    $chart->setChartAttrs( array(
    'type' => 'pie',
    'title' => 'Promedios',
    'data' => $datosArray,
    'size' => array( 400, 300 ),
    'color' => $color
    ));
    echo "<center>".$chart."</center>";
  //  echo print_r($datosArray);
    break;


    case "promediocochera":
    $cochera = $_POST['cochera'];
    $mes = $_POST['mes'];  
    if(empty($cochera)||empty($mes)){
         echo "<center><b class='bg-danger'>Debe completar todos los campos</center><br>";
         break;
    } 
    $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
	$consulta = $objetoAccesoDato->RetornarConsulta("SELECT fechaingreso,importe FROM  operaciones WHERE numCochera = '$cochera' AND EXTRACT(MONTH FROM fechaingreso) = '$mes'");
	$resultado = $consulta->execute();
    $cantidad = $consulta->rowCount(); 
    $importe = 0;
    $datosArray = array();

       if($cantidad >0){
         while ($row = $consulta->fetch()) {
           
            if($row['importe']>0){
                 if(array_key_exists($row["fechaingreso"],$datosArray)){ // si el indice ya existe en el array
                         $datosArray[$row["fechaingreso"]] += $row['importe'];
                 }else{
                        $datosArray[$row["fechaingreso"]] = $row['importe'];
                 }
                
            }
            
         // echo  "Mes: ".$row["fechaingreso"]."Importe: ".$row['importe']."<br>";
             $importe += $row['importe'];
         }
    
    $promedio = $importe/$cantidad;
    
    echo "<center><b class='bg-success'>Suma de importes totales facturados en el mes:</b> ".$importe."$</center><br>";
    echo "<center><b class='bg-success'>Cantidad de operaciones finalizadas en el mes :</b> ".$cantidad."</center><br>";
    echo "<center><b class='bg-success'>Promedio: </b>". round($promedio,2)."$  </center><br>";
    
    }
    else{
        echo "<center><b class='bg-danger'>No se registrarion importes facturados"."</center><br>";
    }
     $chart = new GoogChart();
    $color = array(
        '#99C754',
        '#54C7C5',
        '#999999',
    );
    $chart->setChartAttrs( array(
    'type' => 'pie',
    'title' => 'Promedios',
    'data' => $datosArray,
    'size' => array( 400, 300 ),
    'color' => $color
    ));
    echo "<center>".$chart."</center>";

    break;


    case "promediopatente":
    $patente = $_POST['patente'];
    $mes = $_POST['mes'];  
    if(empty($patente)||empty($mes)){
         echo "<center><b class='bg-danger'>Debe completar todos los campos</center><br>";
         break;
    } 

    $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
	$consulta = $objetoAccesoDato->RetornarConsulta("SELECT fechaingreso,importe FROM  operaciones WHERE patente = '$patente' AND EXTRACT(MONTH FROM fechaingreso) = '$mes'");
	$resultado = $consulta->execute();
    $cantidad = $consulta->rowCount(); 
    $importe = 0;
    $datosArray = array();

       if($cantidad >0){
         while ($row = $consulta->fetch()) {
           
            if($row['importe']>0){
                 if(array_key_exists($row["fechaingreso"],$datosArray)){ // si el indice ya existe en el array
                         $datosArray[$row["fechaingreso"]] += $row['importe'];
                 }else{
                        $datosArray[$row["fechaingreso"]] = $row['importe'];
                 }
                
            }
            
         // echo  "Mes: ".$row["fechaingreso"]."Importe: ".$row['importe']."<br>";
             $importe += $row['importe'];
         }
    
    $promedio = $importe/$cantidad;
    
    echo "<center><b class='bg-success'>Suma de importes totales facturados en el mes:</b> ".$importe."$</center><br>";
    echo "<center><b class='bg-success'>Cantidad de operaciones finalizadas en el mes :</b> ".$cantidad."</center><br>";
    echo "<center><b class='bg-success'>Promedio: </b>". round($promedio,2)."$  </center><br>";
    
    }
    else{
        echo "<center><b class='bg-danger'>No se registrarion importes facturados"."</center><br>";
    }
     $chart = new GoogChart();
    $color = array(
        '#99C754',
        '#54C7C5',
        '#999999',
    );
    $chart->setChartAttrs( array(
    'type' => 'pie',
    'title' => 'Promedios',
    'data' => $datosArray,
    'size' => array( 400, 300 ),
    'color' => $color
    ));
    echo "<center>".$chart."</center>";

    break;
}

?>