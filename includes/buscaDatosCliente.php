<?
$user='postgres';
  try{
    $id = $_POST["id"];
   
	   $conn = new PDO('pgsql:host=localhost;dbname=sizas', $user,$pass);
	   $sql = "select * from clientes where id_cli=$id;";

foreach ($conn->query($sql) as $val) {
  $titulo= $val['titulo'];
  $nombre 	= $val['nombre'];
  $edad = $val['edad'];
  $edad=utf8_decode($edad);
  $tiempo 	= $val['tiempo'];
  $telefono = $val['telefono'];
  $correo 	= $val['correo'];
  $empresa = $val['empresa'];
  $ocupacion 	= $val['ocupacion'];
  $fecha_reg = $val['fecha_reg'];
  $direccion 	= $val['direccion'];
  $colonia = $val['colonia'];
  $ciudad 	= $val['localidad'];
  $sexo = $val['sexo'];
  $fur 	= $val['fech_mestro'];

echo "$titulo,
$nombre,
$edad,
$tiempo,
$telefono,
$correo,
$empresa,
$ocupacion,
$fecha_reg,
$direccion,
$colonia,
$ciudad,
$sexo,
$fur,";
}

}

catch(PDOException $e){
  echo $e->getMessage();
}
?>