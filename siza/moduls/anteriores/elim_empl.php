<?php
$nom=$_GET['nom'];
$pue=$_GET['pue'];

include 'login.php';
$el="delete from empleados where nombre='$nom';";
$elim = pg_query($conn, $el);


if(!$elim) {
	
	echo '<script language="javascript" type="text/javascript">
				alert("El empleado  no existe'.$nom.'");
				
			</script>';
	}else {
		echo '<script language="javascript" type="text/javascript">
				alert("empelado eliminado '.$nom.'");
				
			</script>';
			//	header("Location: ../modules/lis_empl.php");
		
		
		}
	



?>