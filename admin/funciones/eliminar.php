<?php     
    require_once('bakend.php');
    $myObj = new dbConnect();
    //valor que recibe del form de adminsearch.php
    //$sustancia = $_POST["sustancia"];
    //se convierte a la ruta del documento
    //$del = "/ficherosSubidos/'".$sustancia."'.pdf";
    $nombre = $GET['sustancia'];
    $dir = "/ficherosSubidos/$nombre.pdf";
    $sql = "DELETE FROM document WHERE sustancia = '".$_POST["sustancia"]."'";
   

    if(mysqli_query($myObj->mysqli ,$sql)){
        if(unlink($dir)){
            echo "Record deleted successfully";
        }else{
            echo "Error al eliminar el archivo";
        }
    } else {
        echo "Error deleting record: " . mysqli_error($conn);
    }
?>
