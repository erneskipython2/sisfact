
<?php 

	require "conexion_reporte.php";
	class consulta{
		var $conn;
		var $conexion;
		function consulta(){		
			$this->conexion= new  Conexion();				
			$this->conn=$this->conexion->conectarse();
		}	
		//-----------------------------------------------------------------------------------------------------------------------
		
		//-----------------------------------------------------------------------------------------------------------------------
		function reportePdfFacturaBasico($cedula){			
			$html="";		
			$sql="select * from venta WHERE idventa='$cedula'";
			$rs=mysqli_query($this->conn,$sql);
			$i=0;

			$html=$html.'<div align="center">
			<br />
			<h1>Factura Legal - El Taller del Maestro</h1> 
			<br />
			<h3>Datos Generales</h3> 
			<br />			
			<table border="0" bordercolor="#0000CC" bordercolordark="#FF0000">';	
			$html=$html.'<tr bgcolor="#FF0000"><td><font color="#FFFFFF">Nº de Factura</font></td><td><font color="#FFFFFF">Fecha</font></td><td><font color="#FFFFFF">Cliente</font></td><td><font color="#FFFFFF">Usuario</font></td></tr>';
			while ($row = mysqli_fetch_array($rs)){
				if($i%2==0){
					$html=  $html.'<tr bgcolor="#95B1CE">';
				}else{
					$html=$html.'<tr>';
				}
				$html = $html.'<td>';
				$html = $html. $row["idventa"];
				$html = $html.'</td><td>';
				$html = $html. $row["fecha"];
				$html = $html.'</td><td>';
				$html = $html. $row["cliente"];
				$html = $html.'</td><td>';
				$html = $html. $row["usuario"];
				$html = $html.'</td>></tr>';		
				$i++;
			}			
			$html=$html.'</table></div>';
			
			
						
     		 return ($html);
		}
		//-----------------------------------------------------------------------------------------------------------------------	
		
				//-----------------------------------------------------------------------------------------------------------------------
		function reportePdfRepresentantesAcademico($cedula){			
			$html="";		
			$sql="select nivel, profesion, cursos from representantes WHERE cedula='$cedula'";
			$rs=mysqli_query($this->conn,$sql);
			$i=0;
			$html=$html.'<div align="center">
			<br />
			<h3>Datos Acad&eacute;micos</h3> 
			<br />			
			<table border="0" bordercolor="#0000CC" bordercolordark="#FF0000">';	
			$html=$html.'<tr bgcolor="#FF0000"><td><font color="#FFFFFF">Grado de Ins.</font></td><td><font color="#FFFFFF">Profesi&oacute;n</font></td><td><font color="#FFFFFF">Cursos</font></td></tr>';
			while ($row = mysqli_fetch_array($rs)){
				if($i%2==0){
					$html=  $html.'<tr bgcolor="#95B1CE">';
				}else{
					$html=$html.'<tr>';
				}
				$html = $html.'<td>';
				$html = $html. $row["nivel"];
				$html = $html.'</td><td>';
				$html = $html. $row["profesion"];
				$html = $html.'</td><td>';
				$html = $html. $row["cursos"];				
				$html = $html.'</td></tr>';	

	
				$i++;
			}			
			$html=$html.'</table></div>';
			
			
						
     		 return ($html);
		}
		//-----------------------------------------------------------------------------------------------------------------------
		function reportePdfRepresentantesLaboral($cedula){			
			$html="";		
			$sql="select trabaja, trabajo, oficio, direccion from representantes WHERE cedula='$cedula'";
			$rs=mysqli_query($this->conn,$sql);
			$i=0;
			$html=$html.'<div align="center">
			<br />
			<h3>Datos Laborales</h3> 
			<br />			
			<table border="0" bordercolor="#0000CC" bordercolordark="#FF0000">';	
			$html=$html.'<tr bgcolor="#FF0000"><td><font color="#FFFFFF">Trabaja?</font></td><td><font color="#FFFFFF">Trabajo</font></td><td><font color="#FFFFFF">Direcci&oacute;n</font></td><td><font color="#FFFFFF">Oficio</font></td></tr>';
			while ($row = mysqli_fetch_array($rs)){
				if($i%2==0){
					$html=  $html.'<tr bgcolor="#95B1CE">';
				}else{
					$html=$html.'<tr>';
				}
				$html = $html.'<td>';
				$html = $html. $row["trabaja"];
				$html = $html.'</td><td>';
				$html = $html. $row["trabajo"];
				$html = $html.'</td><td>';
				$html = $html. $row["direccion"];
				$html = $html.'</td><td>';
				$html = $html. $row["oficio"];				
				$html = $html.'</td></tr>';	

	
				$i++;
			}			
			$html=$html.'</table></div>';
			
			
						
     		 return ($html);
		}
		//-----------------------------------------------------------------------------------------------------------------------	
				function reportePdfRepresentantesMedico($cedula){			
			$html="";		
			$sql="select seguro, problemas, colaboracion from representantes WHERE cedula='$cedula'";
			$rs=mysqli_query($this->conn,$sql);
			$i=0;
			$html=$html.'<div align="center">
			<br />
			<h3>Datos M&eacute;dicos y Otros</h3> 
			<br />			
			<table border="0" bordercolor="#0000CC" bordercolordark="#FF0000">';	
			$html=$html.'<tr bgcolor="#FF0000"><td><font color="#FFFFFF">Seguro M&eacute;dico</font></td><td><font color="#FFFFFF">Problemas de Salud</font></td><td><font color="#FFFFFF">Colaboraci&oacute;n</font></td></tr>';
			while ($row = mysqli_fetch_array($rs)){
				if($i%2==0){
					$html=  $html.'<tr bgcolor="#95B1CE">';
				}else{
					$html=$html.'<tr>';
				}
				$html = $html.'<td>';
				$html = $html. $row["seguro"];
				$html = $html.'</td><td>';
				$html = $html. $row["problemas"];
				$html = $html.'</td><td>';
				$html = $html. $row["colaboracion"];
				$html = $html.'</td></tr>';	

				$i++;
			}			
			$html=$html.'</table></div>';
			
			
						
     		 return ($html);
		}
		//-----------------------------------------------------------------------------------------------------------------------	
		
						function reportePdfRepresentantesAlumnos($cedula){			
			$html="";		
			$sql="select cedula, apellidos, nombres, sexo, fechaNacimiento from alumnos WHERE representante='$cedula'";
			$rs=mysqli_query($this->conn,$sql);
			$i=0;
			$html=$html.'<div align="center">
			<br />
			<h3>Alumnos Inscritos o Representados</h3> 
			<br />			
			<table border="0" bordercolor="#0000CC" bordercolordark="#FF0000">';	
			$html=$html.'<tr bgcolor="#FF0000"><td><font color="#FFFFFF">C&eacute;dula</font></td><td><font color="#FFFFFF">Apellidos</font></td><td><font color="#FFFFFF">Nombres</font></td><td><font color="#FFFFFF">Sexo</font></td><td><font color="#FFFFFF">F. de Nacimiento</font></td></tr>';
			while ($row = mysqli_fetch_array($rs)){
				if($i%2==0){
					$html=  $html.'<tr bgcolor="#95B1CE">';
				}else{
					$html=$html.'<tr>';
				}
				$html = $html.'<td>';
				$html = $html. $row["cedula"];
				$html = $html.'</td><td>';
				$html = $html. $row["apellidos"];
				$html = $html.'</td><td>';
				$html = $html. $row["nombres"];
				$html = $html.'</td><td>';
				$html = $html. $row["sexo"];
				$html = $html.'</td><td>';
				$html = $html. $row["fechaNacimiento"];
				$html = $html.'</td></tr>';	

				$i++;
			}			
			$html=$html.'</table></div>';
			
			
						
     		 return ($html);
		}
		//-----------------------------------------------------------------------------------------------------------------------	
	}

?>

