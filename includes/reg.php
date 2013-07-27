<?php
/*if (isset($_SERVER['HTTP_X_REQUESTED_WITH'])
	&& $_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest'){*/
$accion = $_GET['r'];

if($accion == 1){

$titulo 	= 	$_POST['titulo'];
$nombre 	= 	$_POST['nombre'];
$especialidad = $_POST['espe'];
$est_civi 	=	$_POST['est_civi'];
$dependencia = 	$_POST['dependencia'];
$h1 		= 	$_POST['h'];
$ampm 	    =	$_POST['ampm'];
$h2 		=	$_POST['h2'];
$ampm2 		=	$_POST['ampm2'];
$tel 		= 	$_POST['telefono'];
$mail 		=	$_POST['email'];
$fecha 		=	$_POST['fech_reg'];
$direccion 	=	$_POST['direccion'];
$estado 		=	$_POST['lugar'];
$sexo 		= 	$_POST['sexo'];
$h_de = $h1.":00 ".$ampm;
$h_a = $h2.":00 ".$ampm2;
$nombre =strtoupper($nombre);

 include_once 'inset.php';

$reg_doc="insert into doctores(titulo,nombre,especialidad,estado_civil,dependencia,h_de,h_a,telefono,correo,direccion,fech_reg,estado,sexo) values('$titulo','$nombre','$especialidad','$est_civi','$dependencia','$h_de','$h_a','$tel','$mail','$direccion','$fecha','$estado','$sexo');";
$registro = pg_query($conn,$reg_doc);
	if(!$registro){
		echo "Error, Datos incopletos.";
		
	}else{
		echo "Gracias por Registrar ".$titulo." ".$nombre;

	}
}
elseif ($accion == 2) {
	
$usuario	=	$_POST['usuario'];
$pass		=	md5($_POST['pass']);		
$nombre 	= 	$_POST['nombre'];
$puesto		= 	$_POST['puesto'];
$turno 		=	$_POST['turno'];
$celular	= 	$_POST['celular'];
$tel_casa 	= 	$_POST['tel_casa'];
$email 	    =	$_POST['email'];
$fe_reg 	=	$_POST['fecha_reg'];
$direccion 	=	$_POST['direccion'];
$estado		= 	$_POST['estado'];
$sexo 		= 	$_POST['sexo'];
$idus		=	uniqid();
$tipo		=	2;
$nombre = strtoupper($nombre);
include_once 'inset.php';
$reg_empl="insert into empleados(nombre,puesto,turno,celular,tel_casa,email,fecha_reg,direccion,estado,sexo,idus)values('$nombre','$puesto','$turno','$celular','$tel_casa','$email','$fe_reg','$direccion','$estado','$sexo','$idus');";
$registro =pg_query($conn,$reg_empl);
if(!$registro){
	echo "Error, Dator incompletos.";
	echo $reg_empl;
}else{
	$emp_log="insert into log(usuario,pass,tipo,idus)values('$usuario','$pass','$tipo','$idus')";
	$reg_log=pg_query($conn,$emp_log);
	if(!$reg_log){
		echo"Error, de Logeo";
		echo $emp_log;
	}else{
		echo "Gracias por Registrar".$puesto." ".$nombre;
		}
	
}


}

?>



<?php/*
}else{
	echo "error";

//error 404
}*/
?>