<?php

include dirname(dirname(__FILE__))."/conexion/conexion_consulta.php";
		$rif=$_POST['rif'];
		$razon=$_POST['razon'];
		$direccion=$_POST['direccion'];
		$telefono=$_POST['telefono'];
		
if(!mysql_query("update clientes set razon='".$razon."', direccion='".$direccion."', telefono='".$telefono."' where rif='".$_POST["rif"]."'", $con))
	{
			echo "<script language=javascript>
			alert('Error al guardar los cambios');
			window.location.href='/sistema_facturacion/paginas/admin/Gestion Clientes.php';
			</script>";
	}else{
			echo "<script language=javascript>
			alert('Datos del cliente actualizados correctamente');
			window.location.href='/sistema_facturacion/paginas/admin/Gestion Clientes.php';
			</script>";
	}



?>