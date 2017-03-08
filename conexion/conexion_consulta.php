<?php 
$con=mysql_connect("localhost","root","")or die("conexion fallida");
mysql_select_db("sistema_facturacion",$con);
//conexion por PDO
$db = new PDO('mysql:host=localhost;dbname=sistema_facturacion;charset=utf8', 'root', '');
?>