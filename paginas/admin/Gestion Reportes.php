<?php
session_start();
if($_SESSION["ok"]==true && $_SESSION["admin"]==true){
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>SISFACT - Inicio</title>
<META HTTP-EQUIV="REFRESH" CONTENT="300;URL=http://localhost/sistema_facturacion/conexion/cerrarsesion.php"> 
<meta http-equiv="Content-Language" content="es" />
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link rel="stylesheet" type="text/css" href="../../css/style.css" media="screen" />
</head>
<body>

<div id="wrap">

<div id="header">
<h1>SISFACT</h1>
<h2>Sistema de Facturaci&oacute;n</h2>
</div>

<div id="top"> </div>

<div id="content">

<div class="left"> 

<h2><a href="#">Bienvenido(a) - Usuario Administrador: </a><?php  print "<font color='red'>".$_SESSION["user"]."</font>";?> </h2>
<div class="articles">
  <p>&nbsp;</p>
  <p><a href="/sistema_facturacion/vista/reporte_ventas_dia.php" target="new">Reporte de Ventas del D&iacute;a</a></p>
  <p><a href="/sistema_facturacion/vista/reporte_clientes.php" target="new">Reporte de Clientes Registrados</a></p>
  <p><p><a href="/sistema_facturacion/vista/reporte_inventario.php" target="new">Reporte de Inventario</a></p></p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>Productos mas vendidos</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
</div>


<h2>&nbsp;</h2>
<div class="articles"></div>

</div>

<div class="right"> 

<h2>Que desea hacer?</h2>
<ul>
  <li><a href="index admin.php">Inicio</a></li>
  <li><a href="Gestion Factura.php">Facturaci&oacute;n</a></li>
  <li><a href="Gestion Inventario.php">Inventario</a></li>
  <li><a href="Gestion Clientes.php">Clientes</a></li>
  <li><a href="Gestion Reportes.php">Reportes</a></li>
  <li><a href="Gestion Usuarios.php">Gesti&oacute;n de Usuarios</a></li>
  <li><a href="/sistema_facturacion/conexion/cerrarsesion.php">Cerrar Sesi&oacute;n</a></li>
  <li></li>
  <li></li>

</ul>

<h2>&nbsp;</h2>
</div>

<div style="clear: both;"> </div>

</div>


<div id="bottom"> </div>

<div id="footer"> Diseñado por Erneski Coronado - Ing. en Informática 
<a href="http://www.openwebdesign.org/"></a>
</div>

</div>

</body>
</html>
<?php
}else{
    header("Location:http://localhost/Inventario/paginas/index.php");
    exit;
}
?>

