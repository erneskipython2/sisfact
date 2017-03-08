<?php
session_start();
if($_SESSION["ok"]==true && $_SESSION["admin"]==true){
?>
<?php
include("../../conexion/conexion_consulta.php");

//carga de datos para la actualizacion, se obvia la clave
$c=mysql_query("SELECT * FROM productos WHERE codigo='".$_POST['cod']."'", $con);
$la=0;
$codigo1=mysql_result($c,$la,"codigo");
$nombre=mysql_result($c,$la,"nombre");
$descripcion=mysql_result($c,$la,"descripcion");
$precio=mysql_result($c,$la,"precio");
$cantidad=mysql_result($c,$la,"cantidad");
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>SISFACT - Gesti&oacute;n de Inventario</title>

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

<h2><a href="#">Actualizar Producto</a></h2>

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
  <center><form id="nuevoproducto" enctype="multipart/form-data" method="post" action="/sistema_facturacion/procesos/actualizar_producto.php">
    <table width="269" border="0" cellspacing="1">
      <tr>
        <td>C&oacute;digo:</td>
        <td><input type="text" name="codigo" class="textbox" id="codigo" value="<?php echo $codigo1; ?>" required readonly="readonly" maxlength="10" autocomplete="off" onkeyUp="return ValNumero(this);"/></td>
      </tr>
      
      <tr>
        <td width="119">Nombre:</td>
        <td width="143"><label>
          <input type="text" name="nombre" maxlength="100" class="textbox" value="<?php echo $nombre; ?>" required autocomplete="off" e="off" style="text-transform:uppercase;" onblur="javascript:this.value=this.value.toUpperCase();" />
        </label></td>
      </tr>
      <tr>
        <td>Descripcion:</td>
        <td><input type="text" name="descripcion" maxlength="200" class="textbox" value="<?php echo $descripcion; ?>" required autocomplete="off" style="text-transform:uppercase;" onblur="javascript:this.value=this.value.toUpperCase();" /></td>
      </tr>
      <tr>
        <td>Precio:</td>
        <td><input type="text" name="precio" maxlength="30" class="textbox" required autocomplete="off" value="<?php echo $precio; ?>" onkeypress="return NumCheck(event, this);" /></td>
      </tr>
      <tr>
        <td>Cantidad:</td>
        <td><input type="text" name="cantidad" maxlength="5" class="textbox" required autocomplete="off" value="<?php echo $cantidad; ?>" onkeyUp="return ValNumero(this);" /></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
	  
	  
	  	   <tr>
        <td>Foto:</td>
        <td><input name="uploadedfile" type="file" /></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
    </table>
    <p>&nbsp;</p>
    <p>
      <label>
        <input type="submit" name="enviar" id="enviar" class="submit" value="Guardar" />
      </label>
      <label>
        <input type="reset" name="limpiar" id="limpiar" class="submit" value="Limpiar" />
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
  <li><a href="/sistema_facturacion//conexion/cerrarsesion.php">Cerrar Sesi&oacute;n</a></li>
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