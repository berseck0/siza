<article class="main">
<div id="analisis">

<div id="altestudio">ALTA ESTUDIOS</div>
<div id="modestudio">MODIFICAR ESTUDIOS</div>
<div id="altpaquete">ALTA DE PAQUETES</div>
<div id="modpaquete">MODIFICAR PAQUETES</div>
<label><h2> </h2></label>
<?php
/*
////////////////////////////////////////////
///// generaba la lista de analisis que faltavan por dar de alta 
////////////////////////////////////////////////
include_once 'includes/inset.php';

$bus_anal="select id_analis,nombre_ana from precios where nombre_ana not in(select nombre from analisis) and lugar='SIZA' and id_analis not in(select id_grup from grupos) order by id_analis ASC";
$sh = pg_query($conn, $bus_anal);
if(pg_num_rows($sh)>0){
  echo "<ul>";
  while($bs = pg_fetch_assoc($sh)){
      $id_s=$bs['id_analis'];
      $nom_s=$bs['nombre_ana'];
      echo "<a href='index.php?d=1&p=2&id=$nom_s&ide=$id_s'><li>$id_s.-$nom_s</li></a>";
      }
      echo "</ul>";
}else{
  echo"<h4>No tiene analisis Registrados en listado</h4>";
}
*/
?>
</div>
</article>
<?php
$p=$_GET['p'];
$sdi=$_GET['ide'];
if($p==2){
  if ($sdi==1) {
    include 'altaestudio.php';
  }else if($sdi==2){
    include 'altapaquete.php';
  }elseif ($sdi==3) {
    include 'modifpaquete.php';
  }elseif ($sdi==4) {
    include 'modifiestudio.php';
  }


}
?>