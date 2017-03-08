<?php

include dirname(dirname(__FILE__))."/conexion/conexion.php";

$link=Conectarse();
		$rif=$_POST['rif'];


$query = sprintf("SELECT * FROM clientes WHERE clientes.rif = '%s'" ,
$rif);

$result=mysql_query($query,$link);
$la=0;
$idcliente=mysql_result($result,$la,"id_clientes");
$rif1=mysql_result($result,$la,"rif");
$razon=mysql_result($result,$la,"razon");
$direccion=mysql_result($result,$la,"direccion");
$telefono=mysql_result($result,$la,"telefono");
$lista = array();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>SISFACT - Gesti&oacute;n de Usuarios</title>

<meta http-equiv="Content-Language" content="English" />
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link rel="stylesheet" type="text/css" href="../../css/style.css" media="screen" />
<link rel="shortcut icon" href="../../images/favicon.ico" type="image/x-icon">
<link rel="icon" href="../../images/favicon.ico" type="image/x-icon">
</head>
<body>
<form id="enviar" name="enviar" method="post" action="/sistema_facturacion/paginas/admin/Gestion Factura Productos.php">
    <table width="269" border="0" cellspacing="1">
      <tr>
      	<td><input type="hidden" name="idcliente" id="idcliente" value="<?php echo $idcliente; ?>" maxlength="11" autocomplete="off" /></td>
        <td><input type="hidden" name="rif" id="rif" value="<?php echo $rif1; ?>" maxlength="10" autocomplete="off" /></td>
        <td><input type="hidden" name="razon" id="razon" value="<?php echo $razon; ?>" maxlength="100" autocomplete="off" /></td>
        <td><input type="hidden" name="direccion" id="direccion" value="<?php echo $direccion; ?>" maxlength="100" autocomplete="off" /></td>
        <td><input type="hidden" name="telefono" id="telefono" value="<?php echo $telefono; ?>" maxlength="100" autocomplete="off" /></td>        
        <td><input type="hidden" name="buscar" id="buscar" value="" maxlength="100" autocomplete="off" /></td>
        <td><input type="hidden" name="agregar" id="agregar" value="" maxlength="100" autocomplete="off" /></td>
        <td><input type="hidden" name="lista" id="lista" value="<?php echo $lista; ?>" maxlength="100" autocomplete="off" /></td>
      </tr>
      
    </table>

      <label>
        <input type="submit" name="enviarlo" id="enviarlo" value="Siguiente" style="display:none" />
      </label>

  </form>
</body>
</html>

<?php
if(mysql_num_rows($result)){
echo "<script language=javascript>
			alert('Cliente encontrado');	
			document.enviar.submit();		
			</script>";	
			

} else {

			echo "<script language=javascript>
			alert('Cliente no encontrado, debe registrarlo primero');
			window.location.href='/sistema_facturacion/paginas/admin/Gestion Clientes.php';
			</script>";		
	
}



?>