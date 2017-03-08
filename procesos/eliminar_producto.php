<?php

include dirname(dirname(__FILE__))."/conexion/conexion_consulta.php";
		$codigo=$_POST['cod'];

if(!mysql_query("delete from productos where codigo='$codigo'", $con))
	{
			echo "<script language=javascript>
			alert('Error al eliminar');
			window.location.href='/sistema_facturacion/paginas/admin/Gestion Inventario.php';
			</script>";
	}else{
			echo "<script language=javascript>
			alert('Producto Eliminado Exitosamente');
			window.location.href='/sistema_facturacion/paginas/admin/Gestion Inventario.php';
			</script>";
	}


?>