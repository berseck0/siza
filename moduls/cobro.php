<?php
	include 'login.php';
		$folio=$_GET["fl"];
		$tot="select * from descuentos where id_factura='$folio' and cortesia=0";
		$total=pg_query($conn,$tot)or die("fallo query");

		while ($p=pg_fetch_assoc($total)){
			$ps=$p['costo'];
			$des=$p['descuento'];

			if($des!=0){ $valor=$ps-$t=$ps*$des/100; }else{
			 $o=$o+$ps;
			}
			if($des!=0){ $s=$s+$valor;}
		} 
		echo $tota=$s+$o;


?>