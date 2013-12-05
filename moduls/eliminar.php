<?php
$op=$_POST['op'];
$doc=$_POST['dc'];
$emp=$_POST['emp'];

include "login.php";
if($op=1){
	$q="delete from doctores where id_doc='$doc'";
	$qd=pg_query($conn, $q)or die("fallo sintaxis 1");
	if(!$qd){
		echo"fallo";
	}else{
		echo"exito";
	}
}
if($op=2){
	$q="delete from empleados where idus='$emp'";
	$qd=pg_query($conn, $q)or die("fallo sintaxis 1");
	if(!$qd){
		echo"fallo";
	}else{
		echo"exito";
	}
}
?>