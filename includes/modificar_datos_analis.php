<?php
include_once 'inset.php';

$op		=	$_POST["op"];
$id_ana	=	$_POST["idan"];
$nom_p 	=	$_POST["pak"];
$pre 	= 	$_POST["co"];



if ($op == 1) {
	$sel = "select p.id_analis,p.nombre_ana,p.precio,g.id_grup from precios as p,grupos as g where g.id_grup=$id_ana and g.id_analisis=p.id_analis;";
	$selec = pg_query($conn, $sel);

	if(pg_num_rows($selec)==0){
		echo "Error no se encontro paquete";
		
	}else {
		echo "<h3>datos del contenido del paquete</h3>";
		echo "<div id='cabecera'><h4>".$nom_p."</h4>$<input type='text' value='$pre' size='8' id='paq_pre_mod'><label id='btn_p'>eliminar</label></div>";
		echo "<ul id='list_paq'>";
		while($l = pg_fetch_assoc($selec)) {
			
			$precio  = $l['precio'];
			$id_anal = $l['id_analis'];
			$nom_ana = $l['nombre_ana'];
			$id_paque = $l['id_grup'];
		
			echo "<li class='cost'><label>ID </label><input type='text' size='5'  value='$id_anal'></li>";
			echo "<li class='nam_co'><label>nombre del analisis </label><input type='text' value='$nom_ana'></li>";
			echo "<li class='nam_co'><label>costo por analisis $ </label><input type='text'  size='5'value='$precio'></li><label id='btn_p'>eliminar</label><br>";
		}echo "</ul>";
	}
}
?>
