<?php
/**
 * https://www.siteground.com/tutorials/php-mysql/display-table-data/
 */
class dbConnect{
	public $mysqli;
	function __construct()
	{
		$this->mysqli = new mysqli('localhost', 'root', '', 'hojastq');
		if (mysqli_connect_errno()) {
			return false;
			exit('Failed to connect to Mysql: ' .mysqli_connect_errno());
		}
	}
	public function aPlaceTableHeader(){
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
	}
	public function uPlaceTableHeader(){
		//table header
		echo '<table class="table table-dark">
	            <thead class="text-center">
	              <tr class = "font-weight-bold">
	                <td>Nombre</td>
	                <td>descargar</td>
	              </tr>
	            </thead>';
	}

	public function displayAll() {
		$this->aPlaceTableHeader();
		$query = 'select * from document order by fecha desc limit 2';
		if($result = $this->mysqli->query($query)){
			while($row = $result->fetch_assoc()){
				$datosTabla ="";
			//table content	
      		$datosTabla = $datosTabla.'<tr>
              <td style="display:none;"> '.$row['id'].' </td>
              <td >'.$row['sustancia'].'</td>
              <td>'.$row['url'].'</td>
              <td>'.$row['fecha'].'</td>
              <td class="text-center">
                <span class="btn btn-warning btn-sm editbtn" data-toggle="modal" data-target="#modaldelete" >
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
                  <a href = "ficherosSubidos/'.$row['url'].'" target="_blank">
                  <img src="imagenes/descargar.png">
                  </a>
                </span>
                
              </td>
            </tr>';        
			echo $datosTabla;   
			}
			$result->free();
		}
		//table header
		echo "</table>";
		$this->mysqli->close();
	}
	//this search works like a charm



	public function searchAdmin($sustancia){
		$query="SELECT * from document where sustancia like '%$sustancia%' limit 14";
		$stmt = $this->mysqli->prepare($query);	
		$stmt->execute();
		$result = $stmt->get_result();

		//adding the table header
		$this->aPlaceTableHeader();
		$datosTabla="";
		//repeat untill no more rows
		while($row = $result->fetch_assoc()){
			//echo $row['id']." ".$row['sustancia'];
			$datosTabla=$datosTabla.'
			<tr>
				<td style="display:none;"> '.$row['id'].' </td>
				<td >'.$row['sustancia'].'</td>
				<td>'.$row['url'].'</td>
				<td>'.$row['fecha'].'</td>
				<td class="text-center">
				<span class="btn btn-warning btn-sm editbtn" data-toggle="modal" data-target="#modaldelete" >
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
					<a href ="ficherosSubidos/'.$row['url'].'" target="_blank">
					<img src="imagenes/descargar.png">
					</a>
				</span>
				
				</td>
		  	</tr>
			';
		}
		//'/ficherosSubidos/.$row['url'].'
		echo $datosTabla;
		echo "</table>";

		$result->free();
		$this->mysqli->close();
	}

	public function display() {
		$query = 'select * from document order by fecha desc limit 25';
		if($result = $this->mysqli->query($query)){
			while($row = $result->fetch_assoc()){
				//table content
				$datosTabla = "";
				$datosTabla = $datosTabla.'<tr>
				<td >'.$row['sustancia'].'</td>
				<td class="text-center">
					<span class="btn btn-info btn-sm ">                      
					<a href = "ficherosSubidos/'.$row['url'].'" target="_blank">
						<i data-feather="download"> </i>
					</a>
					</span>
					
				</td>
				</tr>';   
				echo $datosTabla;
			}    
			$result->free();
			echo "</table>";
			$this->mysqli->close();
		  
		}
	}
}
?>