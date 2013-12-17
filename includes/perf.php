<?php
include 'inset.php';
$a=$_SESSION['id'];
$im="select imagen from usuariosn where idus='$a';";
$ig=pg_query($conn,$im);
$img=pg_fetch_assoc($ig);

?>
<div  class="seccion">
	<h3>Bienvenido</h3>
		<!--<fieldset class="imgperf">-->
	 <img src="<?echo $img['imagen'];?>" />
		<!--</fieldset>-->
	<form action="includes/logout.php" method="post">
		<label>Usuario&nbsp;:&nbsp;&nbsp;<?echo $_SESSION['usuario'];?></label><br/>
		<label>tipo:<? if($_SESSION['tipo']== 1){ echo" Usuario";}else{echo $_SESSION['puesto'];}?></label><br /><br />

		<a id="btn_p" class="various2" data-fancybox-type="iframe" href="moduls/perf.php">Editar perfil</a><br />
		<input id="btn" type="submit" value="Salir">
	</form>
</div>

<div class="box">
  		<h3>Popular Tops</h3>
   <div class="seccion">
      <div class="title">
	   <a href="#">alguna liga de interes </a>  
           <p>dentro de un parrafo</p>
       </div>
            <p>un analisis nuevo </p>
       </div>
  </div>