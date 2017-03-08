<?php
session_start();
session_destroy();
header("Location:http://localhost/sistema_facturacion/paginas/Iniciar_Sesion.php");
    exit;
?>
