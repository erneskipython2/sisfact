<?php

include dirname(dirname(__FILE__))."/conexion/conexion_consulta.php";
		$cedula=$_POST['cedula'];
		$usuario=$_POST['usuario'];
		$pass=$_POST['pass'];
		$pass1=$_POST['pass2'];
		$nombre=$_POST['nombre'];
		$telefono=$_POST['telefono'];
		$direccion=$_POST['direccion'];
		$nivel=$_POST['nivel'];
		
		if ($pass==$pass1 && $pass!=""){

if(!mysql_query("update usuarios set usuario='".$usuario."', id_grupo='".$nivel."', clave='".$pass."', nombre='".$nombre."', telefono='".$telefono."', direccion='".$direccion."' where cedula='".$_POST["cedula"]."'", $con))
	{
			echo "<script language=javascript>
			alert('Error al guardar los cambios');
			window.location.href='/sistema_facturacion/paginas/admin/Gestion Usuarios.php';
			</script>";
	}else{
			echo "<script language=javascript>
			alert('Datos del usuario actualizados correctamente');
			window.location.href='/sistema_facturacion/paginas/admin/Gestion Usuarios.php';
			</script>";
	}

}else {
			echo "<script language=javascript>
			alert('Los password ingresados no coinciden, intente otra vez');
			window.location.href='/sistema_facturacion/paginas/admin/Gestion Usuarios.php';
			</script>";

		}

?>