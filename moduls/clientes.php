<?php
$P=$_GET['p'];
//$idc=$_GET['i'];

if($P==2){
 echo '<article class="main">';
	include 'solicitud.php';
  echo '</article>';
  
	}elseif($P==3){
    echo '<article class="main">';
    include 'HistoryClien.php';
    echo "</article>";
  }else{
?>
  <article class="main">
<div id="cliente">
<h2>Registro de Clientes</h2>	
<form class="busquedaCliente">

	<label>buscar</label><span class="icon">z</span><br>

<div class="bus_clie" ><label>nombre del cliente:</label>
      <input type="text" class="bus_clie_ip" id="buscar" name="buscar"  autocomplete="off"  onblur="fill()" >
      <input type="button" id="busscar" value="procesar" onclick="sas();">
       <div class="listado" id="listado" style="display: none;">
    </div>
  <a onclick="historial();"><span>Historial</span></a>
</div>
</form>
<form id="inicio" action="" method="POST">
  <div id="for">
<hr>
	<label>titulo</label>
	<select id="titulo" name="titu">
                      <option value="Sr.">Sr.</option>
                      <option value="Sra.">Sra.</option>
                      <option value="Srita.">Srita.</option>
                      <option value="joven">joven</option>
                      <option value="niño">niño</option>
                      <option value="niña">niña</option>
                      <option value="niña">RN</option>
                  </select><hr>
<label>Nombre:</label>
<input name="nom" id="nombre" type="text" required ><hr>
<label>Edad:</label>
<input name="edad" id="edad" type="text" required  step="0"mini="0">
<select name="tiempo" id="tiempo" >
                  <option value="años">años</option>
                  <option value="meses">meses</option>
                  <option value="semanas">semanas</option>
                  <option value="semanas">Días</option>
</select>
                 <hr>
<label>Telefono:</label>
<input name="telefono" id="telefono"  type="text" step="0" mini="0"><hr>
<label>Correo Electronico:</label>
<input name="correo" id="correo" type="email" required  placeholder="usuario@dominio.com"><hr>
<label>Empresa:</label>
<input name="empresa" id="empresa" type="text" ><hr>
<label>Ocupacion:</label>
<input name="ocupacion" id="ocupacion" type="text"><hr>
<label>Fecha De Registro: D/M/Y</label>
<input name="fecha" type="text" id="fechareg" required  value="<?=$fecha=date("d-m-Y"); ?>">  <hr>
<div class="fur">
<label  >Fecha De Regla: D/M/Y</label>
<input name="fur" type="text" id="fur" required  value="<?=$fecha=date("d-m-Y"); ?>"> <hr></div>
<label>Direcci&oacute;n</label>
<input name="direcion" id="direccion" type="text" required ><hr>
<label>Colonia</label>
<input name="colonia" id="colonia" type="text" required ><hr>
<label>Localidad/Ciudad:</label>
<input name="localidad" id="localidad" type="text" required ><hr>
<label>Sexo:</label>
  <select name="sexo" id="sexo">
                      <option value="Masculino">Masculino</option>
                      <option value="Femenino">Femenino</option>
                  </select>
<hr>
<input type="button" id="btn" class="reg" value="Registrar" name="registrar">
<input type="button" id="btn" class="update" value="actualizar" name="actualizar">
</div>
</form>
</div>
</article>
<?}?>
