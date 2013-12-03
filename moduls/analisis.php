<?php
$p=$_GET['p'];
$noms2=$_GET['id'];
$sdi=$_GET['ide'];
if($p==2){
?>
  <article class="main">
<div id="analisis">
<h2>Datos del Analisis</h2>
<form name="aki" action="" method="post">
      <fieldset class="valores">
        <label><b>Nombre del Analisis:</b></label>
            <input type='text' size='28' maxlength='50' name='nom_anal' value='<?=$noms2?>'/>
            <label>añadir sub-analisis</label>
                <div id="bs_txt">
                    <input type="text" name="bs_analisis" id="bs_analisis" placeholder="Nombre del analisis" autocomplete="off" onblur="fly(thisValue)">
                    <ul class="bs_lis" id="bs_analis_ul" style="display:none;"></ul>
                    <input type="button" id="btn_lis" name="ag_anlisis" value="añadir">
                </div>
            <input type='hidden' size='5' maxlength='50'  id="an_primario" name='id' value='<?=$sdi?>'/>

        <label><b>Nombre del Valor:</b></label>
           <input type="text" size="28" id="vref" maxlength="50" name="vref" />
             <label><b>tipo:</b></label>
            <select id="seleccion" onchange="selecto()" name="opcion">
              <option>seleccione</option>
              <option value="numerico">numerico</option>
              <option value="texto">texto</option>
            </select>
      </fieldset><br>
<div id="v">
               <fieldset id="valores"><legend> Hombre:</legend>
                   Maximo
                   Minimo
                   <input type="text" size="4" maxlength="25" name="maxh" />
                  <input type="text" size="4" maxlength="25" name="minh"/>
              </fieldset>
              <fieldset id="valores"><legend>Mujer</legend>
                  Maximo
                  Minimo
              <input type="text" size="4" maxlength="25" name="maxm" />
                  <input type="text" size="4" maxlength="25" name="minm" />
              </fieldset>
              <fieldset id="valores"><legend>Niño(a):</legend>
                 Maximo
                 Minimo 
              <input type="text" size="4" maxlength="25" name="maxn" />
              <input type="text" size="4" maxlength="25" name="minn"/>
              </fieldset>
              <fieldset id="valores"><legend>R/N</legend>
                  Maximo 
                  Minimo 
              <input type="text" size="4" maxlength="25" name="maxb" />
              <input type="text" size="4" maxlength="25" name="minb" />
            </fieldset>
            <fieldset id="valores"><legend>Unidades</legend>
                  unidad
      <input type="text" size="10" maxlength="15" name="unidades" /> <br>
              </fieldset>
              <fieldset id="valores"><legend>Edades</legend>
                   maxima
                  minima
                       <input type="text" size="3" maxlength="15" name="edmax" /> 
                       <input type="text" size="3" maxlength="15" name="edmin" /> 
                       <select name="edad">
                          <option value="años">años</option>
                          <option value="mes">mes</option>
                          <option value="dias">dias</option>
                       </select>
             </fieldset>
           </div>
             <br><fieldset  id="valore"><legend>Nota:</legend>
             <textarea name="nota"></textarea></fieldset><br>
                  Metodo: <input type='text' size='30' maxlength='60' name='metodo' />
                  <input type="button" id="RegAnal" value="Enviar" name="enviar"/>

                 </form> 

                 <div><br/>
                  <hr>
        <h3>analis registrado</h3>
        <div id="agregado">
<?php 
include_once 'includes/inset.php';
$an="select * from analisis where id='$sdi'";
$ana = pg_query($conn,$an);
if(pg_num_rows($ana)>0){
  echo "<div class='lis'>";
echo $noms2;
$un=pg_fetch_assoc($ana);
if($un['unidades']==0){
  echo "<table><th>valor de ref.</th><th>Metodo</th><th>Nota</th>";
    while ($l=pg_fetch_assoc($ana)) {
     $Nomb=$l['nombre'];
     $vf=$l['vref'];
     $metodo=$l['metodo'];
     $not=$l['nota'];
     echo '<tr><td>'.$vf.'</td><td>'.$metodo.'</td><td>'.$not.'</td>';
    }echo "</table></div>";
}else{
echo "<table>
<th>valor de ref.</th><th>hombre</th><th>mujer</th><th>niños</th><th>RN</th><th>unidad</th><th>Metodo</th><th>edad</th><th>edades</th>";
  while ($s=pg_fetch_assoc($ana)){
      $nombree=$s['nombre'];
      $vf=$s['vref'];
      $maxh=$s['maxh'];
      $minh=$s['minh'];
      $maxm=$s['maxm'];
      $minm=$s['minm'];
      $maxn=$s['maxn'];
      $minn=$s['minn'];
      $maxrn=$s['maxrn'];
      $minrn=$s['minrn'];
      $unidades=$s['unidades'];
      $metodo=$s['metodo'];
      $edamax=$s['edamx'];
      $edamin=$s['edamin'];
      $edad=$s['edad'];  
echo '<tr><td>'.$vf.'</td><td>'.$maxh.' - '.$minh.'</td><td>'.$maxm.' - '.$minm.'</td><td>'.$maxn.' - '.$minn.'</td><td>'.$maxrn.' -'.$minrn.'</td><td>'.$unidades.'</td><td>'.$metodo.'</td><td>'.$edamax.'-'.$edamin.'</td><td>'.$edad.'</td></tr>';
    }echo "</table></div>";
  }
}
elseif (pg_num_rows($ana)==0) {

  $grp="select g.*,p.nombre_ana from grupos g,precios p where g.id_grup='$sdi' and p.id_analis=g.id_analisis;";
  $pg_grp=pg_query($conn, $grp);
  if(pg_num_rows($pg_grp)>0){
    echo $grp;
      echo "<div class='lis'>";
      echo $noms2;
      echo "<table ><th>sub-analisis</th>";
      while ($sb=pg_fetch_assoc($pg_grp)) {
             $nombre=$sb['nombre_ana'];
              echo '<tr><td>'.$nombre.'</td><td>X</td>';
        }echo "</table></div>";
  }
  else{
  echo "<label>Aun no registra el analisis con sus valores de referencia</label>";
  }
}
?>
        </div>
                 </div>
               </div>
                 </article>
<?php
}else{
?>

  <article class="main">
<div id="analisis">
<label><h2>lista de analisis</h2></label>

<?php 
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
?>
</div>
</article>

<?php }?>
