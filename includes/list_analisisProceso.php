<?php
	include 'inset.php';

	$id2=$_GET['fol'];
			$sql="select distinct ON(id_anal)e.id_anal,e.nombre_anal,d.costo from rel_analisis e join descuentos d on e.id_anal=d.id_analisis where d.id_factura='$id2' and e.folio='$id2';";
			$td=pg_query($conn,$sql);
			if(!$td){
				echo $sql;
			}
			if(pg_num_rows($td)>0){
			echo "<table><th>id</th><th>nombre</th><th>precio</th><th>Eliminar</th>";
			while($an=pg_fetch_array($td)){
				$noman=$an['nombre_anal'];
				$id_an=$an['id_anal'];
				$co =$an['costo'];
				echo "<tr><td>".$id_an."</td>";
				echo "<td>".$noman."</td>";
				echo "<td>$".$co." </td>";
				echo '<td><label onClick="eliminaSolicitud(\''.$id_an.','.$id2.','.$noman.'\')">X</lable></td>';
				echo "</tr>";
				}
				$co="select SUM(costo)as total from descuentos where id_factura='$id2';";
				$cos=pg_query($conn,$co);
				$total=pg_fetch_assoc($cos);
				$pre=$total['total'];
				echo"<tr><td>Total:</td><td></td><td>$".$pre."</td></tr>";
			echo"</table>";
		}
	?>