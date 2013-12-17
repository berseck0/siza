<?php
$opcion=$_POST['op'];
if($opcion==1){

include 'funciones.php';
$titu		= $_POST['titu'];
$nombre 	= formateo($_POST['nom']);
$edad 		= $_POST['edad'];
$tiempo	    = $_POST['tiempo'];
$telefono	= $_POST['telefono'];
$correo	    = $_POST['correo'];
$empresa	= formateo($_POST['empresa']);
$ocupacion	= formateo($_POST['ocupacion']);
$fecha 	    = $_POST['fecha'];
$direccion  = formateo($_POST['direccion']);
$localidad  = formateo($_POST['localidad']);
$sexo 		= $_POST['sexo'];
$colonia    = formateo($_POST['col']);
$fur        = $_POST['fur'];

include 'login.php';
$veri="select * from clientes where nombre ='$nombre';";
$si=pg_query($conn, $veri);
if(pg_num_rows($si)==0){
    $reg="insert into clientes(titulo,nombre,edad,tiempo,telefono,correo,empresa,ocupacion,fecha_reg,direccion,colonia,localidad,sexo,fech_mestro) values('$titu','$nombre','$edad','$tiempo','$telefono','$correo','$empresa','$ocupacion','$fecha','$direccion','$colonia','$localidad','$sexo','$fur');"; 
    $regpro=pg_query($conn, $reg);
    if(!$regpro){
    echo"error".$reg;
        }else{
            $che="select id_cli from clientes where nombre='$nombre';";
            $da=pg_query($conn, $che);
            $di=pg_fetch_assoc($da);
            $ids=$di['id_cli'];
            echo $ids;
          }
        }else{
            echo "El Usuario Ya Se Ecnuentra Registrado.";
         }
}if ($opcion==2) {
    include 'funciones.php';
    $titu       = $_POST['titu'];
    $nombre     = formateo($_POST['nom']);
    $edad       = $_POST['edad'];
    $tiempo     = $_POST['tiempo'];
    $telefono   = $_POST['telefono'];
    $correo     = $_POST['correo'];
    $empresa    = formateo($_POST['empresa']);
    $ocupacion  = formateo($_POST['ocupacion']);
    $fecha      = $_POST['fecha'];
    $direccion  = formateo($_POST['direccion']);
    $localidad  = formateo($_POST['localidad']);
    $sexo       = $_POST['sexo'];
    $colonia    = formateo($_POST['col']);
    $fur        = $_POST['fur'];

include 'login.php';
$veri="select id_cli from clientes where nombre ='$nombre';";
$si=pg_query($conn, $veri);
    $di=pg_fetch_assoc($si);
    $ids=$di['id_cli'];
if(pg_num_rows($si)==1){

    $reg="update clientes set titulo='$titu',nombre='$nombre',edad='$edad',tiempo='$tiempo',telefono='$telefono',correo='$correo',empresa='$empresa',ocupacion='$ocupacion',fecha_reg='$fecha',direccion='$direccion',colonia='$colonia',localidad='$localidad',sexo='$sexo',fech_mestro='$fur' where id_cli='$ids';";
    $regpro=pg_query($conn, $reg);
    if(!$regpro){
    echo"error".$reg;
        }else{
            $che="select id_cli from clientes where nombre='$nombre';";
            $da=pg_query($conn, $che);
            $di=pg_fetch_assoc($da);
            $ids=$di['id_cli'];
            echo $ids;
          }
        }else{
            echo "El Usuario Ya Se Ecnuentra Registrado.";
         }
}


?>