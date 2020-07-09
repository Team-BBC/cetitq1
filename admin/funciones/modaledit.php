<?php

define('v5', realpath(dirname(__FILE__)));
    if(isset($_POST['btnEdit'])){
        require_once('bakend.php');


        $myObj = new dbConnect();

        $uploads = 'ficherosSubidos/';
        $idFila = $_POST['id'];
        $nombreSustancia = $_POST['sustancia'];
        $archivoRecibido = $_FILES["fichero"]["tmp_name"];
        $destino = "v5/ficherosSubidos/$nombreSustancia.pdf";

        $target_file = $uploads . basename($_FILES["fichero"]["name"]);

        //check the database for same file name
        $result = mysqli_query($myObj->mysqli, "SELECT count(sustancia) as num from document where sustancia = '".$_POST["sustancia"]."'");


        //comprobacion si hay un archivo existente con ese nombre
        if (!mysqli_num_rows($result)>0){
            die('Hay otra sustancia con ese nombre');
        }else{
            //valores que se iran en la consulta
            $con = "update document set
             sustancia='".$nombreSustancia."',
             url='".$destino."',
             fecha = now() where id = '".$idFila."'";

            if(mysqli_query($myObj->mysqli, $con)){
                echo '<script>
                    console.log("hi, consult returned true ");
                </script>';
                echo getcwd();


                //these check for pdf and no error on file
                if ($_FILES["fichero"]["type"]!="application/pdf") {
                  echo ("El archivo no esta en el formato adecuado <br>");
                  echo '<script>
                        console.log("hi, the file is not pdf");
                    </script>';
                }
                if ($_FILES["fichero"]["error"]!=0) {
                  echo ("Hay un error en el archivo <br>");
                  echo '<script>
                        console.log("hi, the file is has error(s) on it");
                    </script>';
                }


                //move file to /ficherosSubidos
                $name = basename($_FILES["fichero"]["name"]);
                if(move_uploaded_file($_FILES["fichero"]["tmp_name"], $target_file)){
                    echo '<script>
                        alert("fichero Grabado");
                        console.log("hi, the file got uploaded succesfully");
                    </script>';
                }            


            }else{
                echo "Error al subir el archivo a /ficherosSubidos" .$con . "" . mysqli_error($myObj->mysqli);
                echo '<script>
                    console.log("hi, consult returned false");
                </script>';
            }

            }
        
    }
?>

<div class="modal fade" id="actualizarModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Actualizar Hoja de Seguridad</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <div class="modal-body">
            <form id="f_prog"method="post" enctype="multipart/form-data">
                <input type="hidden" name="id" id="id">
                <label for="sustancia">Nombre de Sustancia</label>
                <input type="text" name="sustancia" id="sustancia" class="form-control form-control-sm">
                <div class="form-group">
                <label for="formGroupExampleInput2">PDF</label>
                <div class="custom-file">
                    <input type="file"  class="custom-file-input" name="fichero" id="fichero" required>
                    <label class="custom-file-label" data-browse="Seleccionar">Escojer PDF Nuevo</label>
                    <div class="invalid-feedback">Example invalid custom file feedback</div>
                </div>
                </div>
                
                </br>              
                </br>
                <input type="submit" name="btnEdit" class="btn btn-warning" value="Actualizar" >

            </form>
        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        </div>
    </div>
    </div>
</div>