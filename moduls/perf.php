<!DOCTYPE html>
<? session_start();?>
<html>
<head>
<meta charset="utf-8" />
<title>Laboratorio SIZA</title>
<link href="../css/stylo.css" rel="stylesheet"/>
<link href="../css/normalize.css" rel="stylesheet"/>
<script src="../css/prefixfree.min.js"></script>
 <meta name="viewport" content="width=device-width, initial-scale=1.0" />  
  <link rel="Shortcut Icon" type="image/x-icon" href="images/LOGOS/nuevo-8.png" />
</head>
<?php
include '../includes/inset.php';

if($_SESSION['tipo'] == 1){
$datos= "select * from usuariosn where idus='".$_SESSION['id']."';";
$d2=pg_query($conn, $datos);
while($cam=pg_fetch_assoc($d2)){
	$nombre=$cam['nombre'];
	$apellido=$cam['apellido'];
	$numtel=$cam['n_tel'];
	$colonia=$cam['colonia'];
	$curp=$cam['curp'];
	$direccion=$cam['direccion'];
	$numcasa=$cam['n_casa'];
	$ciudad=$cam['ciudad'];
	$estado=$cam['estado'];
	$sexo=$cam['sexo'];
	$imagen=$cam['imagen'];
	$cp=$cam['cp'];
	}
	$status="";
if ($_POST["action"] == "upload") {
	// obtenemos los datos del archivo
	$tamano = $_FILES["archivo"]['size'];
	$tipo = $_FILES["archivo"]['type'];
	$archivo = $_FILES["archivo"]['name'];
	$id = $_SESSION['id'];
if ($archivo != ""){
	$ds="../logs/".$id;
	$f=date(".m-d-y_H-i");
	@mkdir($ds, 0777);
	$destino = "../logs/".$id."/".$archivo."";
	$des2="logs/".$id."/".$id.$f."";
	$ren ="../logs/".$id."/".$id.$f."";
	$temp_file = $_FILES['archivo']['tmp_name'];
		if(move_uploaded_file($temp_file,$destino)) {
				$status = "<h3>Archivo Cargado</h3>";
			rename($destino,$ren);
			$foto ="update usuariosn set imagen='$des2' where idus='$id'";
			$img=pg_query($conn, $foto);
				if(!$img){
						$status= "error no se actualiso<br>";//.$foto;
							}
				} else {
					 $status = "<h3>Error al subir el archivo</h3>";//.$foto;
					}
						} else {
							 $status = "<h3>Error. seleccione un archivo</h3>";
								}
}
	$codi=$_SESSION['id'];
	$imgo="select imagen from usuariosn where idus='$codi';";
	$img=pg_query($conn, $imgo);
	$im3=pg_fetch_assoc($img);
	$r=$im3['imagen'];

?>
<body>
	<header>
		<hgroup><br></hgroup>
		<h1 class="perf">Perfil de <? echo $_SESSION['usuario'];?></h1>
	</header>
<section id="regis">
			<form id="img2" name="imagen" action="perf.php" enctype="multipart/form-data" method="POST"><br>
				<ins>Galeria</ins><br/><br>
				<!--<div class="imgperf">-->
				   <img  src="<?echo"../".$r;?> "/>
				<!--</div>-->
		     			<input name="archivo" type="file" class="casilla"  size="10" />
		      			<input id="btn" name="enviar" type="submit" class="boton"  value="cargar" />
			  			<input name="action" type="hidden" value="upload"  />
					<?echo $status;?>
			</form>
			<form id="inicio" method="POST" action="perf.php" >
				<label>Nombre:</label>
				<input type="text" value="<?echo $nombre;?>" name="nombre">
				<label>Apellidos:</label>
				<input type="text" value="<?echo $apellido;?>" name="apellidos"><br>
				<label>Curp:</label>
				<input type="text" value="<? echo $curp;?>"name="curp"><br>
				<label>Direccion:</label>
				<input type="text" value="<?echo $direccion;?>"  name="direccion"><br>
				<label>Numero:</label>
				<input type="text" value="<?echo $numcasa;?>"  name="num"><br>
				<label>No. Tel.:</label>
				<input type="text" value="<?echo $numtel;?>"  name="num_casa"><br>
				<label>Colonia:</label>
				<input type="text" value="<?echo $colonia;?>"  name="colonia"><br>
				<label>Codigo Postal:</label>
				<input type="text" value="<?echo $cp;?>"  name="cp"><br>
				<label>Ciudad:</label>
				<input type="text" value="<?echo $ciudad;?>"  name="ciudad"><br>
				<label >Estado:</label>
				<input type="text" value="<?echo $estado;?>" name="estado"><br>
			    <label >Sexo</label>
			    	<input name="sexo" value="<?echo $sexo;?>" type="text"> 
			    	<input name="id" value="<?echo $_SESSION['id'];?>" type="hidden">    
			     <br>
			     <input id="btn" type="submit" value="aceptar" name="aceptar">
			</form>
</section>

</body>
</html>

<?php
if(isset($_POST['aceptar'])){
	include '../includes/inset.php';
	include 'funciones.php';
	$nombre 	=formateo($_POST['nombre']);
	$curp 		=formateo($_POST['curp']);
	$apellido 	=formateo($_POST['apellidos']);
	$direccion 	=formateo($_POST['direccion']);
	$num 		=$_POST['num'];
	$num_tel 	=$_POST['num_casa'];
	$colonia 	=formateo($_POST['colonia']);
	$ciudad 	=formateo($_POST['ciudad']);
	$estado 	=formateo($_POST['estado']);
	$sexo 		=formatup($_POST['sexo']);
	$cp 		=$_POST['cp'];
	$id 		=$_POST['id'];

		$insert="update usuariosn set nombre='$nombre',apellido='$apellido',curp='$curp',n_tel='$num_tel',colonia='$colonia',direccion='$direccion',n_casa='$num',cp='$cp',ciudad='$ciudad',estado='$estado',sexo='$sexo' where idus='$id';";
		$inse=pg_query($conn, $insert);
		if(!$inse)
			echo "<header><h3>Error. no se pudieron actualizar tus datos.</h3></header>";
			else
			  echo "<header><h3>Datos actualizados.</h3></header>";
		}if($inse && $loged){echo '<script language="javascript" type="text/javascript">
				alert("Su Registro Fue Exitoso!!");
			</script>';
		}

?>
<?php
}

//perfil de usuario comun  fin del if
elseif ($_SESSION['tipo'] == 2) {

$datos= "select * from empleados where idus='".$_SESSION['id']."';";
$d2=pg_query($conn, $datos);
while($cam=pg_fetch_assoc($d2)){
	}
	$nombre 	=$cam['nombre'];
	$puesto 	=$cam['puesto'];
	$email 		=$cam['email'];
	$direccion 	=$cam['direccion'];
	$numcasa 	=$cam['tel_casa'];
	$cel 		=$cam['celular'];
	$estado 	=$cam['estado'];
	$sexo 		=$cam['sexo'];
	$imagen 	=$cam['imagen'];
	$turno 		=$cam['turno'];
	$status="";
if ($_POST["action"] == "upload") {
	// obtenemos los datos del archivo 
	$tamano = $_FILES["archivo"]['size'];
	$tipo = $_FILES["archivo"]['type'];
	$archivo = $_FILES["archivo"]['name'];
	$id = $_SESSION['id'];
if ($archivo != ""){
	$ds="../logs/".$id;
	$f=date(".m-d-y_H-i");
	@mkdir($ds, 0777);
	$destino = "../logs/".$id."/".$archivo."";
	$des2="logs/".$id."/".$id.$f."";
	$ren ="../logs/".$id."/".$id.$f."";
	$temp_file = $_FILES['archivo']['tmp_name'];
		if(move_uploaded_file($temp_file,$destino)) {
				$status = "<h3>Archivo Cargado</h3>";
			rename($destino,$ren);
			$foto ="update empleados set imagen='$des2' where idus='$id'";
			$img=pg_query($conn, $foto);
				if(!$img){
						$status= "error no se actualiso<br>";//.$foto;
							}
				} else {
					 $status = "<h3>Error al subir el archivo</h3>";//.$foto;
					}
						} else {
							 $status = "<h3>Error. seleccione un archivo</h3>";
								}
}
	$codi=$_SESSION['id'];
	$imgo="select imagen from empleados where idus='$codi';";
	$img=pg_query($conn, $imgo);
	$im3=pg_fetch_assoc($img);
	$r=$im3['imagen'];



?>
<body>
	<header>
		<hgroup><br></hgroup>
		<h1>Perfil de <? echo $_SESSION['usuario'];?></h1>
	</header>
<section id="regis">
	<form id="img2" name="imagen" action="perf.php" enctype="multipart/form-data" method="POST"><br />
		<!--<div class="imgperf">-->
		        <img  src="<?echo"../".$r;?> "width="190" height="160"/>
		<!--</div>-->
      <input name="archivo" type="file" class="casilla"  size="10" />
      <input id="btn" name="enviar" type="submit" class="boton"  value="cargar" />
	  <input name="action" type="hidden" value="upload"  />
			<?echo $status;?>
	</form>
	<form id="inicio" method="POST" action="perf.php" ><br /><br />
	<label>Nombre:</label>
	<input type="text" value="<?echo $nombre;?>" name="nombre"><br>
	<label>Puesto:</label>
	<input type="text" value="<?echo $puesto;?>" name="puesto"><br>
	<label>Email:</label>
	<input type="text" value="<? echo $email;?>"name="email"><br>
	<label>Direccion:</label>
	<input type="text" value="<?echo $direccion;?>"  name="direccion"><br>
	<label>Numero:</label>
	<input type="text" value="<?echo $numcasa;?>"  name="num_casa"><br>
	<label>No. Tel.:</label>
	<input type="text" value="<?echo $cel;?>"  name="celular"><br>
	<label>Ciudad:</label>
	<input type="text" value="<?echo $estado;?>"  name="ciudad"><br>
	<label >Sexo</label>
      <input name="sexo" value="<?echo $sexo;?>" type="text"> 
      <input name="id" value="<?echo $_SESSION['id'];?>" type="hidden">
     <br>   
     <input id="btn" type="submit" value="aceptar" name="aceptar">
	</form>
</section>

</body>
</html>

<?php
if(isset($_POST['aceptar'])){
	include '../includes/inset.php';
	include'funciones.php';
	$nombre 	=formateo($_POST['nombre']);
	$puesto 	=formateo($_POST['puesto']);
	$email 		=$_POST['email'];
	$direccion 	=formateo($_POST['direccion']);
	$num 		=$_POST['num_casa'];
	$celular 	=$_POST['celular'];
	$ciudad 	=formateo($_POST['ciudad']);
	$sexo 		=$_POST['sexo'];
	$id 		=$_POST['id'];

		$insert="update empleados set nombre='$nombre',puesto='$puesto',email='$email',direccion='$direccion',tel_casa='$num',estado='$ciudad',celular='$celular',sexo='$sexo' where idus='$id';";
		$inse=pg_query($conn, $insert);
		if(!$inse)
			echo "<header><h3>Error. no se pudieron actualizar tus datos.</h3></header>";
			else 
			  echo "<header><h3>Datos actualizados.</h3></header>";
		}if($inse && $loged){echo '<script language="javascript" type="text/javascript">
				alert("Su Registro Fue Exitoso!!");
			</script>';	
		}
}
?>