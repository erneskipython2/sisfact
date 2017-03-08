<?php
session_start();
if($_SESSION["ok"]==true && $_SESSION["admin"]==true){
?>
<?php
include("../../conexion/conexion_consulta.php");

//carga de datos para la actualizacion, se obvia la clave
$c=mysql_query("SELECT * FROM clientes WHERE rif='".$_POST['rif']."'", $con);
$la=0;
$rif1=mysql_result($c,$la,"rif");
$razon=mysql_result($c,$la,"razon");
$direccion=mysql_result($c,$la,"direccion");
$telefono=mysql_result($c,$la,"telefono");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>SISFACT - Gestión de Clientes</title>

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

<h2><a href="#">Actualizar Cliente</a></h2>

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
<script language="javascript"> 
  function NumCheck(e, field) {
    key = e.keyCode ? e.keyCode : e.which
    if (key == 8) return true
    if (key > 47 && key < 58) {
      if (field.value == "") return true
      regexp = /.[0-9]{5}$/
      return !(regexp.test(field.value))
    }
    if (key == 46) {
      if (field.value == "") return false
      regexp = /^[0-9]+$/
      return regexp.test(field.value)
    }
    return false
  }
</script> 
<div class="articles">
  <p>&nbsp;</p>
  <center><form id="nuevocliente" method="post" action="/sistema_facturacion/procesos/actualizar_cliente.php">
    <table width="269" border="0" cellspacing="1">      
      <tr>
        <td width="119">R.I.F:</td>
        <td width="143"><label>
          <input type="text" name="rif" value="<?php echo $rif1; ?>" readonly="readonly" maxlength="11" autocomplete="off" onkeyUp="return ValNumero(this);" />
        </label></td>
      </tr>
      <tr>
        <td>Raz&oacute;n:</td>
        <td><input type="text" name="razon" value="<?php echo $razon; ?>" maxlength="100" required autocomplete="off" style="text-transform:uppercase;" onblur="javascript:this.value=this.value.toUpperCase();" /></td>
      </tr>
      <tr>
        <td>Direcci&oacute;n:</td>
        <td><input type="text" name="direccion" value="<?php echo $direccion; ?>" maxlength="255" required autocomplete="off" style="text-transform:uppercase;" onblur="javascript:this.value=this.value.toUpperCase();" /></td>
      </tr>
      <tr>
        <td>Tel&eacute;fono:</td>
         <td><input type="text" name="telefono" value="<?php echo $telefono; ?>" maxlength="30" required autocomplete="off" style="text-transform:uppercase;" onblur="javascript:this.value=this.value.toUpperCase();" /></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
    </table>
    <p>&nbsp;</p>
    <p>
      <label>
        <input type="submit" name="enviar" id="enviar" value="Guardar" class="submit" />
      </label>
      <label>
        <input type="reset" name="limpiar" id="limpiar" value="Limpiar" class="submit" />
      </label>
  </form>
  
    </p>
  </center>

</div>


<h2></h2>



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