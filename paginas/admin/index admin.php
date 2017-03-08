<?php
include_once 'config.inc.php';
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
<script type="text/javascript" src="jquery.js"></script>
<script type="text/javascript">
$(function () {
    $('#container').highcharts({
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: 1,//null,
            plotShadow: false
        },
        title: {
            text: 'Productos Mas Vendidos'
        },
        tooltip: {
            pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                    enabled: true,
                    format: '<b>{point.name}</b>: {point.percentage:.1f} %',
                    style: {
                        color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                    }
                }
            }
        },
        series: [{
            type: 'pie',
            name: 'Ventas',
            data: [
            <?php
            $db= new Conect_MySql();
$sql="select * from grafico";
$que= $db->execute($sql);
while ($row = $db->fetch_row($que)){?>
            				
['<?php echo $row['producto']?>', <?php echo $row['cantidad']?>],
                                <?php }?>
            ]
        }]
    });
});


		</script>
		
</head>
<body>
<script src="js/highcharts.js"></script>
<script src="js/modules/exporting.js"></script>

<div id="wrap">

<div id="header">
<h1>SISFACT</h1>
<h2>Sistema de Facturaci&oacute;n</h2>
</div>

<div id="top"> </div>

<div id="content">

<div class="left"> 

<h2><a href="#">Bienvenido(a) - Usuario Administrador: </a><?php  print "<font color='#CEECF5'>".$_SESSION["user"]."</font>";?> </h2>
<div class="articles">
<div id="container" style="min-width: 310px; height: 400px; max-width: 600px; margin: 0 auto"></div>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>Productos mas vendidos</p>
  <p><?php echo "<img src='../../procesos/uploads/esca2.jpg' width='125' height='125' title='Closet'>";?> <?php echo "<img src='../../procesos/uploads/IMG_20150318_115227.jpg' width='125' height='125' title='Comedor Descanso'>";?> <?php echo "<img src='../../procesos/uploads/IMG_20141010_173641.jpg' width='125' height='125' title= 'Cama Girasol'>";?></p>
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
  <li><a href="/sistema_facturacion//conexion/cerrarsesion.php">Cerrar Sesi&oacute;n</a></li>
  <li></li>
  <li></li>

</ul>

<h2>&nbsp;</h2>
</div>

<div style="clear: both;"> </div>

</div>


<div id="bottom"> </div>

<div id="footer"> Diseñado por Erneski Coronado - Ing. de Informática - UNERG 
<a href="https://portal.unerg.edu.ve/"></a>
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

