<?php
include 'login.php';
$fol=$_GET['fl'];

$busca="select * from historial where folio='$fol';";
$encon=pg_query($conn, $busca);

while ($rw=pg_fetch_assoc($encon)) {
	$nombre=$rw['nombre_cl'];
	$folio=$rw['folio'];
	$doctor=$rw['doctor'];
	$atendido=$rw['atendio'];
}


?>
<article class="main">
	<h3>LISTA DE ANALISIS SOLICITADOS</h3>
	<div id="procesarlis"><label>Cliente:</label><span><?=$nombre;?></span><label>Folio:</label><span><?=$folio;?></span>
		<label>Doctor:</label><span><?=$doctor;?></span><label>Atendido por:</label><span><?=$atendido;?></span>
		<hr>
		<div >
			<?php
				$an="select * from rel_analisis where folio='$folio';";
				$anal=pg_query($conn, $an);

					echo "<ul>";
				while ($w=pg_fetch_assoc($anal)) {
					$analis=$w['nombre_anal'];
					$id_an=$w['id_anal'];
					echo '<li onClick="procesanalisis(\''.$id_an.'\',\''.$folio.'\')">'.$id_an.'-'.$analis.'</li>';
				}


			?>

		</div>
	</div>

<div id="proceso_de_registro" class="div_proceso"> asas  </div>
</article>
