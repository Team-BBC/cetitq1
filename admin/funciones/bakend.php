<?php
/**
 * 
 */
class dbConnect{
	private $mysqli;
	function __construct()
	{
		$this->mysqli = new mysqli('localhost', 'root', '', 'hojastq');
		if (mysqli_connect_errno()) {
			return false;
			exit('Failed to connect to Mysql: ' .mysqli_connect_errno());
		}
	}

	public function displayAll() {
		$query = 'select * from document limit 25';
		$stmt = $this->mysqli->prepare($query);
		$datosTabla = "";
		$results = $stmt->execute();
		$stmt->bind_results($id, $sustancia, $url, $fecha);
		$stmt->store_result();
		//table header
		echo '<table class="table table-dark">
	            <thead class="text-center">
	              <tr class = "font-weight-bold">
	                <td>Nombre</td>
	                <td>Archivo</td>
	                <td>Utima modificacion</td>
	                <td>Editar</td>
	                <td>Eliminar</td>
	                <td>Descargar</td>
	              </tr>
	            </thead>';


	    if($stmt->num_rows >0){
	    	while ($stmt->fetch()) {
	    		$datosTabla = $datosTabla.'<tr>
	    			


	    		</tr>';
	    	}
	    }

		while ($mostrar = mysqli_fetch_array($result)) {
			//table content	
      		$datosTabla = $datosTabla.'<tr>
              <td style="display:none;"> '.$mostrar['id'].' </td>
              <td >'.$mostrar['sustancia'].'</td>
              <td>'.$mostrar['url'].'</td>
              <td>'.$mostrar['fecha'].'</td>
              <td class="text-center">
                <span class="btn btn-warning btn-sm editbtn" >
                  <img src="imagenes/editar.png">
                </span>
              </td>
              <td class="text-center">   
              <span class="btn btn-danger btn-sm deletebtn" >
                <img src="imagenes/borrar.png">
                </span>
              </td>
              <td class="text-center">
                <span class="btn btn-info btn-sm ">                      
                  <a href = '.$mostrar['url'].' target="_blank">
                  <img src="imagenes/descargar.png">
                  </a>
                </span>
                
              </td>
            </tr>';        
            echo $datosTabla;   
		}
		echo "</table>";
		$this->mysqli->close();
	}

	public function display() {
		$query = 'select * from document limit 25';
		$result = $this->mysqli->query($query);

		//table header
		echo '<table class="table table-dark">
	            <thead class="text-center">
	              <tr class = "font-weight-bold">
	                <td>Nombre</td>
	                <td>descargar</td>
	              </tr>
	            </thead>';

		while ($mostrar = mysqli_fetch_array($result)) {
			//table content
			$datosTabla = "";
      		$datosTabla = $datosTabla.'<tr>
              <td style="display:none;"> '.$mostrar['id'].' </td>
              <td >'.$mostrar['sustancia'].'</td>
              <td class="text-center">
                <span class="btn btn-info btn-sm ">                      
                  <a href = '.$mostrar['url'].' target="_blank">
                  	<i data-feather="download"> </i>
                  </a>
                </span>
                
              </td>
            </tr>';        
            echo $datosTabla;   
		}
		echo "</table>";
		$this->mysqli->close();
	}
}

	
?>