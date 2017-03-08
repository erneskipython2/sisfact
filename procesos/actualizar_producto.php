<?php

include dirname(dirname(__FILE__))."/conexion/conexion_consulta.php";
		$codigo=$_POST['codigo'];
		$nombre=$_POST['nombre'];
		$descripcion=$_POST['descripcion'];
		$precio=$_POST['precio'];
		$cantidad=$_POST['cantidad'];
$target_path = "uploads/";
$target_path = $target_path . basename( $_FILES['uploadedfile']['name']); if(move_uploaded_file($_FILES['uploadedfile']['tmp_name'], $target_path)) { echo "El archivo ". basename( $_FILES['uploadedfile']['name']). " ha sido subido";
} else{
echo "Ha ocurrido un error, trate de nuevo!";
}

if(!mysql_query("update productos set nombre='".$nombre."', descripcion='".$descripcion."', precio='".$precio."', cantidad='".$cantidad."' where codigo='".$_POST["codigo"]."'", $con))
	{
			echo "<script language=javascript>
			alert('Error al guardar los cambios');
			window.location.href='/sistema_facturacion/paginas/admin/Gestion Inventario.php';
			</script>";
	}else{

			echo "<script language=javascript>
			alert('Datos del producto actualizados correctamente');
			window.location.href='/sistema_facturacion/paginas/admin/Gestion Inventario.php';
			</script>";
	}



?>