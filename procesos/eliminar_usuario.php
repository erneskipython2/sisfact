<?php

include dirname(dirname(__FILE__))."/conexion/conexion_consulta.php";
		$cedula=$_POST['ced'];

if(!mysql_query("delete from usuarios where cedula='$cedula'", $con))
	{
			echo "<script language=javascript>
			alert('Error al eliminar');
			window.location.href='/sistema_facturacion/paginas/admin/Gestion Usuarios.php';
			</script>";
	}else{
			echo "<script language=javascript>
			alert('Usuario Eliminado Exitosamente');
			window.location.href='/sistema_facturacion/paginas/admin/Gestion Usuarios.php';
			</script>";
	}


?>