<?if($_SESSION['logged']=="true"){?>

<ul>
		<a href="index.php"><li><span class="icon">S</span>Inicio</li></a>
		<a onclick="locate(1)" href="index.php?d=1"><li><span class="icon">E</span>Analisis</li></a>
		<a onclick="locate(2);return false;" href="index.php?d=2"><li><span class="icon">L</span>Doctores</li></a>
		<a onclick="locate(3);return false;" href="index.php?d=3"><li><span class="icon">L</span>Empleados</li></a>
		<a onclick="locate(4);return false;" href="index.php?d=4"><li><span class="icon">]</span>Clientes</li></a>
		<a onclick="locate(5);return false;" href="index.php?d=5"><li><span class="icon">#</span>Precios</li></a>
		<!--<a onclick="locate(6);return false;" href="index.php?d=6"><li><span class="icon">Æ</span>Promociones</li></a>
		<a onclick="locate(6);return false;" href="index.php?d=6"><li><span class="icon">Æ</span>Almacen</li></a>-->
	</ul>
<?} else {?>

<ul>
		<a href="index.php"><li><span class="icon">S</span>inicio</li></a>
		<a href="about.php"><li><span class="icon">"</span>nosotros</li></a>
		<a href="dir.php"><li><span class="icon">7</span>dirección</li></a>
		<a href="galeria.php"><li><span class="icon">N</span>galeria</li></a>
		<a href="mision.php"><li><span class="icon">i</span>Mision</li></a>
		<a href="vision.php"><li><span class="icon">i</span>Vision</li></a>

	</ul>
	
<?}?>
