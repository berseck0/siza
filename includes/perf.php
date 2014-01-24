<?php
include 'inset.php';
$a=$_SESSION['id'];
$im="select imagen from usuariosn where idus='$a';";
$ig=pg_query($conn,$im);
$img=pg_fetch_assoc($ig);

?>
<img src="<?echo $img['imagen'];?>" />
	<h3>Bienvenido</h3>
		<!--<fieldset class="imgperf">-->
		<!--</fieldset>-->
	<form class="sec_der"action="includes/logout.php" method="post">
		<label><?echo $_SESSION['usuario'];?></label>
		<label><? if($_SESSION['tipo']== 1){ echo" Usuario";}else{echo $_SESSION['puesto'];}?></label>
		<a id="btn_p" class="various2" data-fancybox-type="iframe" href="moduls/perf.php">Editar perfil</a>
		<input id="btn" type="submit" value="Salir">
	</form>