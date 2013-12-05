
	<article class="main">
<h2>Doctores</h2>	
<label class="liga" id="registro" >Registrar un Doctor</label> 
<label  class="liga" id="lista2">Lista de Doctores</label>
	
	<div id="for2">
<form method="POST" action="" class="doc" id="inicio"><br>
	<div id="for">
	<label>Titulo</label>
	<select name="titulo">
		<option>Dr.</option>
		<option>Dra.</option>
		<option>Drs.</option>
		<option>Dras.</option>
		<option>Lic. Nut.</option>
		<option>Mvz</option>
	</select><hr>
<label>Nombre:</label>
<input type="text" name="nombre"><hr>
<label>Especialidad:</label>
<input type="text" name="espe"><hr>
<label>Estado Civil:</label>
<input type="text" name="est_civi"><hr>
<label>Dependencia:</label>
<input type="text" name="dependencia"><hr>
<label>Horario:</label>
De:
<select name="h">
<option>Hora</option>
<option value="1">1 </option>
<option value="2">2 </option>
<option value="3">3 </option>
<option value="4">4 </option>
<option value="5">5 </option>
<option value="6">6 </option>
<option value="7">7 </option>
<option value="8">8 </option>
<option value="9">9 </option>
<option value="10">10 </option>
<option value="11">11 </option>
<option value="12">12 </option>
</select>
<select  name="ampm">
<option value="am">am</option>
<option value="pm">pm </option>
</select>
 A <select name="h2">
<option>Hora</option>
<option value="1">1 </option>
<option value="2">2 </option>
<option value="3">3 </option>
<option value="4">4 </option>
<option value="5">5 </option>
<option value="6">6 </option>
<option value="7">7 </option>
<option value="8">8 </option>
<option value="9">9 </option>
<option value="10">10 </option>
<option value="11">11 </option>
<option value="12">12 </option>
</select>
<select onchange="showUser(this.value)" name="ampm2">
<option id="ampm2" value="pm">pm</option>
<option value="am">am </option>
</select><hr>
<label>Telefono:</label>
<input type="number" name="telefono"><hr>
<label>Correo electronico:</label>
<input type="email" name="email" placeholder="usuario@dominio.com"><hr>
<label>Fecha de Registro:</label>
<input type="date" name="fech_reg" value="<?=$fecha=date("d-m-Y"); ?>"><hr>
<label>Direccion:</label>
<input type="text" name="direccion"><hr>
<label>Localidad/Ciudad:</label>
<input type="text" name="lugar"><hr>
<label for="sexo">Sexo</label>
<input type="radio" value="masculino" name="sexo">
<label class="la">Masculino</label>
<input type="radio" value="femenino" name="sexo">
<label class="la">Femenino</label>
<hr>
<input id="btn" type="submit" name="enviar" value="REGISTRAR">
</div><br>
</form>
</div>

<div id="res">
</div>
</article>

	<article class="main">
<div id="lista">
<div id="fordd">
<table id="solis" width="99%">
	<thead>
<th>id</th><th>nombre</th><th>dependencia</th><th>horario</th><th>eliminar</th><th>ver</th>
	</thead>
	<tr><td>id</td>
		<td>nombre</td>
		<td>dependencia</td>
		<td>horario</td>
		<td>eliminar</td>
		<td>ver</td>
	</tr>
	<tr>
		<?php
	include_once 'includes/inset.php';
	$lista="select * from doctores";
	$listado=pg_query($conn,$lista);
	if(!$listado){
		echo"salio mal";
	}
	while($ro=pg_fetch_assoc($listado)){
		$id=$ro['id_doc'];
		$nombre=$ro['nombre'];
		$puesto=$ro['dependencia'];
		$h_in=$ro['h_de'];
		$h_fin=$ro['h_a'];
		$idem=$ro['idemp'];
		$horario=$h_in."~".$h_fin;
?> <tr>
	<td><?=$id?></td>
	<td><?=$nombre?></td>
	<td><?=$puesto?></td>
	<td><?=$horario?></td>
	<td onClick="eliminadoc(<?=$id?>)"><span class="icon">Â</span></td>
	<td><span class="icon">z</span></td>
</tr>
	<?php
		}
?>
	</tr>
</table>
</div>
</div>
</article>
