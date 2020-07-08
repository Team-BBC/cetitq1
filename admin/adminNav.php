<?php
	session_start();

	if (!isset($_SESSION['username'])) {
		echo '<script> 
			alert("No has iniciado session");</script>';
		header("index.php");
	}
?>
<nav class="navbar navbar-expand-lg navbar-dark sticky-top" style="background-color: #03204C;">
    <a class="navbar-brand" href="index.php">
        <!--<img src="v5/hojasTq/Ceti.png.webp" width="30" height="30" class="d-inline-block align-top" alt="">-->
        Inicio
        </a>
</nav>