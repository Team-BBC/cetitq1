<?php     
    include 'bakend.php';
    $myObj = new dbConnect();

    $sustancia = $_POST['sustancia'];
    $dir = "ficherosSubidos/$sustancia.pdf";
    $query="DELETE from document where sustancia =?";
    $stmt=$myObj->mysqli->prepare($query);
    //binding where the ? is in the query
    $stmt->bind_param("s", $sustancia);
    $result = $stmt->execute();
    if($result){
        if(unlink($dir)){
            echo "hoja de seguridad para '$sustancia' fue eliminada";
        }else{
            echo "Hubo un error al eliminar la hoja de seguridad";
        }
    }else{
        echo "Error al borrar el la base de datos". mysqli_error();
    }

/*
mannys code
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


    */
?>
