<?php
$op=$_POST['op'];
$doc=$_POST['dc'];
$emp=$_POST['emp'];
$fol=$_POST['fl'];
include "login.php";
switch ($op) {
	case 1:
			$q="delete from doctores where id_doc='$doc'";
			$qd=pg_query($conn, $q)or die("fallo sintaxis 1");
				if(!$qd){
						echo"fallo";}
				else{
						echo"exito";}
		break;
	case 2:
			$q="delete from empleados where idus='$emp'";
			$qd=pg_query($conn, $q)or die("fallo sintaxis 2");
				if(!$qd){
						echo"fallo";}
				else{
						echo"exito";}
		break;
	case 3:
			$q="update rel_analisis set estatus=1 where folio='$fol';";
			$qd=pg_query($conn, $q)or die("fallo sintaxis 3");
				if(!$qd){
						echo $q;}
				else{
						echo"exito";}
		break;
}

?>