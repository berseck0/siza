<?php
 $nom=$_GET['nom'];
 $pu=$_GET['pue'];

include 'login.php';
$hi="select * from empleados where nombre='$nom' and puesto='$pu';";
$hist=pg_query($conn, $hi);

if(!$hist) {
echo $hi;	
	}
	if (pg_num_rows($hist) > 0) {
		
		while ($row = pg_fetch_assoc($hist)) {
		$nom = $row['nombre'];
	$pue = $row['puesto'];
	$fech = $row['fecha_reg'];
	$dir = $row['direccion'];
	$telf = $row['telefono'];
	$turn =$row['turno'];
	$loc=$row['localidad'];
	$telcas=$row['telcasa'];
	$email= $row['email'];

$nom=utf8_decode($nom);
$dir=utf8_decode($dir);
$loc=utf8_decode($loc);
$email=utf8_decode($email);
?>
Nombre del Empleado:<input type="text" value="<? echo $nom;?>" name="nomal" onfocus='this.blur()'>
<hr color="blue">
	<br>
	Puesto:<input type="text" value="<? echo $pue;?>" name="nomal" onfocus='this.blur()'><br>
	Turno de trabajo:<input type="text" value="<? echo $turn;?>" name="nomal" onfocus='this.blur()'><br>
	Fecha de inicio:<input type="text" value="<? echo $fech;?>" name="nomal" onfocus='this.blur()'><br>
   Salario:<input type="text" value="<??>" name="nomal" onfocus='this.blur()'><br>
	Direccion:<input type="text" value="<? echo $dir;?>" name="nomal" onfocus='this.blur()'><br>
	Localidad:<input type="text" value="<? echo $loc?>" name="nomal" onfocus='this.blur()'><br>
	<div style="position:absolute;margin-left:283px;margin-top:-10px;width: 110px; height: 120px; z-index: 1; left: 89px; top: 53px">
	
	<fieldset name="Group1" style="height: 145px; width: 132px">
	<legend>Fotografía</legend>

	</fieldset>
	
			</div><br />
	<hr color="blue">
	Celular:<input type="text" value="<? echo $telf;?>" name="nomal" onfocus='this.blur()'><br>
	Telefono de Casa:<input type="text" value="<? echo $telcas;?>" name="nomal" onfocus='this.blur()'><br>
	Email<input type="text" value="<? echo $email;?>" name="nomal" onfocus='this.blur()'><br>

<?
	}echo '</tbody> 
           </table>';	
	}else {
		echo "no ay datos";
		}
?>
