<!DOCTYPE html>
<?php session_start();?>
<html lang="es">
<head>
<meta charset="utf-8" />
<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
<title>Laboratorio SIZA</title>
<link href="css/stylo.css" rel="stylesheet"/>
<link href="css/normalize.css" rel="stylesheet"/>
 <!--<link rel="stylesheet" href="css/font/pictonic.css">-->
<link rel="stylesheet" type="text/css" href="css/font2/raphaelicons.css">

<meta name="viewport" content="width=device-width, initial-scale=1.0" />  
<link rel="Shortcut Icon" type="image/x-icon" href="images/LOGOS/nuevo-8.png" />
<link rel="stylesheet" href="js/themes/base/jquery.ui.all.css" />
<script src="js/jquery-1.9.1.js"></script>
<script src="js/ui/jquery.ui.core.js"></script>
<script src="js/ui/jquery.ui.autocomplete.js"></script>

<?php
  include 'includes/fancy.html';
  include 'js/scrips.js';
?>
</head>
<body>
	<header>
  <!-- <div id="dates">hora y fecha</div><div id="brd">as</div>-->
  	 <hgroup>
	     <!--<img  id="logo" />-->
       <div id="hgrp_data">
	     <h1>SIZA</h1>
	     <span>Laboratorio SIZA Cd. Valles S.L.P.</span></div><!-- <div id="datetime"><span>Fecha:</span>
      <?php   $da=date("d/M/Y"); echo "<label id='hora'>".$da."</label>";?></div>-->
	       <div id="Loggeo">
            <?php if($_SESSION['logged']==false){?>
                <h3><span class="icon">K</span>Area de Acceso</h3>
                <form  action=" " method="post">
                    <label>Usuario<span class="icon">L</span></label>
                    <input id="user" type="text" name="user" placeholder="nombre de usuario">
                    <label>Contraseña <span class="icon">t</span></label>
                    <input id="pass" name="pass" type="password">
                    <div id="error" class="erro"></div>
                    <input id="btn" class="btn1" type="button" value="Entrar">
                    <a id="btn_p" class="various" data-fancybox-type="iframe" href="moduls/registro.php">Registrate:</a>
              </form>
      <?php }else {
              include 'includes/perf.php';
                  }?>
          </div>
     </hgroup>
  <nav>
	 <?php
	    include 'includes/menus.php';
	 ?>
  </nav>

</header>


<div id="section">
<?if($_SESSION['logged']==false){
  include 'includes/conten1.php';
} else{
  include 'includes/conten2.php';
  }
?>
</div>

<footer>
<div class="footbox">
       <h3>Contacto Rapido <span class="icon">M</span></h3>
          <form action=" " method="POST">
              <label>nombre</label>
              <input type="text" id="nombrec"  name="name" size="10" class="inputfield" title="name" placeholder="su nombre" />
              <label>Email</label>
              <input type="text" id="emailc" placeholder="su correo electronico" name="email" size="10" class="inputfield" title="email" />
              <label>mesaje</label>
              <textarea id="message" rows="5" cols="" ></textarea><br>
              <input type="button"  class="boton" value="enviar" id="btn" />
         </form>
</div>
<div class="footdata">
    <label>Esta pagina funciona bien en Google Chrome y Mozilla Firefox</label><br>
    <label id="browser"><?php include 'includes/browser_clas_inc.php'; ?></label>
</div>
</footer>	
</body>
</html>
