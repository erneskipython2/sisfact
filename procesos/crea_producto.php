<?php

include dirname(dirname(__FILE__))."/conexion/conexion.php";

$link=Conectarse();
		$codigo=$_POST['codigo'];
		$nombre=$_POST['nombre'];
		$descripcion=$_POST['descripcion'];
		$precio=$_POST['precio'];
		$cantidad=$_POST['cantidad'];

$query = sprintf("SELECT codigo FROM productos WHERE productos.codigo = '%s'" ,
$codigo);

$result=mysql_query($query,$link);

if(mysql_num_rows($result)){
			echo "<script language=javascript>
			alert('Error!: El codigo ingresado ya se encuentra registrado');
			window.location.href='/sistema_facturacion/paginas/admin/Gestion Inventario.php';
			</script>";


} else {
	mysql_free_result($result);


		$query = sprintf("INSERT INTO productos (codigo, nombre, descripcion, precio, cantidad)

		VALUES ('%s', '%s', '%s', '%s', '%s')",$codigo, $nombre, $descripcion, $precio, $cantidad);

		$result=mysql_query($query,$link);
		
$target_path = "uploads/";
$target_path = $target_path . basename( $_FILES['uploadedfile']['name']); if(move_uploaded_file($_FILES['uploadedfile']['tmp_name'], $target_path)) { echo "El archivo ". basename( $_FILES['uploadedfile']['name']). " ha sido subido";

} else{
echo "Ha ocurrido un error, trate de nuevo!";
}
		
		
		

		if(mysql_affected_rows()){
			header("Location:http://localhost/sistema_facturacion/paginas/admin/Gestion Inventario.php");
		} else {
			echo "<script language=javascript>
			alert('Error al guardar los datos');
			window.location.href='/sistema_facturacion/paginas/admin/Gestion Inventario.php';
			</script>";

		}
	
}



?>