<?php 
	define('v5', realpath(dirname(__FILE__)));
//	date_default_timezone_set('America/Monterrey');
	require_once('funciones/bakend.php');
	
	$myObj = new dbConnect();

	$nombre = $_POST["nombre"];
	$archivoRecibido = $_FILES["fichero"]["tmp_name"];
	$destino="../ficherosSubidos/$nombre.pdf";
//	$fecha = date('j-n-Y'). " " .date('g:i:s A');
	
	//Preparamos  la consulta
	

	$result= mysqli_query($myObj->mysqli,"SELECT COUNT(sustancia) AS num FROM  document WHERE sustancia = '".$_POST["nombre"]."'");	
	

	//se comprueba si hubo resultados en la BDD
	//$row = $stm ->fetch(PDO::FETCH_ASSOC);
	if(!mysqli_num_rows($result) > 0){
        die('Este registro ya existe');
    }else{
		//Sube archivos a la base de datos
		$con ="INSERT INTO document(sustancia,url,fecha) 
		VALUES ('".$nombre."' , '".$nombre.".pdf' , NOW() )";


    	if(mysqli_query($myObj->mysqli,$con)){
			echo "Registro realizado con exito";
			if ($_FILES["fichero"]["type"]!="application/pdf") {
				echo ("El archivo no esta en el formato adecuado <br>");
			}
	
			if ($_FILES["fichero"]["error"]!=0) {
				echo ("Hay un error en el archivo <br>");
			}
			/*$uploads_dir = '../ficherosSubidos';
			if(){
				$name
			}*/
			$name = basename($_FILES["fichero"]["name"]);
			if (move_uploaded_file($archivoRecibido, "$destino")) {
				
				echo '<script>console.log("hi, file uploaded")</script>';
				header("Location:../admin.php");
			}
		}else{
			echo "Error al subir el archivo: " . $con . "" . mysqli_error($myObj->mysqli);
		}

		//sube el documento pdf a la carpeta de los archivos
		
			
		}
    
 ?>