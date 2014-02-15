
  <article class="main">
<h2>Precios</h2>

<label class="liga" id="RegPrecio" >Registro de precios</label> 
<label  class="liga" id="LisPrecio">Lista de Precios</label>

<div id="LisPrecios">
  <div id="lisbus"><br>
      <label >buscar<span class="icon">z</span>
        <input type="text" class="clr" id="buscarlista" placeholder="Analisis a buscar" autocomplete="off"  >
      </label>
  
  </div>
<div id="lis_pre"></div>
</div>
<div id="RegPrecios">
  <div id="precios">
<h2>Registro de los precios</h2>
	<form id="inicio" name="precios" method="POST">
		    <label>Nombre:</label>              <input type="text" size="25"  name="analisis" /><br>
        <label>Nota del Analisis:</label>   <input type="text" size="25"  name="nota" /><br>
        <label>Precio: $</label>            <input type="number" step="any"size="15"  name="precio" /><br>
        <label>IVA: %</label>               <input type="number" step="any" size="15"  name="iva" /><br>
        <label>Aunmento: %</label>          <input type="number" step="any"step="any"size="15"  name="aumento" /><br>
        <label>Urgente: %</label>           <input type="number" step="any"size="15"  name="urgencia" /><br>
         <input type="checkbox" name="che" value="SIZA">
        <strong>SIZA</strong><input type="checkbox" name="che" value="UPC">
        <strong>UPC</strong><input type="checkbox" name="che" value="ORTHIN">
        <strong>ORTHIN</strong> <input type="checkbox" name="che" value="BIMODI">
        <strong>BIMODI</strong><br>
        <input type="button" class="sas" id="btn" value="Registrar" name="regiostrar"/>
	</form>
  </div>
  
<div id="actualizado">
<h2>analisis Registrados</h2>
<?php
include_once 'login.php';
$lis_P="select * from precios order by id_analis DESC limit 7";
$listado = pg_query($conn, $lis_P);
if(pg_num_rows($listado)>0){
  echo "<div class='lis'><table width='99%'><th>id</th>
  <th>nombre</th><th>precio</th><th>nota</th><th>iva </th><th>lugar</th>";
 while ($p=pg_fetch_assoc($listado)) {
   $nombre = $p['nombre_ana'];
   $id     = $p['id_analis'];
   $precio = $p['precio'];
   $nota    = $p['nota'];
   $lugar  =$p['lugar'];
    $iva =$p['iva'];
echo "<tr><td>".$id."</td>";   
echo "<td>".$nombre."</td>";
echo "<td>$ ".$precio."</td>";
echo "<td>".$nota."</td>";
echo "<td>".$iva." % &nbsp;&nbsp;</td>";
echo "<td>".$lugar."</td>";
echo "</tr>";
 }echo "</table></div>";
}
?>
</div>
</div>
</article>
