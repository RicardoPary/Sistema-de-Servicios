<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Registro de Datos</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<link rel="stylesheet" type="text/css" media="all" href="css/RegistrarCuenta.css" />
<style type="text/css">
<!--
.Estilo3 {font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 12px; }
.Estilo15 {font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 12px; color: #000099; font-weight: bold; }
body,td,th {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 12px;
	color: #000000;
}

</style>

<link rel="stylesheet" type="text/css" href="DataTables/jquery.dataTables.css"/>
<link rel="stylesheet" type="text/css" href="DataTables/jquery.dataTables_themeroller.css"/>
<script src="js/jquery.js"></script>
<script src="js/jquery-1.11.0.min.js"></script>
<script type="text/javascript" language="javascript" src="DataTables/jquery.dataTables.js"></script>


        
    <script>
    $(function(){
        $("#formuploadajax").on("submit", function(e){
            e.preventDefault();
            var f = $(this);
            var formData = new FormData(document.getElementById("formuploadajax"));
            formData.append("dato", "valor");
            //formData.append(f.attr("name"), $(this)[0].files[0]);
            $.ajax({
                url: "CrearServicio.php",
                type: "post",
                dataType: "html",
                data: formData,
                cache: false,
                contentType: false,
	            processData: false,
				success:  function() {   alert('Servicio Registrado con Exito');  }
            })               
        });
    });
    </script>


		
		
<script>
$(document).ready(function() {
    $('#example').dataTable( {
        "language": {         	
	"processing": "cargando......",
	"lengthMenu": "Mostrar _MENU_ registros",
	"zeroRecords": "No existen registros",
		"info": "pagina _PAGE_ de _PAGES_",
	"infoEmpty": "Ningun registro disponible",
	"infoFiltered": "(filtrado de  _MAX_ total registros)",
	"infoPostFix": "",
	"search": "Buscar",
	"url": "",
	"paginate": {
		"first":    "Primero",
		"previous": "Anterior",
		"next":     "Siguiente",
		"last":     "Ultimo"
				}				
        }
    } );
} );
</script>





</head>

<body bgcolor="#F4F4F4">
<?php 
include('Conexion.php');
$cod=$_POST['id'];

?>


<form enctype="multipart/form-data" id="formuploadajax" method="post">

<fieldset>
<legend><strong>Informacion Servicio</strong></legend>
<table width="896" height="74" border="0" cellpadding="2" cellspacing="0">
          
 <tr>
   <td scope="row">&nbsp;</td>
   <td height="26" scope="row"><label for="label">Nombre:</label></td>
   <td><input type="text" name="nombre"  size="30" maxlength="100" id="Nombre" /></td>
   <td>&nbsp;</td>
   <td><label for="label3">Descuento:</label></td>
   <td><input type="text" name="descuento"  size="30" maxlength="128" id="Descuento"/>
     Bs.</td>
   <td>&nbsp;</td>
  </tr>
 
 <tr>
     <td width="12" scope="row">&nbsp;</td>
     <td width="189" height="26" scope="row"><label for="label3">Costo:</label></td>
     <td width="238"><input type="text" name="costo"  size="30" maxlength="128" id="Stock"/>
      Bs.</td>
     <td width="30">&nbsp;</td>
     <td width="93"><label for="label3">Aviso:</label></td>
     <td width="284"><input type="text" name="aviso"  size="30" maxlength="300" id="Descripcion"/></td>
     <td width="22">&nbsp;</td>
  </tr>
 
 <tr>
     <td width="12" scope="row">&nbsp;</td>
     <td width="189" height="26" scope="row"><label for="label3">Tipo:</label></td>
     <td width="238"><select size="1" name="tipo" id="Tipo">
       <option value="Mantenimiento">Mantenimiento</option>
       <option value="Computadoras">Computadoras</option>
       <option value="Electricidad">Electricidad</option>
       <option value="Redes">Redes</option>
     </select></td>
     <td width="30">&nbsp;</td>
     <td width="93"></td>
     <td width="284"><input type="text" name="codigo_organizador"  size="30" maxlength="128" id="Precio" value=<?php echo $cod;?>  
   style="visibility:hidden;" /></td>
     <td width="22">&nbsp;</td>
  </tr>
          
 <tr>
     <td height="22" scope="row">&nbsp;</td>
     <td scope="row"><label for="label3">Imagen:</label></td>
     <td><input type="file" name="imagen" id="Foto"/></td>
     <td>&nbsp;</td>
     <td>&nbsp;</td>
     <td>&nbsp;</td>
     <td>&nbsp;</td>
  </tr>
 
 <tr>
     <td height="22" scope="row">&nbsp;</td>
     <td scope="row"></td>
     <td colspan="5">&nbsp;</td>
    </tr>
</table>
</fieldset>
	
	 <fieldset>
 <table width="776" height="34" border="0" cellpadding="0" cellspacing="0">
   
 <tr>
  <td width="25" height="32" scope="row">&nbsp;</td>
  <td width="96"><input type="submit" value="Registrar" class="submit"/></td>
  <td width="28">&nbsp;</td>
  <td width="99"><input type="reset" name="submit12"id="submit12"value="Limpiar"class="submit"/></td>
  <td width="247">&nbsp;</td>
 </tr>
 </table>
 </fieldset>

</form>






<div style="width:790px; margin:10px auto;">
  <table width="818"  border="0" id="example">
    <thead>
      <tr >
        <td width="67" height="25"><span class="Estilo15">Imagen</span></td>
        <td width="59" height="25"><span class="Estilo15">Codigo Evento</span></td>
        <td width="59"><span class="Estilo15">Codigo Organizador</span></td>
        <td width="52"><span class="Estilo15">Nombre</span></td>
        <td width="58"><span class="Estilo15">Fecha</span></td>
        <td width="46"><span class="Estilo15">Costo</span></td>
        <td width="37"><span class="Estilo15">Descuento</span></td>
        <td width="75"><span class="Estilo15">Tipo</span></td>
		<td width="75"><span class="Estilo15">Aviso</span></td>
       
      
      </tr>
    </thead>
    <tfoot>
      <tr>
            <td width="67" height="25"><span class="Estilo15">Imagen</span></td>
        <td width="59" height="25"><span class="Estilo15">Codigo Evento</span></td>
        <td width="59"><span class="Estilo15">Codigo Organizador</span></td>
        <td width="52"><span class="Estilo15">Nombre</span></td>
        <td width="58"><span class="Estilo15">Fecha</span></td>
        <td width="46"><span class="Estilo15">Costo</span></td>
        <td width="37"><span class="Estilo15">Descuento</span></td>
        <td width="75"><span class="Estilo15">Tipo</span></td>
		<td width="75"><span class="Estilo15">Aviso</span></td>
	
      </tr>
    </tfoot>
    <tbody>
      <?php 


	$sql=$cn->prepare('SELECT * FROM evento');	
	$sql->execute();		
	
  while($op=$sql->fetch())	 	
   { ?>
      <tr>
	   <td><span class="Estilo3"><span class="Estilo3"><img src=<?php echo $op['Imagen'];?> width="73" height="72"></span></span></td>
        <td><span class="Estilo3"><?php echo $op['CodigoEvento'];?></span></td>
        <td><span class="Estilo3"><?php echo $op['CodigoOrganizador'];?></span></td>
        <td><span class="Estilo3"><?php echo $op['Nombre'];?></span></td>
        <td><span class="Estilo3"><?php echo $op['Fecha'];?></span></td>
		<td><span class="Estilo3"><?php echo $op['Costo'];?></span></td>
		<td><span class="Estilo3"><?php echo $op['Descuento'];?></span></td>
		<td><span class="Estilo3"><?php echo $op['Tipo'];?></span></td>
		<td><span class="Estilo3"><?php echo $op['Aviso'];?></span></td>
	
	 
      </tr>
      <?php		
}	
?>
    </tbody>
  </table>
</div>





</body>
</html>
