<?php
include 'login.php';
$fol=$_GET['fl'];

$busca="select h.id_clientes,h.id_doc,h.idfactura,f.atendio,c.nombre from historial h,factura f,clientes c where h.idfactura='$fol' and f.id_factura='$fol' and f.id_cli=c.id_cli limit 1;";
$encon=pg_query($conn, $busca);
while ($rw=pg_fetch_assoc($encon)) {
	$nombre=$rw['nombre'];
	$cliente=$rw['id_clientes'];
	$folio=$rw['idfactura'];
	$doctor=$rw['id_doc'];
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
					$q="select g.*,p.nombre_ana from grupos g, precios p where g.id_grup='$id_an' and g.id_analisis=p.id_analis";
					$q1=pg_query($conn, $q) or die("fallo busqueda de grupos");
					if(pg_num_rows($q1)>0){
						echo $analis;
						while ($w=pg_fetch_assoc($q1)) {
							$idAnalis=$w['id_analisis'];
   							$idNombre=$w['nombre_ana'];
						echo '<li onClick="procesanalisis(\''.$idAnalis.'\',\''.$folio.'\')"><label class="subanal">'.$idAnalis.'-'.$idNombre.'</label></li>';
							}
					}else{
						echo '<li onClick="procesanalisis(\''.$id_an.'\',\''.$folio.'\')">'.$id_an.'-'.$analis.'</li>';
					}
				}


			?>

		</div>
	</div>

<div id="proceso_de_registro" class="div_proceso"> </div>
<a href="index.php?d=0&cb=<?echo $fol;?>&k=2"><input type="button" name="impreso" value="imprimir"></a>
</article>
