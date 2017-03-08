<?php
session_start();
if($_SESSION["ok"]==true && $_SESSION["admin"]==true){
?>
<?php
include("../../conexion/conexion_consulta.php");
$id=mysql_query("SELECT us.cedula, us.usuario, us.nombre, gr.nombre from usuarios us INNER JOIN grupos gr ON us.id_grupo=gr.id_grupo", $con);

//carga de datos para la actualizacion, se obvia la clave
$c=mysql_query("SELECT us1.cedula, us1.nombre, us1.usuario, us1.telefono, us1.direccion, gr1.nombre FROM usuarios us1 INNER JOIN grupos gr1 ON us1.id_grupo=gr1.id_grupo WHERE us1.cedula='".$_POST['ced']."'", $con);
$la=0;
$cedula1=mysql_result($c,$la,"us1.cedula");
$nombre=mysql_result($c,$la,"us1.nombre");
$nivel=mysql_result($c,$la,"gr1.nombre");
$usuario=mysql_result($c,$la,"us1.usuario");
$telefono=mysql_result($c,$la,"us1.telefono");
$direccion=mysql_result($c,$la,"us1.direccion");
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>SISFACT - Gesti&oacute;n de Usuarios</title>

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

<h2><a href="#">Nuevo Usuario</a></h2>

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
	function selectInCombo(combo,val)
{
    for(var indice=0 ;indice<document.getElementById(combo).length;indice++)
    {
        if (document.getElementById(combo).options[indice].text==val )
            document.getElementById(combo).selectedIndex =indice;
    }
}

</script>
<div class="articles">
  <p>Ingrese los datos del nuevo usuario </p>
  <p>&nbsp;</p>
  <center><form id="nuevouser" method="post" action="/sistema_facturacion/procesos/actualizar_usuario.php">
    <table width="269" border="0" cellspacing="1">
      <tr>
        <td>C&eacute;dula:</td>
        <td><input type="text" name="cedula" value="<?php echo $cedula1; ?>" readonly="readonly" class="textbox" id="cedula" maxlength="8" autocomplete="off" onkeyUp="return ValNumero(this);"/></td>
      </tr>
      
      <tr>
        <td width="119">Usuario:</td>
        <td width="143"><label>
          <input type="text" name="usuario" class="textbox" required value="<?php echo $usuario; ?>" maxlength="20" autocomplete="off" />
        </label></td>
      </tr>
      <tr>
        <td>Password:</td>
        <td><label>
          <input name="pass" type="password" class="textbox" required  maxlength="20" autocomplete="off"/>
        </label></td>
      </tr>
      <tr>
        <td>Confirmar Password:</td>
        <td><input name="pass2" type="password" class="textbox" required maxlength="20" autocomplete="off" /></td>
      </tr>
      <tr>
        <td>Nombre:</td>
        <td><input type="text" name="nombre" class="textbox" required value="<?php echo $nombre; ?>" maxlength="45" autocomplete="off" style="text-transform:uppercase;" onblur="javascript:this.value=this.value.toUpperCase();" /></td>
      </tr>
      <tr>
        <td>Tel&eacute;fono:</td>
        <td><input type="text" name="telefono" class="textbox" value="<?php echo $telefono; ?>" maxlength="30" autocomplete="off"/></td>
      </tr>
      <tr>
        <td>Direcci&oacute;n:</td>
        <td><input type="text" name="direccion" class="textbox" value="<?php echo $direccion; ?>" maxlength="100" autocomplete="off" style="text-transform:uppercase;" onblur="javascript:this.value=this.value.toUpperCase();"/></td>
      </tr>
      <tr>
        <td>Nivel:</td>
        <td><label>
		<select name="nivel" id="nivel" class="textbox">
                        	<?php
								foreach($db->query("select id_grupo, nombre from grupos") as $row) {		
									$nombre = $row['nombre'];
									$id_grupo= $row['id_grupo'];
									echo "<option value=\"$id_grupo\">$nombre</option>";
								} 
                                ?>
						</select>
                        <script>selectInCombo('nivel','<?php echo $nivel; ?>')</script>
        </label></td>
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
  <li><a href="Nueva Ubicacion.php">Clientes</a></li>
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