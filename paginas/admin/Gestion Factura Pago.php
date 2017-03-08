<?php
session_start();
if(isset($_POST['rif'])){
$rif=$_POST['rif'];
$razon=$_POST['razon'];
$direccion=$_POST['direccion'];
$telefono=$_POST['telefono'];
$idcliente=$_POST['idcliente'];
$buscar = $_POST['buscar'];
$agregar = $_POST['agregar'];

$_SESSION['rifses'] = $rif; //Guardo el rif como clave de session para poder recargar sin perder los datos
$_SESSION['razonses'] = $razon; //Guardo la razón como clave de session para poder recargar sin perder los datos
$_SESSION['direccionses'] = $direccion; //Guardo la dirección como clave de session para poder recargar sin perder los datos
$_SESSION['telefonoses'] = $telefono; //Guardo el telefono como clave de session para poder recargar sin perder los datos
$_SESSION['idcli'] = $idcliente;
}

include("../../conexion/conexion_consulta.php");



if($_SESSION["ok"]==true && $_SESSION["admin"]==true){

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

<?php
	$busqOk = false;
	$agreOk = false;
	
	//acciones si es boton buscar
	if(isset($_POST['buscar'])){
	$buscar = $_POST['buscar'];		
	if($buscar){
		$codigo = $_POST['codigo'];
		foreach($db->query("select codigo, nombre, precio, descripcion from productos where codigo='".$codigo."'")as $row) {
			$nombre = $row['nombre'];
			$codigo= $row['codigo'];
			$precio= $row['precio'];
			$descripcion= $row['descripcion'];
			$busqOk = true;
		}
	}}
	
	
	//acciones si es boton agregar
	if(isset($_POST['agregar'])){
	$agregar = $_POST['agregar'];		
	if($agregar){
		$productoag = $_POST['codigomostrar'];
		$_SESSION['productoag'] = $productoag;
		$agreOk = true;
		
		
		if(isset($_POST['agregar'])){ //Si se envió el primer formulario

$producto = $_SESSION['productoag'];
if(!is_array($_SESSION['pedido'])) //Si no es un array

{
$_SESSION['pedido'] = array();
}

if(array_key_exists("$producto",$_SESSION['pedido'])){

$cantidad = $_SESSION['pedido']["$producto"];
$_SESSION['pedido']["$producto"] = ++$cantidad;
}

else {

$_SESSION['pedido']["$producto"] = 1;
}

}

	} 
	} //Cierra validacion de envio de post agregar
	
if(isset($_POST['quitar'])){ //Si se envió el segundo formulario

unset($_SESSION['pedido'][$_POST['codigomostrar']]); //Eliminar la posicion del arreglo
}
	 
	


?>



<style type="text/css">
<!--
.Subtitulo {
	font-size: 14px;
	color: #0000CC;
	}
.Subtitulotabla {
	font-size: 12px;
	color: #0000CC;	
}
-->
</style>
</head>
<body>

<div id="wrap">

<div id="header">
<h1>SISFACT</h1>
<h2>Sistema de Facturaci&oacute;n - El Taller del Maestro</h2>
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
  <center><form id="nuevafactura" method="post" action="/sistema_facturacion/paginas/admin/Gestion Factura Productos.php"  style="border:double; border-color:#000066">
     <p align="left" class="Subtitulo">Datos del Cliente  </p>
     <p>&nbsp;</p>
    <table width="150" border="0" cellspacing="1">
      <tr>
        <td>C&eacute;dula / R.I.F:</td>
        <td><input name="rif1" type="text" class="lefttable" id="rif" value="<?php echo $_SESSION['rifses']; ?>" maxlength="10" readonly="readonly" autocomplete="off" /></td>
      </tr>
      <tr>
        <td>Raz&oacute;n:</td>
        <td><textarea name="razon1" readonly="readonly" wrap="off" class="lefttable" id="razon" autocomplete="off"><?php echo $_SESSION['razonses']; ?></textarea></td>
      </tr>
      <tr>
        <td>Direcci&oacute;n:</td>
        <td><textarea name="direccion" readonly="readonly" wrap="off" class="lefttable" id="direccion1" autocomplete="off"><?php echo $_SESSION['direccionses']; ?></textarea></td>
      </tr>
            <tr>
        <td>Tel&eacute;fono:</td>
        <td><input name="telefono1" type="text" class="lefttable" id="telefono" value="<?php echo $_SESSION['telefonoses']; ?>" maxlength="30" readonly="readonly" autocomplete="off" /></td>
      </tr> 
      <tr>
      </table>
  
  <p>&nbsp;</p> 
  <HR width=100% align="left" color="#000066" style="border:double; border-color:#000066">
  <p align="left" class="Subtitulo">Datos del Producto  </p> 
  <p>&nbsp;</p> 
	
 
  		<table width="348" border="0" align="center" cellspacing="1">  
        <tr>
        <td width="55">Buscar: </td>
        <td width="203"><input name="codigo" type="text" class="lefttablebutton" id="codigo" value="" maxlength="10" autofocus placeholder="Ingrese el c&oacute;digo..." required/></td><td width="90">
          <div align="right">
            <input name="buscar" type="submit" id="buscar" value="Buscar" class="button button-blue">
            </div></td>            
     	</tr>  
        </table> 
    <p>&nbsp;</p>
    <p>

  </form>
     
      <?php
			if($busqOk == 'true'){
				echo "<form name=\"detalleproducto\" id=\"detalleproducto\" action=\"/sistema_facturacion/paginas/admin/Gestion Factura Productos.php\" method=\"post\"style=\"border:double; border-color:#000066\">";
				echo "<p align=\"left\" class=\"Subtitulo\">Detalle  </p><p>&nbsp;</p>"; 
				echo "<table width=\"150\" border=\"0\" cellspacing=\"1\">";
				echo "<tr>";
				echo "<td>C&oacute;digo:</td>";
				echo "<td> <input type='text' name='codigomostrar' id='codigomostrar' value=\"$codigo\" readonly=\"readonly\" class=\"lefttable\"> </td>";
				echo "</tr>";
				echo "<tr>";
				echo "<td>Producto:</td>";
				echo "<td> <input type='text' name='producto' id='producto' value=\"$nombre\" readonly=\"readonly\" class=\"lefttable\"> </td>";
				echo "</tr>";
				echo "<tr>";
				echo "<td>Descripci&oacute;n:</td>";
				echo "<td> <input type='text' name='descripcion' id='descripcion' value=\"$descripcion\" readonly=\"readonly\" class=\"lefttable\"> </td>";
				echo "</tr>";
				echo "<tr>";
				echo "<td>Precio:</td>";
				echo "<td> <input type='text' name='precio' id='precio' value=\"$precio\" readonly=\"readonly\" class=\"lefttable\"> </td>";
				echo "</tr>";
				echo "</table>";
				echo "<input type='submit' name='agregar' id='agregar' value='Agregar al carrito' class='button button-blue'>";
				echo "</form>";
			}
			
       ?>
  
<form action="/sistema_facturacion/paginas/admin/Gestion Factura Productos.php" method="post" style="border:double; border-color:#000066">
<p>&nbsp;</p>
<p align="left" class="Subtitulo">Carrito de Compras</p>
<p>&nbsp;</p>
<input type="hidden" name="quitar">
<?php
if(!empty($_SESSION['pedido'])){ //Si hay productos en el carrito
echo "<table width=\"150\" border=\"0\" cellspacing=\"1\">";
echo "<tr>";
echo "<td><label class=\"Subtitulotabla\">Producto:</label></td>";
echo "<td><label class=\"Subtitulotabla\">Cantidad:</label></td>";
echo "</tr>";
foreach($_SESSION['pedido'] as $prod => $unidades) {

echo "<tr>";
echo "<td> <input type='text' name='productoagregado' id='productoagregado' value=\"$prod\" readonly=\"readonly\" class=\"lefttable\"> </td>";
echo "<td> <input type='text' name='cantidadagregado' id='cantidadagregado' value=\"$unidades\" readonly=\"readonly\" class=\"lefttablereducido\"> </td>";
echo "<td> <input type='Submit' name='$prod' value='Quitar' class='button button-blue'> </td>";

echo "</tr>";
 }
echo "</table>";
}
?>

</form>

</form>
<form action="/sistema_facturacion/procesos/crea_factura.php" method="post">
<input type='Submit' name='Comprar' value="Confirmar compra" class="button button-blue">
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
  <li><a href="Encargados de Equipo.php">Reportes</a></li>
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

<div id="footer"> Diseñado por Erneski Coronado - Ing. de Informática - UNERG 

</div>

</div>

</body>
</html>