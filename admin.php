<?php
require 'admin/funciones/bakend.php';
$myObj = new dbConnect();
session_start();
    if(!isset($_SESSION['userlogin'])){
        header("Location: login.php");
    }
    if (isset($_POST['search'])) {
        require 'admin/search.php';
    }
    
?>

<!DOCTYPE html>
<html>
<head>
        <!--favicon-->
        <link rel="shortcut icon" type="image/png" href="../imagenes/manetologo1.png"/>
        <!-- Required meta tags -->
        <meta name="robots" content="noindex">
        
        <!-- Bootstrap CSS and js libraries -->
        <?php
            require 'libraries/libraries.php';
        ?>
            
        <title> Administrador </title>
        
    </head>
    <body style="background-image: url(imagenes/bg.png);">
        <div id="content">
            <?php
                include "hojasTq/navbar.php";
            ?>

            <!--barra de busqueda & resultados-->
            <div class=" container-fluid border border-dark rounded ml-3" style="float:left;background: white;height:auto ;width: 70%;margin-top: 20px;margin-bottom: 5px">
                <form method="post">
                    <div class="form-group text-left" style="margin-top: 10px">
                        <input class="form-control m-auto mt-1" style="width: 60%; float: left;" type="text" name="search" placeholder="Escribe una Sustancia" id="search" required/>
                        <input type="submit" value="Buscar">
                    </div>
                </form> 
                
                <div class="container">
                    <!--Search Results-->
                    <div class="row">
                        <h2>Busquedas</h2>
                        <div class="col-sm-12" style="margin-top: 20px">     
                            <h4>Resultados</h4>                                       
                                <div>
                                     <?php   
                                        $myObj->displayAll();
                                    ?>
                                </div>                                                                   
                        </div>
                    </div>
                </div>
            </div>

            <!--agregar nuevo registro-->
            <div class=" container-fluid border border-dark rounded " style="float:rigth; background: white;height: auto;width: 25%;margin-top: 20px; margin-right: 8px">
            <form action="subir.php"method="post" name="f_prof"id="f_prof" enctype="multipart/form-data" style="width: 75%">
                    <div class="form-group" style="margin-top: 8px">
                        <label>Nombre de la sustancia</label>
                        <input type="text" class="form-control" name="nombre" id="nombre">
                     </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput2">PDF</label>
                        <div class="custom-file">
                            <input type="file"  class="custom-file-input" name="fichero" id="fichero"  required>
                            <label class="custom-file-label" for="archivopdf" data-browse="Seleccionar">Escojer archivo...</label>
                            <div class="invalid-feedback">Example invalid custom file feedback</div>
                         </div>
                    </div>
                    <input type="submit" class="btn btn-primary mb-3" value="Enviar"  name="ok" id="ok">

            </form>
        </div>


        </div><!--Termina Contenido-->
        

        <?php require_once "admin/funciones/modalUpdate.php" ?>
        <?php require_once "admin/funciones/modalDelete.php" ?>
        
        <script src="js/crud.js"></script>
        <link rel= "stylesheet"  type="text/css"  href="../libraries/stylesheet.css"/>
        <!--Pie de Pagina-->
    </body>
</html>