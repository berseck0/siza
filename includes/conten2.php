<?php
	$el = $_GET['d'];
	$cb = $_GET['cb'];
	$k= $_GET['k'];
switch($el){
	case 1:
			include  'moduls/analisis.php'; 
			break;
	case 2:
			include 'moduls/doctores.php';
			break;
	case 3:
			include 'moduls/empleados.php';
			break;
	case 4:
			include 'moduls/clientes.php';
			break;
	case 5:
			include 'moduls/precios.php';
			break;
	case 6:
			include 'moduls/promociones.php';
			break;
	case 7:
			include 'moduls/insertresultados.php';
			break;
	default:
	if($el==0&& $cb==''){
	?>

	<article class="main">

<h2>Analisis a Procesar</h2>
<br>

	<?php
include 'inset.php';

$uper="select distinct on(id_factura)id_factura from factura where id_factura not in(select idfactura from historial);";
$super=pg_query($conn,$uper)or die("fallo query".$uper);
	$dl=pg_fetch_assoc($super);
    $ch=$dl['id_factura'];

$el_fac="delete from factura where id_factura='$ch';";
	$dell=pg_query($conn, $el_fac);
$el_des="delete from descuentos where id_factura='$ch';";
	$dll=pg_query($conn, $el_des);
$el_anal="delete from rel_analisis where folio='$ch';";
	$dl=pg_query($conn, $el_anal);

$tabl="SELECT DISTINCT ON (folio) nombre_cli, id_cli, hora, estatus, folio FROM rel_analisis WHERE  folio in(select idfactura from historial) and estatus = 0 ORDER BY folio DESC, nombre_cli DESC, hora DESC, id_cli DESC;";
$tabla=pg_query($conn, $tabl);
if(pg_num_rows($tabla)>0){
echo "<table id='solis' ><thead>
	<tr>
		<th></th>
		<th>ID</th><th>Nombre</th><th>Folio</th><th>Hora</th><th>Finalizado</th>
	</tr>
</thead>
<tbody>";
while ($p=pg_fetch_assoc($tabla)) {
		$idcl=$p['id_cli'];
		$folio=$p['folio'];
		$hora=$p['hora'];
		$nomcl=$p['nombre_cli'];

?>
	<tr>
	    <td class="nom">SOLICITUD</td><td><?echo $idcl;?></td><td><?echo $nomcl;?></td><td class="fol1"><a href="index.php?d=7&fl=<?echo $folio;?>"><span><?echo $folio;?></span></a></td>
	<td ><?echo $hora;?></td><td class="fol1" onclick="altasolis('<?=$folio?>')"><span>ok</span></td>
	</tr>

<?php }?>

</tbody>
</table><?}
}

if($el==0&& $cb!=''){
	$idcl=$_GET['idcl'];
//esto incluye la impresion pdf de cobro
echo '<iframe src="pdf/pdf.php?k='.$k.'&fol='.$cb.'&idcl='.$idcl.'" style="width:950px; height:750px;" frameborder="0"></iframe>';
}	
 echo "</article>";
	

break;
	}


?>

