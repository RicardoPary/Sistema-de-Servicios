<?php
include("Conexion.php");

	$a1=$_POST['T1'];
	$a2=$_POST['T2'];
		
	$sql=$cn->prepare('SELECT * FROM organizador WHERE Nick=:Correo AND Password=:Contra');	
	$sql->execute(array(':Correo' => $a1,':Contra' => $a2 ));		
	$resultado = $sql->fetch();
	$cod=$resultado['CodigoOrganizador'];
	
	$tam=count($resultado);	
					
	if($tam>1)		
	{	
	
	header('Location: Organizador.php?id='.$cod);	
	}
	else
	{
	header('Location: index.php');
	}
   	

?>
