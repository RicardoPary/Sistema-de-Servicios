<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Muro Organizador</title>

<link rel="stylesheet" href="css/MuroOrganizador.css" type="text/css"/> 
<script src="js/jquery.js"></script>
<script src="js/jquery-1.11.0.min.js"></script>
<link rel="stylesheet" type="text/css" href="DataTables/jquery.dataTables.css"/>
<script type="text/javascript" language="javascript" src="js/jquery.js"></script>
<script type="text/javascript" language="javascript" src="DataTables/jquery.dataTables.js"></script>

<script type="text/javascript">
	$(document).ready(function() 
	{							
		CargarEventos();	
		function CargarEventos()
		{  
		 var codigo=<?php echo $_POST['id']; ?>;     
		$("#Medio").load('EventosPersonalizados.php',{id:codigo});	
		}
	});
</script>

<script type="text/javascript">
$(document).ready(function()
{
   $(".Referencia").each(function(){
      var href = $(this).attr("href");
	 
	  $(this).attr({ href: "#"});
      $(this).click(function(){
	  
	  var codigo=<?php echo $_POST['id']; ?>; 
      $("#Medio").load(href,{id:codigo});		 
		 
      });
   });
});
</script>


</head>

<body>
<?php   
include('Conexion.php');
$cod=$_POST['id']; 
 
  $sql=$cn->prepare('SELECT DISTINCT Tipo FROM evento
');
  $sql->execute();
  
  $sql2=$cn->prepare('SELECT * FROM institucion ');
  $sql2->execute();  
  
  $sql3=$cn->prepare("SELECT * FROM organizador WHERE CodigoOrganizador=:Codigo");
  $sql3->execute(array(':Codigo' => $cod ));
  $op3= $sql3->fetch();
 
?>

<div class="Menudiv">
<span><img src=<?php echo $op3['Imagen'];?> width="130" height="106" class="foto1" /></span>
    <p class="letra1">OPCIONES</p>  
	
    <p><a href="EventosPersonalizados.php" class="letra2 Referencia">Ver Todos Mis Servicios</a></p> 	
	<p><a href="RegistrarServicio.php" class="letra2 Referencia">Registrar Servicio</a>	</p>	

	
	
	
	<p class="letra1">OTRAS VISTAS</p>
	<p><a href="TablaOrganizadores.php" class="letra2 Referencia">Tabla de Anunciantes</a></p>	
 
</div>	 
   
<div id="Medio" style="width:950px; margin:10px; padding:0px; float:left; margin-left:10px; border:1px #D6D6D6 solid;">					 
</div>

</body>
</html>
