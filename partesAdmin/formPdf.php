<?php
include_once'pdf/fpdf.php';
include_once'../Clases/AccesoDatos.php';

 $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
 $consulta = $objetoAccesoDato->RetornarConsulta("SELECT * FROM  cocheras");
 $resultado = $consulta->execute();
 $cantidad = $consulta->rowCount(); 

if($cantidad >0){
$pdf=new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',20);
$pdf->Cell(40,10,'Listado de Vehiculos estacionados');
$pdf->Image('../imagenes/estacionamiento.png' , 50 ,10, 85 , 85,'PNG');
$pdf->SetFont('Arial','B',9);
$pdf->Ln();
         while ($row = $consulta->fetch()) {
           
           $pdf->Cell(40,10,'Cochera:'.$row['numCochera'].',Discapacitado: '.$row['esDisca'].',Marca: '.$row['marca'].",Color: ".$row['color'].",Patente: ".$row['patente'].",HS Ingreso: ".$row['hsingreso'].",Fecha ingreso: ".$row['fechaingreso']); 
           $pdf->Ln();
           $pdf->Cell(40,10,'--------------------------------------------------------------------------------------------------------------------------------------------------------------------------');
           $pdf->Ln();
         }
}

$pdf->Output();
?>