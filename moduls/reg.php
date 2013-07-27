<?php
if (isset($_SERVER['HTTP_X_REQUESTED_WITH'])
	&& $_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest'){
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
$h_de = $h1.$ampm;
$h_a = $h2.$ampm2;
$nombre = strtoupper($nombre);
$especialidad = strtoupper($especialidad);
$titulo = strtoupper($titulo);



 include_once 'inset.php';

$reg_doc=	"insert into doctores(titulo,nombre,especialidad,estado_civil,dependencia,h_de,h_a,telefono,correo,direccion,fech_reg,estado,sexo) values('$titulo','$nombre','$especialidad','$est_civi','$dependencia','$h_de','$h_a','$tel','$mail','$direccion','$fecha','$estado','$sexo');";
$registro = pg_connect($conn , $reg_doc);
	if(!$registro){
		echo $reg_doc;
	}



}
elseif ($accion==2) {
	echo "error de get";
}

?>



<?php
}else{
	echo "error";

//error 404
}
?>