<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Muro</title>

<link rel="stylesheet" href="css/MuroInicio.css" type="text/css"/> 
<script src="js/jquery-1.11.0.min.js"></script>

<script type="text/javascript">
	$(document).ready(function() 
	{							
		CargarEventos();	
		function CargarEventos()
		{  
		$("#Medio").load('EventosRecientes.php');	
		}
	});
</script>


<script type="text/javascript">
$(document).ready(function()
{
   $(".Enlace").each(function(){
      var href = $(this).attr("href");
	 
	  $(this).attr({ href: "#"});
      $(this).click(function(){
	  $("#Medio").load(href);		 
		 
      });
   });
});
</script>






</head>

<body>
<?php   
include('Conexion.php');
 
 
  $sql=$cn->prepare('SELECT DISTINCT Tipo FROM evento');
  $sql->execute();
  
  $sql2=$cn->prepare('SELECT * FROM institucion ');
  $sql2->execute();
 
?>

<div class="Menudiv">
  <p class="letra1">
  <a href="EventosRecientes.php" class="Enlace" style="color:#383838; font-family:Geneva, Arial, Helvetica, sans-serif; font-size:12px; ">Servicios Recientes</a>
  </p> 
  <p class="letra1"><strong>SERVICIOS</strong></p>  
  <?php 
    while( $op=$sql->fetch())	 	
    {?>     
	<p>
	<a href="CargarEventos.php?id=<?php echo  $op['Tipo'];?>" style="color:#383838; font-family:Geneva, Arial, Helvetica, sans-serif; font-size:12px;" class="Enlace2"><?php echo $op['Tipo']; ?></a>
	</p>  
	<?php 	
	}
	?>
	

	
	 <p class="letra1"><strong>SERVICIOS POR EMPRESA</strong></p>
	  <?php 
    while( $op2=$sql2->fetch())	 	
    {?>     
	<p>
	<a href="CargarEventosInstituciones.php?id=<?php echo  $op2['Nombre'];?>" style="color:#383838; font-family:Geneva, Arial, Helvetica, sans-serif; font-size:12px;" class="Enlace2"><?php echo $op2['Nombre']; ?></a>
	</p>  
	<?php 	
	}
	?>
	
	
	
</div>	 
   
<div id="Medio" style="width:1000px; margin:10px; padding:0px; float:left; margin-left:10px; border:1px #E0E0E0 solid;">					 
</div>

</body>
</html>
