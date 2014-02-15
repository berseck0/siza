<?php
$idc = $_GET['i'];
$es = $_GET['e'];
define(id, uniqid());
$id=id;
$date= date("d-m-Y");
include 'login.php';
if($idc!=''){
		$dat="select * from clientes where id_cli='$idc';";}
elseif ($es!='') {
		$dat="select * from clientes where nombre='$es';";
}else{
	echo "no hay datos";
}
$datos=pg_query($conn, $dat);
if(!$datos){
echo $dat;

}
while ($r=pg_fetch_assoc($datos)) {
	$idcl=$r['id_cli'];
	$nombre =$r['nombre'];
	$fur=$r['fech_mestro'];
}

?>
<div class="datos_clie">
	<label>SOLICITUD DE ANALISIS</label>
	<ul id="infocliente">
		
		<li>
			<label>ID Cliente:</label>
			<label class="dato" id="id_clie"><?echo $idcl;?></label>
		</li>
		<li>
			<label>Cliente:</label>
			<label class="dato" id="nom_clie" ><?echo $nombre;?></label> 
		</li>
		<li>
			<label>ID Solicitud:</label>
			<label class="dato" id="id_solis"><?echo $id;?></label>	
		</li>
		<li>
			<label>Fecha:</label>
			<label class="dato" id="fecha"><? echo $date;?></label>
		</li>
			<input type="hidden" value="<?echo $fur;?>" name="fur" id="fur">
	</ul>
						
			<div  class="doctor_shar">
				<label>Doctor(a):</label>
				<input type="text" id="doctor_shar" placeholder="Nombre del doctor(a)" autocomplete="off" onblur="flip(thisValue)" >
				<ul class="lista2" id="doc" style="display:none;"></ul> </input>
			</div>
</div>


<div class="analisis_sol">
	<label><p>analisis</label><span class="icon">Á</span><span class="icon">E</span></p><br>
	<label class="textcaja">buscar<span class="icon">z</span><input type="text" class="clr" id="buscar" placeholder="Analisis a buscar" autocomplete="off"  ></label>
	<div id="solisitudListado"></div>
</div>


<div class="analisis_reg">
	<label><p>Analisis Registrados<span class="icon">F</span><span class="icon">?</span></p></label>
	<div class='lis2'>
	</div>
</div>








<div class="operaciones">
<div class="cobro">
	<label><p>cobro<span class="icon">#</span></p></label>
<form>
<label>Total:</label><input type="text" id="total_s"><br>
<label>Cobro:</label><input type="text" id="cobro_s"><br>
<input type="button" value="cobrar" id="cobrototal">
<input type="button" value="Canselar" id="cancelsolis">
</form>
</div>





<div class="desypro">
	<label><p>descuentos y promocion<span class="icon">#</span></p></label>
	<!-- inicio div de descuetos  -->
<div id="dsd">

</div>
<!-- inicio div de cortesias  -->

</div>
<!-- fin  div de desypro  -->


</div>
