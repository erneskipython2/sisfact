<?php
session_start();
if($_SESSION["ok"]==true){
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Sistema de Facturacion - El Taller del Maestro</title>
<meta http-equiv="Content-Language" content="English" />
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link rel="stylesheet" type="text/css" href="../css/style.css" media="screen" />
</head>
<body>

<div id="wrap">

<div id="header">
<h1>SISFACT</h1>
<h2>Sistema de Facturacion</h2>
</div>

<div id="top"> </div>

<div id="content">

<div class="left"> 

<h2><a href="#">Bienvenido(a) - Usuario Normal: </a> <?php  print "<font color='#8258FA'>".$_SESSION["user"]."</font>";?> <a href="../conexion/cerrarsesion.php">[Cerrar Sesion]</a></h2>
<div class="articles">
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
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
  <li><a href="index.php">Home</a></li>
  <li><a href="Ingresar Articulos.php">Ingresar Articulos</a></li>
  <li>Reportes</li>
  <li></li>

</ul>

<h2>&nbsp;</h2>
</div>

<div style="clear: both;"> </div>

</div>


<div id="bottom"> </div>

<div id="footer"> Diseñado por Erneski Coronado - Ing. en Informática 
<a href="https://portal.unerg.edu.ve/"></a>
</div>

</div>

</body>
</html>
<?php
}else{
    header("Location:http://localhost/sistema_facturacion/paginas/Iniciar_Sesion.php");
    exit;
}
?>

