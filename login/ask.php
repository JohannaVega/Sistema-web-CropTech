<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pregunta de seguridad - CropTech</title>

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

        <!--SECCIÓN EN LA QUE TRAEMOS LOS DATOS DE LOGIN DEL USUARIO-->
        <?php  
        if( isset($_GET['user']) ){
            require '../modelo/facade.php';
            $fac=new facade();
            $id_user=$_GET['user'];
            $resul=$fac->read_datos_login($id_user); 
        //}
        ?>
        <div class="container-lg pb-4 pt-4">
            <!--FILA 1-->
            <div class="m-1 row">
            
                <!--COLOMUNA 1-->
                <div class="col-auto p-5 bg-light border border-success">
                    <br>
                    <br>
                    <!-- NOS REDIRECCIONA A VALIDARLOGIN CUANDO PRESIONA RECUPERAR CONTRASEÑA -->
                    <h1 class="text-center">Pregunta de seguridad</h1>
                    <hr>
                    <br>
                    
                    <!--SECCIÓN FORMULARIO-->
                    <form method='post' action="../controlador/validarlogin.php">
                        <div class="col-sm-12">
                            <h6 class="display-6">Pregunta de seguridad:</h6>
                            <label><?php echo $resul[0]['pregunta'];?></label>
                            <input type="hidden" class="form-control " name="id" value='<?php echo $id_user;?>' placeholder="Respuesta">
                            <br>
                        </div>

                        <br>
                        <div class="col-sm-12 ">   
                            <label>Respuesta:</label>
                            <input type="password" class="form-control" id="answer"
                            name="answer" placeholder="Ingresa respuesta">
                        </div>
                        <div class="text-center p-2">
                            <button type="submit" name="validarR" value="validarR" class="btn btn-success btn-lg btn-block" 
                            onclick="return validarAnswer();" >Validar respuesta</button>
                        </div>

                    </form>
                    <!--FIN SECCIÓN FORMULARIO-->

                    <div id="passwordHelpBlock" class="form-text">
                        ¿La pregunta que aparece en pantalla no corresponde a la que ingresaste?. <br> 
                        Es probable que hayas ingresado un correo electronico incorrecto vuelve a <br>
                        ingresar tu correo registrado.
                    </div>   
                    <div class="text-center p-2">
                    <button class="btn btn-outline-secondary" onclick="location='login/recuperar.php'" 
                            id="btn_registrarse">Volver a "recuperar contraseña"</button>
                    </div>
                    
                </div>
                <!--FIN COLOMUNA 1-->

                <!--COLOMUNA 2-->
                <div class="col ">
                    <!--SECCIÓN CAJA TRASERA-->
                    <div class="caja_trasera"> 
                        <div>
                            <h1 id="name" class="text-black text-white text-shadow" >CropTech</h1>
                            <hr>
                            <br>
                            <h3>¡Escribe tu respuesta!</h3>
                            <p>Para poder continuar con el proceso de recuperar tu contraseña 
                            es necesario que contestes la pregunta que aparece en el formulario que te mostramos, 
                            la respuesta debe ser la misma que ingresaste en el momento en que te registraste o no 
                            podremos continuar con el proceso.</p>
                            <hr>

                           
                        </div>
                    </div>
                    <!--FIN SECCIÓN CAJA TRASERA-->
                </div>
                <!--FIN COLOMUNA 2-->
            </div>
            <!--FIN FILA 1-->
        </div>
                
        <?php    
        }
        ?>

        <?php  require "../footer.php"; ?>
        <script src="../assets/js/login.js"></script>

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