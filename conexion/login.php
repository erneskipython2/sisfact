<?php
//captura de datos
session_start();
$user=$_REQUEST["username"];
$pass=$_REQUEST["pass"];
//coneccion a la base de datos.
$con=mysql_connect("localhost", "root", "");
$query="SELECT * FROM sistema_facturacion.usuarios
        WHERE usuario='".$user."';";
$x=mysql_query($query);
@$id_us=mysql_result($x, 0, 'id_usuarios');
$_SESSION['usu']=$id_us;//guardo el id del usuario ingresado
@$user1=mysql_result($x, 0, 'usuario');
@$pass1=mysql_result($x, 0, 'clave');
@$rol=mysql_result($x,0,'id_grupo');
mysql_close();
if($user==$user1 && $pass==$pass1 && $user!="" && $rol=="1"){
    session_start();
	
    $_SESSION["ok"]=true;
    $_SESSION["user"]=$user;
	$_SESSION["admin"]=true;
	
	
    header("Location:http://localhost/sistema_facturacion/paginas/admin/index admin.php");
	exit;
}elseif($user==$user1 && $pass==$pass1 && $user!="" && $rol=="2"){
	session_start();
	$_SESSION["ok"]=true;
    $_SESSION["user"]=$user;
	
	
	
	header("Location:http://localhost/sistema_facturacion/paginas/index.php");
	exit;
}else{
	session_destroy();
    header("Location:http://localhost/sistema_facturacion/paginas/Iniciar_Sesion.php");
    exit;
}
?>
