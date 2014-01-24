<?php
 $nom=$_GET['nom'];
 $depe=$_GET['dep'];

include 'login.php';
$hi="select * from doctores where nombre='$nom' and dependencia='$depe';"; 
$hist=pg_query($conn, $hi);

if(!$hist) {
echo $hi;	
	}
	if (pg_num_rows($hist) > 0) {
		
		while ($row = pg_fetch_assoc($hist)) {
	$id=$row['id_doc'];
	$nom = $row['nombre'];
	$depe = $row['dependencia'];
	$telef= $row['telefono'];
	$email = $row['email'];
	$fech_reg = $row['fech_reg'];
	$dir =$row['dir_trab'];
	$loc=$row['localidad'];
	$titulo=$row['titulo'];
	$horario= $row['horario'];
	$espe=$row['especialidad'];
	$estadociv=$row['estadocivil'];
$nom=utf8_decode($nom);
$depe=utf8_decode($depe);
$loc=utf8_decode($loc);
$espe=utf8_decode($espe);

?>
Nombre del doctor:<input type="text" value="<? echo $nom;?>" name="nomal" onfocus='this.blur()'> ID:<input type="text" value="<? echo $id;?>" size="2" name="nomal" onfocus='this.blur()'><br>
Especialidad:&nbsp;&nbsp;&nbsp;<input type="text" value="<? echo $espe;?>" name="nomal" onfocus='this.blur()'>
<hr color="blue">
	<br>
	Dependencia:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" value="<? echo $depe;?>" name="nomal" onfocus='this.blur()'><br>
	horario de trabajo:<input type="text" value="<? echo $horario;?>" name="nomal" onfocus='this.blur()'><br>
	Direccion del trabajo:<input type="text" value="<? echo $dir;?>" name="nomal" onfocus='this.blur()'><br>
	Localidad:<input type="text" value="<? echo $loc?>" name="nomal" onfocus='this.blur()'><br>
	Estado civil:<input type="text" value="<? echo $estadociv?>" name="nomal" onfocus='this.blur()'><br>
	<div style="position:absolute;margin-left:383px;margin-top:15px;width:110px; height: 120px; z-index: 1; left: 89px; top: 53px">
	
	<fieldset name="Group1" style="height: 145px; width: 132px">
	<legend>Fotografía</legend>

	</fieldset>
	
			</div><br />
	<hr color="blue">
	Celular:<input type="text" value="<? echo $telf;?>" name="nomal" onfocus='this.blur()'><br>
	<!-- Telefono de Casa:<input type="text" value="<? echo $telcas;?>" name="nomal" onfocus='this.blur()'><br> -->
	Email<input type="text" value="<? echo $email;?>" name="nomal" onfocus='this.blur()'><br>

<?
	}echo '</tbody> 
           </table>';	
	}else {
		echo "no ay datos";
		}
?>
