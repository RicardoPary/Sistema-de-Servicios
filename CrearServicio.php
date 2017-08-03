<?php
include("Conexion.php");
	$codigo_organizador=$_POST['codigo_organizador'];

	$nombre=$_POST['nombre'];
	$costo=$_POST['costo'];	
	$tipo=$_POST['tipo'];
	$descuento=$_POST['descuento'];
	$aviso=$_POST['aviso'];
	
	
	$NombreFoto=$_FILES['imagen']['name'];
	$Ruta=$_FILES['imagen']['tmp_name'];	
    $Destino="Imagenes/".$NombreFoto;
	copy($Ruta,$Destino);	

	
				
$consulta=$cn->prepare('INSERT INTO evento(CodigoOrganizador,Nombre,Fecha,Costo,Descuento,Tipo,Aviso,Imagen)VALUES(:codigo,:nombre,CURDATE(),:costo,:descuento,:tipo,:aviso,:imagen)');
$consulta->execute(array(':codigo'=>$codigo_organizador,':nombre'=>$nombre,':costo'=>$costo,':descuento'=>$descuento,':tipo'=>$tipo,':aviso'=>$aviso,':imagen'=>$Destino));

?>

