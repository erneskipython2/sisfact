<?php

include dirname(dirname(__FILE__))."/conexion/conexion.php";

$link=Conectarse();
		$tipo=$_POST['tipo'];
		$rif=$_POST['rif'];
		$razon=$_POST['razon'];
		$direccion=$_POST['direccion'];
		$telefono=$_POST['telefono'];
		$rifcon=$tipo."-".$rif;

$query = sprintf("SELECT rif FROM clientes WHERE clientes.rif = '%s'" ,
$rifcon);

$result=mysql_query($query,$link);

if(mysql_num_rows($result)){
			echo "<script language=javascript>
			alert('Error!: El RIF ingresado ya se encuentra registrado');
			window.location.href='/sistema_facturacion/paginas/admin/Gestion Clientes.php';
			</script>";


} else {
	mysql_free_result($result);


		$query = sprintf("INSERT INTO clientes (rif, razon, direccion, telefono)

		VALUES ('%s', '%s', '%s', '%s')",$rifcon, $razon, $direccion, $telefono);

		$result=mysql_query($query,$link);

		if(mysql_affected_rows()){
			header("Location:http://localhost/sistema_facturacion/paginas/admin/Gestion Clientes.php");
		} else {
			echo "<script language=javascript>
			alert('Error al guardar los datos');
			window.location.href='/sistema_facturacion/paginas/admin/Gestion Clientes.php';
			</script>";

		}
	
}



?>