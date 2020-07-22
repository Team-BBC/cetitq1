<?php
    session_start();
    if(isset($_SESSION['userlogin'])){
        header("location: ../admin.php");
    }
?>


<!DOCTYPE html>
<head>

    <meta charset = "utf-8"/>
    <!--Importacion de CSS (stylesheet.css)-->
    <link rel= "stylesheet"  type="text/css"  href="resources/stylesheet.css"/>
     <!-- Required meta tags -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
            
    <!-- Bootstrap CSS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title> Inicio de Sesion</title>

</head>
<body style="background-image: url(../imagenes/bg.png);" >

    <div id="content">
        <!--Navbar-->
        <?php
            include '../hojasTq/navbar.php';
        ?>

         <div class="container rounded" style="background: white; width: 80%;margin-top: 50px;" >
            <form class = "text-center " style="margin-top: 40px" >
                <div class="form-group mx-auto h2" style="width: 60%;margin-top: 40px">
                    <label for="text">Nombre de usuario</label>
                    <input type="text" class="form-control text-center" style="margin-top: 22px" placeholder="Ingresa su usuario" id="username">
                </div>
                <div class="form-group mx-auto h2" style="width: 60%;margin-top: 20px">
                    <label for="pwd">Contraseña</label>
                    <input type="password" class="form-control text-center"style="margin-top: 22px" placeholder="Ingrese su contraseña" id="password">
                </div >
                <div class="form-group mx-auto " style="width: 60%;margin-top: 20px">
                    <button id="login" type="submit" class="btn btn-primary" style="margin-top: 35px;margin-bottom: 30px" >Entrar</button>
                </div>
                
            </form> 
            <script src="http://code.jquery.com/jquery-3.3.1.min.js"
            integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
            crossorigin="anonymous">
            </script>
            <script type="text/javascript" src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
            <script src="script.js"></script>
        </div>        
        
        
    </div>

    <!--footer -->
</body>