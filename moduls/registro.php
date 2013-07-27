<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<title>Laboratorio SIZA</title>
<link href="../css/stylo.css" rel="stylesheet"/>
<link href="../css/normalize.css" rel="stylesheet"/>
<script src="../css/prefixfree.min.js"></script>
 <meta name="viewport" content="width=device-width, initial-scale=1.0" />  
  <link rel="Shortcut Icon" type="image/x-icon" href="images/LOGOS/nuevo-8.png" />
  <?php
  include 'includes/fancy.html';
  ?>
</head>
<body>
	<header>
		<hgroup><br></hgroup>
		<h1>Registro de usuarios</h1>
	</header>
<section id="regis">
	<form id="inicio" method="POST" action="registro.php" >
	<div id="for">
	<label>Nombre de usuario:<a>[?]<span>El nombre con le que inicie session</span></a></label>
	<input type="text" placeholder="nombre" name="usuario"><br>
	<label>Contraseña:<a>[?]<span>facil de recordar y mas de 6 caracteres</span></span></a></label>
	<input type="password" name="contrasena"><br>
	<label>Contraseña:<a>[?]<span>Repita la contraseña anterior</span></span></a></label>
	<input type="password">
	</div>
	<div id="for">
	<label>Nombre:<a>[?]<span>Escriba solo su nombre</span></a></label>
	<input type="text" placeholder="El nombre personal" name="nombre"><br>
	<label>Apellidos:<a>[?]<span>Escriba sus apellidos</span></a></label>
	<input type="text" placeholder="Los apellidos" name="apellidos"><br>
	<label>Curp:<a>[?]<span>Escriba sus Curp completa</span></a></label>
	<input type="text" placeholder=" curp"name="curp"><br>
	<label>Direccion:<a>[?]<span>Nombre de calle</span></a></label>
	<input type="text" name="direccion"><br>
	<label>Numero:<a>[?]<span>Numero de la casa</span></a></label>
	<input type="text" name="num"><br>
	<label>No. Tel.:<a>[?]<span>Numero telefonico para localisar</span></a></label>
	<input type="text" name="num_casa"><br>
	<label>Colonia:<a>[?]<span>Nombre de la colonia</span></a></label>
	<input type="text" name="colonia"><br>
	<label>Codigo Postal:<a>[?]<span>Numero del codigo postal</span></a></label>
	<input type="text" name="cp"><br>
	<label>Ciudad:<a>[?]<span>Ciudad donde vive</span></a></label>
	<input type="text" name="ciudad"><br>
	<label >Estado:<a>[?]<span>Estado al que pertenece</span></a></label>
   <input type="text" name="estado"><br>
    <label >Sexo</label>
      <input name="sexo" value="masculino" type="radio">Masculino
      <input name="sexo" value="femenino" type="radio">Femenino     
     </div>   
     <input id="btn" type="submit" value="aceptar" name="aceptar">
	</form>
</section>
</body>
</html>

<?php
if(isset($_POST['aceptar'])){
	include '../includes/inset.php';
	$usuario=$_POST['usuario'];
	$contrasena=$_POST['contrasena'];
	$nombre=$_POST['nombre'];
	$curp=$_POST['curp'];
	$apellido=$_POST['apellidos'];
	$direccion=$_POST['direccion'];
	$num=$_POST['num'];
	$num_tel=$_POST['num_casa'];
	$colonia=$_POST['colonia'];
	$ciudad=$_POST['ciudad'];
	$estado=$_POST['estado'];
	$sexo=$_POST['sexo'];
	$cp=$_POST['cp'];
	$tipo=1;
	$pass=md5($contrasena);
	$id=uniqid();
	 
	$ch="select * from usuariosn where curp='$curp' or nombre='$nombre'";
	$verifica=pg_query($conn, $ch);
	if(pg_num_rows($verifica)==0){
		$insert="insert into usuariosn(idus,nombre,apellido,curp,n_tel,colonia,direccion,n_casa,cp,ciudad,estado,sexo)values('$id','$nombre','$apellido','$curp','$num_tel','$colonia','$direccion','$num','$cp','$ciudad','$estado','$sexo');";
		$inse=pg_query($conn, $insert);
		if($inse){
			
			$log="insert into log(usuario,pass,tipo,idus)values('$usuario','$pass','$tipo','$id');";
			$loged=pg_query($conn, $log);
			}
		}if($inse && $loged){echo '<script language="javascript" type="text/javascript">
				alert("Su Registro Fue Exitoso!!");
				
			</script>';	
		}
	}
	

?>
