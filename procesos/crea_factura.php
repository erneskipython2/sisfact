<?php
session_start();
include dirname(dirname(__FILE__))."/conexion/conexion.php";
if(isset($_POST['pago'])){
$formapago=$_POST['pago'];
}
$idusuario=$_SESSION['usu'];
$idcliente=$_SESSION['idcli'];
$idventa=1;
//$precio=100;
date_default_timezone_set('UTC');
$fecha = date("Y-m-d");

$link=Conectarse();
$query = sprintf("INSERT INTO venta (fecha, cliente, usuario, forma_pago)

		VALUES ('%s', '%s', '%s', '%s')",$fecha, $idcliente, $idusuario, $formapago);

		$result=mysql_query($query,$link);
		$idventa=mysql_insert_id();
		$_SESSION['venta'] = $idventa;

	
foreach($_SESSION['pedido'] as $prod => $unidades) {

//carga de datos para la actualizacion, se obvia la clave
$c=mysql_query("SELECT precio FROM productos WHERE codigo='".$prod."'");
$la=0;
$precio=mysql_result($c,$la,"precio");

$total=((FLOAT)$precio)*$unidades;
$total = (FLOAT)$total;

$query = sprintf("INSERT INTO ventas_detalle (id_venta, id_producto, cantidad, precio, total)

		VALUES ('%s', '%s', '%s', '%s', '%s')",$idventa, $prod, $unidades, $precio, $total);

		$result=mysql_query($query,$link);
		}

		if(mysql_affected_rows()){
		unset($_SESSION['pedido']); 
		mysql_close($link);
		$_SESSION['factura'] = true;
		
			
			header("Location:http://localhost/sistema_facturacion/paginas/admin/Gestion Factura Productos.php");
		} else {
			echo "<script language=javascript>
			alert('Error al guardar los datos');
			window.location.href='/sistema_facturacion/paginas/admin/Gestion Factura.php';
			</script>";

		}







?>