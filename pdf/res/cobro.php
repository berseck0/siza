<style type="text/css">
<!--
table { vertical-align: top; }
tr    { vertical-align: top; }
td    { vertical-align: top; }
}
-->
</style>
<page backcolor="#FEFEFE" backimg="./res/bas_page.png" backimgx="center" backimgy="bottom" backimgw="100%" backtop="0" backbottom="30mm" footer="date;heure;page" style="font-size: 12pt;color:blue;">
    <bookmark title="Lettre" level="0" ></bookmark>
    
                <img style="width: 100%; position:relative;left:0px;top:0;" height="100" width="760"  src="./res/LOGO.jpg" alt="Logo">
<i>
   <br clear="all" />
<table  border="0" style="position:relative;left:10px;top:-33;width: 100%;font-family:Arial, Helvetica, sans-serif;font-size: 8pt;color:blue;"  >
<tr>
<td>LUIS SIFUENTES MARTINEZ</td><td WIDTH=70></td>
<td>Negrete No.610 Tel. 38 2-10-76 &nbsp;Fax. 38 1-69-39</td>
</tr>
<tr >
<td>CED. PROF.16027</td><td>&nbsp;&nbsp;&nbsp;</td>
<td>Horario: 7:00 am a 9:00 pm de lunes a sabado</td>
</tr><tr>
<td>REG. S.S.A. 3421</td>
<td></td>
<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Domingo de 8:00 a 2:00 pm</td>
</tr><tr><td></td>
	<td></td>
	<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
CP.79000 Cd. Valles, S.L.P.
</td>
</tr>
</table>        

    </i> <hr style="color:blue;"><br clear="all" />
   
<?php
$idcl=$_GET['idcl'];
$fol=$_GET['fol'];
include 'login.php';
$hi="select historial.*,c.direccion,c.telefono,c.nombre,c.titulo,c.edad,c.empresa,c.direccion,f.anticipo,f.total,f.id_doc,f.atendio from clientes c, historial, factura f where (historial.idfactura='$fol') and (c.id_cli='$idcl') and(f.id_factura='$fol');";
$hist=pg_query($conn, $hi);

if(!$hist) {
echo $hi;	
	}
	if (pg_num_rows($hist) > 0) {
		while ($ro = pg_fetch_assoc($hist)) {
	$nomb=$ro['nombre'];
	$doctor=$ro['id_doc'];
	$fecha=$ro['fecha'];
	$titulo=$ro['titulo'];
	$total=$ro['total'];
	$subtotal=$ro['total'];
	$procede=$ro['empresa'];
	//$folio=$ro['folio'];
	$fur=$ro['fur'];
	$edad=$ro['edad'];
	$pag=$ro['anticipo'];
	$dire=$ro['direccion'];
	$tel=$ro['telefono'];
	$aten=$ro['atendio'];
	$pag=Round($pag,2);
	$subtotal=Round($subtotal,2);
}
}else {
echo $hi;	
	}?>

   <table border="0" style="position:relative;left:0px;width: 100%;top:-25;font-family: Arial, Helvetica, sans-serif;font-size: 8pt;" >
<tr><td></td> <td><strong>NOTA DE VENTA </strong></td><td></td><td></td></tr>
<tr>
<td><strong>NOMBRE DEL PACIENTE:</strong><?php echo "$titulo"." "."$nomb"; ?></td><td></td><td><strong>EDAD:</strong>&nbsp;&nbsp;<?echo $edad;?>&nbsp;</td><td> <strong>FECHA Y HORA:</strong>&nbsp;<?php echo $fecha; echo"||"; echo date("G:H");?></td>
</tr>
<tr><td><strong>DOCTOR:</strong>&nbsp;&nbsp;<?php echo $doctor;?></td><td></td><td></td><td><strong>TEL.:</strong>&nbsp;&nbsp;<?php echo $tel;?></td>
</tr>

<tr>
<td><strong>DOMICILIO:</strong>&nbsp;&nbsp;<?php echo $dire;?></td><td></td><td></td><td><?php if($titulo=="Sra."||$titulo=="Srita."){ echo '<strong>FUR:</strong>&nbsp;&nbsp;'.$fur.'';  }?></td>
</tr>

<tr><td><strong>PROCEDENCIA:</strong>&nbsp;&nbsp;<?php echo $procede;?></td><td></td><td><strong>FOLIO:</strong><?php echo $fol;?></td><td><strong>ATENDIO:</strong>&nbsp;<?php echo $aten;?></td></tr> 
</table>
<!--<div style="position:relative;left:535px;top:-16;font-family: Arial, Helvetica, sans-serif;font-size: 8pt;"></div>-->

    <br>
    <table border="1" style="position:relative;left:0px;top:-10;width: 100%; text-align: left;font-size: 8pt;" >
       <td>
           DESCRIPCION DEL ESTUDIO&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                     &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;PRECIO(S)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
           &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
           TOTAL&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
       </td>
        
    </table> <br> 
    <?php
$idcl=$_GET['idcl'];
$fol=$_GET['fol'];
include 'login.php';
$hi="select n.nombre_anal,d.costo from rel_analisis n join descuentos d on n.id_anal=d.id_analisis where n.folio='$fol' and d.id_factura='$fol';";
$hist= pg_query($conn, $hi);

if(!$hist) {
echo $hi;	
	}
	if (pg_num_rows($hist) > 0) {
		echo '<table border="0" style="position:relative;left:10px;top: 5;width: 100%; text-align: left;font-size: 8pt;">';
		while ($ro = pg_fetch_assoc($hist)) {
	$analis=$ro['nombre_anal'];
	$pre=$ro['costo'];
	$pre=Round($pre,2);
	$subtotal=Round($subtotal,2);
	$total=Round($total,2);
	$top=$subtotal-$total;
	$top=Round($top,2);
	$res=$total-$pag;
	$res=Round($res,2);
	
	echo"<tr><td WIDTH=370>".$analis."</td>";
	echo"<td WIDTH=70>$&nbsp;&nbsp;".$pre."</td></tr>";
	
	}
	echo "</table>";
	}
	?>
	<?php 
	    function negative($res){
        if(is_int(strpos($res, "-"))) {
            return true;
        } else {
            return false;
        }
    }

?>
	<table border="0"style="position:absolute;left: 510px;top: 250;width: 100%; text-align: left;font-size: 8pt;">
	<?php
	echo "<tr><td></td><td>&nbsp;</td><td></td></tr>";//".$subtotal=Round($subtostal,2)."
	echo "<tr><td><br></td><td><br></td><td><br></td></tr>
	<tr><td><br></td><td><br></td><td><br></td></tr>";
	if($top=='0'){
		}else{
	 echo "<tr><td>DESCUENTO:</td>"; 
	 echo "<td>$&nbsp;</td><td>".$top=Round($top,2)."</td></tr>";
 }
	  echo "<tr><td>TOTAL:</td><td>$&nbsp;</td><td>".$total=Round($total,2)."</td></tr>";
	   echo "<tr><td>ANTICIPO:</td><td>$&nbsp;</td><td>".$pag=Round($pag,2)."</td></tr>";
	   if($res<=-1) {
 echo "<tr><td>CAMBIO:</td><td>$&nbsp;</td><td>".$cam=Round($cam=($res *-1),2)."</td></tr>";
	   	}else {
	   echo "<tr><td>RESTAN:</td><td>$&nbsp;</td><td>".$res=Round($res,2)."</td></tr>";
	}
	 ?><br clear="all" />
	</table>
    
    <div style="position:relative;left:0px;top: 100;width: 100%; text-align: left;font-size: 8pt;">
    <table  >
    <tr>
    <td width="250">*PAGO HECHO EN UNA SOLA EXHIBICION*</td>
    <td width="450">NOTA: SU FACTURA SE EXTIENDE EN EL MES EN QUE SE REALIZA SU ESTUDIO.</td>
    
    </tr>
   
    </table>
    </div>

</page>
