<?php
// (1) CONNECT DATABASE
// ! CHANGE THESE TO YOUR OWN !
define('DB_HOST', 'localhost');
define('DB_NAME', 'hojastq');
define('DB_CHARSET', 'utf8');
define('DB_USER', 'root');
define('DB_PASSWORD', '');

try {
  $pdo = new PDO(
    "mysql:host=" . DB_HOST . ";charset=" . DB_CHARSET . ";dbname=" . DB_NAME,
    DB_USER, DB_PASSWORD, [ PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES => false ]
  );
} catch (Exception $ex) {
  die($ex->getMessage());
}

// (2) SEARCH
$stmt = $pdo->prepare("SELECT * FROM `document` WHERE `sustancia` LIKE ? OR `url` LIKE ?");
$stmt->execute(["%" . $_POST['search'] . "%", "%" . $_POST['search'] . "%"]);
$results = $stmt->fetchAll();
if (isset($_POST['ajax'])) {
  echo json_encode($results);
}



/*
  require_once('funciones/bakend.php');
  $myObj = new dbConnect();
  $sql = "select * from document";
  if(isset($_GET['search']) ){
    //there is a search asked for 

    $sustancia = htmlspecialchars($_GET["search"]);

    $sustancia2 = $myObj->real_escape_string($sustancia);

    if ($result = $myObj->query("SELECT * from documents where sustancia like '$sustancia' limit 14")) {
      while ($row = $result->fetch_assoc()) {
        $datosTabla = "";

        $datosTabla = $datosTabla.'<td style="display:non;">'$row['id']'</td>
        <td>'$row['sustancia']'</td>
        <td>'$row['url']'</td>
        <td>'$row['fecha']'</td>
        <td class="text-center">
          <span class="btn btn-warning btn-sm editbtn" >
            <img src="imagenes/editar.png">
          </span>
        </td>
        <td class="text-center">
        <span class="btn btn-danger btn-sm deletebtn">
          <img src="imagenes/borrar.png">
          </span>
        </td>
        <td class="text-center">
          <span class="btn btn-info btn-sm ">                      
            <a href = '$row['url']' target="_blank">
            <img src="imagenes/descargar.png">
            </a>
          </span>
        </td>
        </tr>
         ';
      }
      echo $datosTabla;
      echo "</table>"
    }else{
      echo "Error consulting database";
    }
  }
  /*while($row = $result->fetch_assoc()){
    ?>
      <td style = "display:none;"><?php $row['id'];?></td>
      <td><?php $row['sustancia'];?></td>
      <td><?php $row['url'];?></td>
      <td><?php $row['fecha'];?></td>
      <td class="text-center">
        <span class="btn btn-warning btn-sm editbtn" >
          <img src="imagenes/editar.png">
        </span>
      </td>
      <td class="text-center">
      <span class="btn btn-danger btn-sm deletebtn">
        <img src="imagenes/borrar.png">
        </span>
      </td>
      <td class="text-center">
        <span class="btn btn-info btn-sm ">                      
          <a href = '<?php $row['url']?>' target="_blank">
          <img src="imagenes/descargar.png">
          </a>
        </span>
      </td>
      </tr>
      <?php
      echo $datosTabla;
  }
  echo "</table>";
  mysqli_close($myObj);
  */
?>