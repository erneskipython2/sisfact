<?php

include dirname(dirname(__FILE__))."/conexion/conexion.php";

$link=Conectarse();
		$cedula=$_POST['cedula'];
		$usuario=$_POST['usuario'];
		$pass=$_POST['pass'];
		$pass1=$_POST['pass2'];
		$nombre=$_POST['nombre'];
		$telefono=$_POST['telefono'];
		$direccion=$_POST['direccion'];
		$nivel=$_POST['nivel'];
		if ($pass==$pass1 && $pass!=""){

$query = sprintf("SELECT cedula FROM usuarios WHERE usuarios.cedula = '%s'" ,
$cedula);

$result=mysql_query($query,$link);

if(mysql_num_rows($result)){
			echo "<script language=javascript>
			alert('Error!: La cedula ingresada ya se encuentra registrada');
			window.location.href='/sistema_facturacion/paginas/admin/Gestion Usuarios.php';
			</script>";


} else {
	mysql_free_result($result);


		$query = sprintf("INSERT INTO usuarios (cedula, nombre, usuario, clave, id_grupo, telefono, direccion)

		VALUES ('%s', '%s', '%s', '%s', '%s', '%s', '%s')",$cedula, $nombre, $usuario, $pass1, $nivel, $telefono, $direccion);

		$result=mysql_query($query,$link);

		if(mysql_affected_rows()){
			header("Location:http://localhost/sistema_facturacion/paginas/admin/Gestion Usuarios.php");
		} else {
			echo "<script language=javascript>
			alert('Error al guardar los datos');
			window.location.href='/sistema_facturacion/paginas/admin/Gestion Usuarios.php';
			</script>";

		}
	
}

}else {
			echo "<script language=javascript>
			alert('Los password ingresados no coinciden, intente otra vez');
			window.location.href='/sistema_facturacion/paginas/admin/Gestion Usuarios.php';
			</script>";

		}

?>