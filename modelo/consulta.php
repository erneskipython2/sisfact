
<?php 

	require "../conexionr/conexion.php";
	class consulta{
		var $conn;
		var $conexion;
		function consulta(){		
			$this->conexion= new  Conexion();				
			$this->conn=$this->conexion->conectarse();
		}	
		//-----------------------------------------------------------------------------------------------------------------------
		function reportePdfRepresentantesPago($cedula){			
			$html="";		
			$sql="select ve.forma_pago, fp.idforma_pago, fp.forma_pago from venta ve INNER JOIN forma_pago fp ON ve.forma_pago=fp.idforma_pago WHERE idventa='$cedula'";
			$rs=mysqli_query($this->conn,$sql);
			$i=0;

			$html=$html.'<div align="center">			
			<table border="0" bordercolor="#0000CC" bordercolordark="#FF0000">';	
			$html=$html.'<tr bgcolor="#0000FF"><td><font color="#FFFFFF">Forma de Pago</font></td></tr>';
			while ($row = mysqli_fetch_array($rs)){
				if($i%2==0){
					$html=  $html.'<tr bgcolor="#CEECF5">';
				}else{
					$html=$html.'<tr>';
				}
				$html = $html.'<td>';
				$html = $html. $row[2];
				$html = $html.'</td></tr>';		
				$i++;
			}			
			$html=$html.'</table></div>';
			
			
						
     		 return ($html);
		}		
		//-----------------------------------------------------------------------------------------------------------------------
		function reportePdfRepresentantesBasico($cedula){			
			$html="";		
			$sql="select ve.idventa, ve.fecha, ve.cliente, ve.usuario, cl.rif, cl.razon, cl.direccion, us.nombre, cl.telefono from venta ve INNER JOIN clientes cl ON ve.cliente=cl.id_clientes INNER JOIN usuarios us ON ve.usuario=us.id_usuarios WHERE idventa='$cedula'";
			$rs=mysqli_query($this->conn,$sql);
			$i=0;

			$html=$html.'<div align="center">
			<br />
			<h1>FACTURA</h1> 
			<br />
			<h3>Datos Generales</h3> 
			<br />			
			<table border="0" bordercolor="#0000CC" bordercolordark="#FF0000">';	
			$html=$html.'<tr bgcolor="#0000FF"><td><font color="#FFFFFF">Factura Nro</font></td><td><font color="#FFFFFF">Fecha</font></td><td><font color="#FFFFFF">Vendedor</font></td><td><font color="#FFFFFF">R.I.F Cliente</font></td><td><font color="#FFFFFF">Razon</font></td><td><font color="#FFFFFF">Direccion</font></td><td><font color="#FFFFFF">Telefono</font></td></tr>';
			while ($row = mysqli_fetch_array($rs)){
				if($i%2==0){
					$html=  $html.'<tr bgcolor="#CEECF5">';
				}else{
					$html=$html.'<tr>';
				}
				$html = $html.'<td>';
				$html = $html. $row[0];
				$html = $html.'</td><td>';
				$html = $html. $row[1];
				$html = $html.'</td><td>';
				$html = $html. $row[7];
				$html = $html.'</td><td>';
				$html = $html. $row[4];
				$html = $html.'</td><td>';
				$html = $html. $row[5];
				$html = $html.'</td><td>';
				$html = $html. $row[6];
				$html = $html.'</td><td>';
				$html = $html. $row[8];
				$html = $html.'</td></tr>';		
				$i++;
			}			
			$html=$html.'</table></div>';
			
			
						
     		 return ($html);
		}
		//-----------------------------------------------------------------------------------------------------------------------	
		
				//-----------------------------------------------------------------------------------------------------------------------
		function reportePdfRepresentantesAcademico($cedula){			
			$html="";
			$total=0;
			$iva=0;		
			$sql="select vt.id_producto, vt.cantidad, vt.precio, vt.total, pr.nombre from ventas_detalle vt INNER JOIN productos pr ON vt.id_producto=pr.codigo WHERE vt.id_venta='$cedula'";
			$rs=mysqli_query($this->conn,$sql);
			$i=0;

			$html=$html.'<div align="center"> 
			<br />
			<h3>Detalles de la Compra</h3> 
			<br />			
			<table border="0" bordercolor="#0000CC" bordercolordark="#FF0000">';	
			$html=$html.'<tr bgcolor="#0000FF"><td><font color="#FFFFFF">Producto</font></td><td><font color="#FFFFFF">Cantidad</font></td><td><font color="#FFFFFF">Precio</font></td><td><font color="#FFFFFF">SubTotal</font></td></tr>';
			while ($row = mysqli_fetch_array($rs)){
				if($i%2==0){
					$html=  $html.'<tr bgcolor="#CEECF5">';
				}else{
					$html=$html.'<tr>';
				}
				$html = $html.'<td>';
				$html = $html. $row[4];
				$html = $html.'</td><td>';
				$html = $html. $row[1];
				$html = $html.'</td><td>';
				$html = $html. $row[2];
				$html = $html.'</td><td>';
				$html = $html. $row[3];
				$html = $html.'</td></tr>';		
				$total+=(FLOAT)$row[2];
				$total = (FLOAT)$total;
				$i++;
			}	
			$iva=(FLOAT)$total*0.12;	
			$total=(FLOAT)$total+$iva;	
			$html=$html.'</table>
			
			
			<table border="0" bordercolor="#0000CC" bordercolordark="#FF0000">';	
			$html=$html.'<tr bgcolor="#0000FF"><td><font color="#FFFFFF">I.V.A(12%)</font></td><td><font color="#FFFFFF">TOTAL A PAGAR BSF</font></td></tr>';
			$html=  $html.'<tr bgcolor="#CEECF5">';
	
				$html = $html.'<td>';
				$html = $html. $iva;
				$html = $html.'</td><td>';
				$html = $html. $total;
				$html = $html.'</td></tr>';						
			$html=$html.'</table>
			</div>';
									
     		 return ($html);
		}
		//-----------------------------------------------------------------------------------------------------------------------
		function reportePdfClientes(){			
			$html="";		
			$sql="SELECT * FROM clientes ORDER BY razon";
			$rs=mysqli_query($this->conn,$sql);
			$i=0;
			$html=$html.'<div align="center">
			<br />
			<h3>CLIENTES REGISTRADOS</h3> 
			<br />			
			<table border="0" bordercolor="#0000CC" bordercolordark="#FF0000">';	
			$html=$html.'<tr bgcolor="#FF0000"><td><font color="#FFFFFF">Razon</font></td><td><font color="#FFFFFF">R.I.F</font></td><td><font color="#FFFFFF">Direcci&oacute;n</font></td><td><font color="#FFFFFF">Tel&eacute;fono</font></td></tr>';
			while ($row = mysqli_fetch_array($rs)){
				if($i%2==0){
					$html=  $html.'<tr bgcolor="#95B1CE">';
				}else{
					$html=$html.'<tr>';
				}
				$html = $html.'<td>';
				$html = $html. $row["razon"];
				$html = $html.'</td><td>';
				$html = $html. $row["rif"];
				$html = $html.'</td><td>';
				$html = $html. $row["direccion"];
				$html = $html.'</td><td>';
				$html = $html. $row["telefono"];				
				$html = $html.'</td></tr>';	

	
				$i++;
			}			
			$html=$html.'</table></div>';
			
			
			
						
     		 return ($html);
		}
		//-----------------------------------------------------------------------------------------------------------------------	
		
				//-----------------------------------------------------------------------------------------------------------------------
		function reportePdfInventario(){			
			$html="";		
			$sql="SELECT * FROM productos ORDER BY cantidad";
			$rs=mysqli_query($this->conn,$sql);
			$i=0;
			$html=$html.'<div align="center">
			<br />
			<h3>INVENTARIO ORDENADO SEGUN NECESIDAD EN STOCK</h3> 
			<br />			
			<table border="0" bordercolor="#0000CC" bordercolordark="#FF0000">';	
			$html=$html.'<tr bgcolor="#FF0000"><td><font color="#FFFFFF">C&oacute;digo</font></td><td><font color="#FFFFFF">Producto</font></td><td><font color="#FFFFFF">Descripci&oacute;n</font></td><td><font color="#FFFFFF">Precio</font></td><td><font color="#FFFFFF">Cantidad</font></td></tr>';
			while ($row = mysqli_fetch_array($rs)){
				if($i%2==0){
					$html=  $html.'<tr bgcolor="#95B1CE">';
				}else{
					$html=$html.'<tr>';
				}
				$html = $html.'<td>';
				$html = $html. $row["codigo"];
				$html = $html.'</td><td>';
				$html = $html. $row["nombre"];
				$html = $html.'</td><td>';
				$html = $html. $row["descripcion"];
				$html = $html.'</td><td>';
				$html = $html. $row["precio"];				
				$html = $html.'</td><td>';
				$html = $html. $row["cantidad"];				
				$html = $html.'</td></tr>';	

	
				$i++;
			}			
			$html=$html.'</table></div>';
			
			
			
						
     		 return ($html);
		}
		//-----------------------------------------------------------------------------------------------------------------------	
						//-----------------------------------------------------------------------------------------------------------------------
		function reportePdfVentasDia(){		
			date_default_timezone_set('UTC');
			$fecha = date("Y-m-d");
			$html="";		
			$sql="SELECT vd.id_venta, vd.id_producto, vd.cantidad, vd.precio, vd.total from ventas_detalle vd INNER JOIN venta ve ON vd.id_venta=ve.idventa";
			$rs=mysqli_query($this->conn,$sql);
			$i=0;
			$html=$html.'<div align="center">
			<br />
			<h3>VENTAS DEL DIA</h3> 
			<br />			
			<table border="0" bordercolor="#0000CC" bordercolordark="#FF0000">';	
			$html=$html.'<tr bgcolor="#FF0000"><td><font color="#FFFFFF">Factura Nro</font></td><td><font color="#FFFFFF">Producto</font></td><td><font color="#FFFFFF">Cantidad</font></td><td><font color="#FFFFFF">Precio</font></td><td><font color="#FFFFFF">Total</font></td></tr>';
			while ($row = mysqli_fetch_array($rs)){
				if($i%2==0){
					$html=  $html.'<tr bgcolor="#95B1CE">';
				}else{
					$html=$html.'<tr>';
				}
				$html = $html.'<td>';
				$html = $html. $row[0];
				$html = $html.'</td><td>';
				$html = $html. $row[1];
				$html = $html.'</td><td>';
				$html = $html. $row[2];
				$html = $html.'</td><td>';
				$html = $html. $row[3];				
				$html = $html.'</td><td>';
				$html = $html. $row[4];				
				$html = $html.'</td></tr>';
				$i++;
			}			
			$html=$html.'</table></div>';
			
			
			
						
     		 return ($html);
		}
		//-----------------------------------------------------------------------------------------------------------------------
				
		//-----------------------------------------------------------------------------------------------------------------------	
	}

?>

