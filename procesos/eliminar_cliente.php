<?php

include dirname(dirname(__FILE__))."/conexion/conexion_consulta.php";
		$rif=$_POST['rif'];

if(!mysql_query("delete from clientes where rif='$rif'", $con))
	{
			echo "<script language=javascript>
			alert('Error al eliminar');
			window.location.href='/sistema_facturacion/paginas/admin/Gestion Clientes.php';
			</script>";
	}else{
			echo "<script language=javascript>
			alert('Cliente Eliminado Exitosamente');
			window.location.href='/sistema_facturacion/paginas/admin/Gestion Clientes.php';
			</script>";
	}


?>