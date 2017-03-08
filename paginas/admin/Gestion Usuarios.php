<?php
session_start();
if($_SESSION["ok"]==true && $_SESSION["admin"]==true){
?>
<?php

include("../../conexion/conexion_consulta.php");


$id=mysql_query("SELECT us.cedula, us.usuario, us.nombre, gr.nombre from usuarios us INNER JOIN grupos gr ON us.id_grupo=gr.id_grupo", $con);
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

</script>
<div class="articles">
  <p>Ingrese los datos del nuevo usuario </p>
  <p>&nbsp;</p>
  <center><form id="nuevouser" method="post" action="/sistema_facturacion/procesos/crea_usuario.php">
    <table width="269" border="0" cellspacing="1">
      <tr>
        <td>C&eacute;dula:</td>
        <td><input type="text" name="cedula" id="cedula" class="textbox" required maxlength="8" autocomplete="off" onkeyUp="return ValNumero(this);"/></td>
      </tr>
      
      <tr>
        <td width="119">Usuario:</td>
        <td width="143"><label>
          <input type="text" name="usuario" maxlength="20" class="textbox" required autocomplete="off" />
        </label></td>
      </tr>
      <tr>
        <td>Password:</td>
        <td><label>
          <input name="pass" type="password"  class="textbox" required maxlength="20" autocomplete="off"/>
        </label></td>
      </tr>
      <tr>
        <td>Confirmar Password:</td>
        <td><input name="pass2" type="password" class="textbox" required maxlength="20" autocomplete="off" /></td>
      </tr>
      <tr>
        <td>Nombre:</td>
        <td><input type="text" name="nombre" maxlength="45" class="textbox" required autocomplete="off" style="text-transform:uppercase;" onblur="javascript:this.value=this.value.toUpperCase();" /></td>
      </tr>
      <tr>
        <td>Tel&eacute;fono:</td>
         <td><input type="text" name="telefono" maxlength="30" class="textbox"  autocomplete="off" style="text-transform:uppercase;" onblur="javascript:this.value=this.value.toUpperCase();" /></td>
      </tr>
      <tr>
        <td>Direcci&oacute;n:</td>
        <td><input type="text" name="direccion" maxlength="100" class="textbox"  autocomplete="off" style="text-transform:uppercase;" onblur="javascript:this.value=this.value.toUpperCase();" /></td>
      </tr>
      <tr>
        <td>Nivel:</td>
        <td><label>
		<select name="nivel" id="nivel" class="textbox" >
                        	<?php
								foreach($db->query("select id_grupo, nombre from grupos") as $row) {		
									$nombre = $row['nombre'];
									$id_grupo= $row['id_grupo'];
									echo "<option value=\"$id_grupo\">$nombre</option>";
								} 
                                ?>
						</select>
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
        <input type="submit" name="enviar" id="enviar" value="Guardar" class="submit" />
      </label>
      <label>
        <input type="reset" name="limpiar" id="limpiar" value="Limpiar" class="submit" />
      </label>
  </form>
  
    </p>
  </center>

</div>


<h2><a href="#">Usuarios Registrados</a></h2>
<p>&nbsp;</p>
  <?php
echo "<table border=1 width=600 style=\"color:#000000;weight: bold;border-collapse: collapse;border: #08298A 2px solid;\">";
echo "<tr align=\"center\"><td><b>C&eacute;dula</b></td><td><b>Usuario</b></td><td><b>Nombres</b></td><td><b>Nivel</b></td><td><b>Editar</b></td><td><b>Eliminar</b></td>";
for ($la=0;$la<mysql_num_rows($id);$la++)
	{
	$cedula = mysql_result($id,$la,"us.cedula");
		$usuario = mysql_result($id,$la,"us.usuario");
			$nombre=mysql_result($id,$la,"us.nombre");
				$nivel=mysql_result($id,$la,"gr.nombre");
	echo "<tr align=\"center\"><td>$cedula</td><td>$usuario</td><td>$nombre</td><td>$nivel</td><td><form action='Gestion Usuarios Editar.php' method=post><input type=hidden name=ced value='$cedula'><input type=submit value='Editar' class='submit'></form></td><td><form action='/sistema_facturacion/procesos/eliminar_usuario.php' method=post><input type=hidden name=ced value='$cedula'><input type=hidden name='accion' value='eliminar'><input type=submit value='Eliminar' class='submit'></form></td></tr>";
	}
	echo "</table>";
	$la--;
	$la++;
	    echo "<tr><td colspan=\"15\"><font face=\"verdana\" color=#000000><b>Nº de Registros: " . $la . 
      "</b></font></td></tr>";
?>


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