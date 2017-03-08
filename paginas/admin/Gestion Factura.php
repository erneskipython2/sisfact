<?php
session_start();
$_SESSION['factura'] = false;
if($_SESSION["ok"]==true && $_SESSION["admin"]==true){
?>
<?php

include("../../conexion/conexion_consulta.php");


$id=mysql_query("SELECT us.cedula, us.usuario, us.nombre, gr.nombre from usuarios us INNER JOIN grupos gr ON us.id_grupo=gr.id_grupo", $con);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>SISFACT - Gesti&oacute;n de Factura</title>

<meta http-equiv="Content-Language" content="English" />
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link rel="stylesheet" type="text/css" href="../../css/style.css" media="screen" />
<link rel="shortcut icon" href="../../images/favicon.ico" type="image/x-icon">
<link rel="icon" href="../../images/favicon.ico" type="image/x-icon">
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

<h2><a href="#">Nueva Venta - Facturaci&oacute;n</a></h2>

<script language="javascript" type="text/javascript">

    //*** Este Codigo permite Validar que sea un campo Numerico
    function Solo_Numerico(variable){
        Numer=parseInt(variable);
        if (isNaN(Numer)){
            return "";
        }
        return Numer;
    }
    function ValNumero(Control){
        Control.value=Solo_Numerico(Control.value);
    }
    //*** Fin del Codigo para Validar que sea un campo Numerico

</script>
<div class="articles">
  <p>&nbsp;</p>
  <center><form id="nuevafactura" method="post" action="/sistema_facturacion/procesos/procesa_cliente_factura.php">
    <table width="269" border="0" cellspacing="1">
      <tr>
        <td>R.I.F Nº: </td>
        <td><input type="text" name="rif" id="rif" maxlength="10" autocomplete="off" placeholder="V-000000" class="textbox" style="text-transform:uppercase;" onblur="javascript:this.value=this.value.toUpperCase();" /></td>
      </tr>
      
    </table>
    <p>&nbsp;</p>
    <p>
      <label>
        <input type="submit" name="enviar" id="enviar" class="submit" value="Siguiente" />
      </label>
      <label>
        <input type="reset" name="limpiar" id="limpiar" class="submit" value="Cancelar" />
      </label>
  </form>
  
    </p>
  </center>

</div>


<h2></h2>
<p>&nbsp;</p>



<div class="articles"></div>

</div>

<div class="right"> 

<h2>Que desea hacer?</h2>
<p>&nbsp;</p>
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
<?php
}else{
    header("Location:http://localhost/sistema_facturacion/paginas/index.php");
    exit;
}
?>
<h2>&nbsp;</h2>
</div>

<div style="clear: both;"> </div>

</div>


<div id="bottom"> </div>

<div id="footer"> Diseñado por Erneski Coronado - Ing. en Informática 

</div>

</div>

</body>
</html>