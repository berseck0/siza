<?php

$accion = $_POST['op'];
include '../moduls/funciones.php';
if($accion == 1){

$nombre 	= 	formateo($_POST['nom']);
$costo 		= 	$_POST['co'];

include_once 'inset.php';
	$rev 	=	"select nombre from paquetes where nombre='$nombre';";
	$revic 	= 	pg_query($conn, $rev);
	
	if(pg_num_rows($revic)>0){
		echo "El paquete ya esta registrado";
	}else{
		$reg_paq="insert into paquetes(nombre,precio) values('$nombre','$costo');";
		$registro = pg_query($conn, $reg_paq);
			if(!$registro){
				echo "Error, Datos incopletos.";
			}
			else{		
				echo "Gracias por Registrar el paquete ".$nombre;
			}
	}
}
?>