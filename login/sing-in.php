<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Login - CropTech </title>
    <link rel="stylesheet" href="../assets/css/estilos.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
       
    <style>
    @import url('https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap');
    </style>
    <style>
    @import url('https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&display=swap');
    </style>

     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" 
        integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" 
        crossorigin="anonymous">
</head>
<body> 

        <!--NAVBAR-->
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="#"> 
                        <img src="../assets/img/logo.png" alt="" width="100">
                    </a>
            </div>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item"><a class="nav-link " aria-current="page" 
            href="http://localhost/proyecto_grado/croptech/index.php">Inicio</a> </li>
           
        </ul>

            </div>
        </div>
        </nav>
            <!--FIN NAVBAR-->

            <!--CONTENIDO-->
            <div class="container-lg pb-4 pt-4 ">
                    <div class="m-1 row ">
                        <div class="col-auto p-5 bg-light border border-success">
                            <div class="jumbotron">
                                <div id= "contenedor-name">
                                    <h1 id="name" class="text-black " >Inicia sesión</h1>
                                    <hr>
                                </div>
                                 <!--SECCIÓN FORMULARIO-->
                                <form action="../controlador/validarlogin.php" method="post">

                                    <div class="form-row row justify-content-center p-2">
                                        <div class="form-group col-md-12">
                                            <label>E-mail</label>
                                            <input type="text" id="user" class="form-control" name="user" required>
                                        </div>
                                    </div>
                                    <div class="form-row row justify-content-center p-2">
                                        <div class="form-group col-md-12">
                                            <label>Contraseña</label>
                                            <input type="password" id="pass" class="form-control" name="pass" required>
                                        </div>
                                    </div>
                                    <div class="text-center p-2">
                                        <button type="submit" class="btn btn-outline-success btn-lg">Iniciar sesión</button>
                                    </div>
                                    <div class="text-center p-2">
                                    <a href="vista/recuperar.php"> <button type="button"
                                    class="btn btn-outline-dark">¿Olvido su contraseña?</button></a>
                                    </div>
                                </form>
                                <!--FIN SECCIÓN FORMULARIO-->
                            </div> 
                        </div> 
                            <div class="col ">
                                 <!--SECCIÓN CAJA TRASERA-->
                                <div class="caja_trasera"> 
                                    <div>
                                        <h1 id="name" class="text-black text-white text-shadow" >CropTech</h1>
                                        <hr>
                                        <br>
                                        <h3>¿Aún no tienes una cuenta?</h3>
                                        <p>Registrate para que puedas iniciar a administrar tu huerto</p>
                                        <button class="btn btn-outline-light" onclick="location='../login/asignar-rol.php'" 
                                        id="btn_registrarse">Registrarse</button>
                                    </div>
                                </div>
                                 <!--FIN SECCIÓN CAJA TRASERA-->
                            </div>
                    </div>  
                        
            </div> 
            <!--FIN CONTENIDO-->
            <?php  require "../footer.php"; ?>
 
    <script src="../assets/js/validaciones_form.js"></script>

    <!--COMPLEMENTOS BOOTSTRAP-->
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" 
            integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" 
            crossorigin="anonymous">
        </script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" 
            integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" 
            crossorigin="anonymous">
        </script>
    <!--FIN COMPLEMENTOS BOOTSTRAP-->
</body>
</html>