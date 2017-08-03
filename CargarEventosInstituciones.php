<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Servicios</title>
<style type="text/css">
<!--
.Estilo1 {font-family: Vrinda}
-->
</style>

<link rel="stylesheet" href="Aula.css">


<style type="text/css">
<!--
.Estilo2 {
	font-family: Geneva, Arial, Helvetica, sans-serif;
	font-weight: bold;
	font-size: 18px;
}
-->
</style>

<script src="js/jquery.js"></script>
<script src="js/jquery-1.11.0.min.js"></script>



<script type="text/javascript">
$(document).ready(function()
{
   $("a").each(function(){
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
$cod=$_GET['id'];
		
 
$sql=$cn->prepare('SELECT I.Codigoinstitucion,I.Nombre as NombreInstitucion,E.CodigoEvento,E.Nombre as NombreEvento,E.Fecha,I.Imagen FROM evento E,organizador O,institucion I WHERE E.CodigoOrganizador=O.CodigoOrganizador AND O.CodigoInstitucion=I.CodigoInstitucion AND   I.Nombre=:Tipo ORDER BY E.Fecha ASC ');
$sql->execute(array(':Tipo'=>$cod));
while( $op=$sql->fetch())
{	
?>
<div style="float:left; margin-left:60px; margin-bottom: 5px; border-radius:10px;border:2px #002448 solid; background-color:#FFFFFF; margin-top:25px;  width:250px; height:210px;" >

<table width="250" height="150" border="0" cellpadding="0" cellspacing="0" >
  <tr>
    <th height="101" colspan="3" scope="row"><a href="MuestraEvento.php?id=<?php echo $op['CodigoEvento'];?>"><img src=<?php echo $op['Imagen'];?> width="180" height="118" border="0" style="padding:2px; margin:auto;"/></a></th>
    </tr>
  
  <tr>
    <th height="27" scope="row"><span class="Estilo1" style="text-align:left; margin-left:5px;"><?php echo $op['Fecha'];?></span></th>
    <td colspan="2">&nbsp;</td>
  </tr>
  <tr>
    <th width="90" height="27" scope="row"><div align="right"><span class="Estilo1" style="text-align:left; margin-left:5px;">Nombre:</span></div></th>
    <td colspan="2"><span class="Estilo1" style="text-align:left; margin-left:5px;"><?php echo $op['NombreEvento'];?></span></td>
  </tr>
  <tr>
    <th scope="row"><div align="right"><span class="Estilo1" style="text-align:left; margin-left:5px;">Institucion:</span></div></th>
    <td colspan="2"><div align="left"><span class="Estilo1" style="text-align:left; margin-left:5px;"><?php echo $op['NombreInstitucion'];?></span></div></td>
  </tr>
</table>

</div>

<?php
}
?>



</body>
</html>



</body>
</html>