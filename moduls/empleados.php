<?php
if($_SESSIO['tipo']==1){
	require 'includes/inset.php';
	$lista="select * from empleados";
	$listado=pg_query();
	while($ro=pg_fetch_assoc($listado)){
		$nombre=$ro['nombre'];
		$puesto=$ro['puesto'];
		$fecha=$ro['fecha'];
		$idem=$ro['idemp'];
		
		
		}
	}

?>
<section>
	<article class="main">
<h2>Empleados</h2>	
<label class="liga" id="registro" >Registrar un Empleado</label> 
<label  class="liga" id="lista2">Lista de Empleados</label>
	
<div id="for2">
<form id="inicio" class="emp" method="POST" action="">
<br>
<div id="for">
<label>Usuario:</label><input type="text" name="usuario"><br>
<label>Contraseña:</label><input type="password" name="pass">
</div>
<div id="for">
<label>Nombre:</label>
<input type="text" class="" name="nombre"><hr>
<label>Puesto:</label>
<select name="puesto">
<option>Quimico</option>
<option>Secretaria</option>
</select><hr>
<label>Turno:</label>
<select name="turno">
<option>Matutino</option>
<option>Vespertino</option>
</select><hr>
<label>Celular:</label>
<input type="number" name="celular"><hr>
<label>Tel. Casa:</label>
<input type="number" name="tel_casa"><hr>
<label>Correo electronico:</label>
<input type="email" name="email" placeholder="usuario@dominio.com"><hr>
<label>Fecha de Registro:</label>
<input type="date" name="fecha_reg" value="<?=$date=date("d-m-Y");?>"><hr>
<label>Direccion:</label>
<input type="text" name="direccion"><hr>
<label>Localidad:</label>
<input type="text" name="estado"><hr>
<label>Sexo</label>
<input type="radio" value="masculino" name="sexo">
<label class="la">Masculino</label>
<input type="radio" value="femenino" name="sexo">
<label class="la">Femenino</label>

<br>
<input id="btn" type="submit" name="enviar" value="REGISTRAR">
</div><br>
</form>
</div>
<div id="res">
</div>
</article>
</section>

<section>
<article class="main">

<div id="lista">
	<div id="for">

<table id="solis" width="99%">
	<thead>
<th>id</th><th>nombre</th><th>puesto</th><th>eliminar</th><th>ver</th>
	</thead>
		<?php
	include_once 'includes/inset.php';
	$lista="select * from empleados";
	$listado=pg_query($conn,$lista);
	if(!$listado){
		echo"salio mal";
	}
	while($ro=pg_fetch_assoc($listado)){
		$id=$ro['idus'];
		$nombre=$ro['nombre'];
		$puesto=$ro['puesto'];
		$turno=$ro['turno'];
		$cel=$ro['celular'];
		
?> 
	<tr>
		<td><?=$nombre?></td>
		<td><?=$puesto?></td>
		<td><?=$turno?></td>
		<td>X</td>
		<td>L</td>
	</tr>
	<?php	
		}
	
?>
</table>
</div>
</div>
</article>
</section>