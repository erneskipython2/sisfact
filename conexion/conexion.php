<?php

function Conectarse(){
if (!($link=mysql_connect("localhost","root",""))) {
echo "Error conectando a la base de datos.";
exit();
}

if (!mysql_select_db("sistema_facturacion",$link)){
echo "Error seleccionando la base de datos.";
exit();
}
return $link;
}
$link = Conectarse();

mysql_close($link); //cierra la conexion

?>