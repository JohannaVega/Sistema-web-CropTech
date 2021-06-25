<?php 
session_start(); 
if($_SESSION['usuario']){
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar clave - CropTech</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="../assets/css/estilos.css">

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
                    <li class="nav-item"><a class="nav-link" aria-current="page" 
                        href="http://localhost/proyecto_grado/croptech/vista/admon_inicio.php">Inicio</a> </li>
                    <li class="nav-item"><a class="nav-link " 
                        href="http://localhost/proyecto_grado/croptech/vista/admon_usuarios.php">Adminstrar usuarios</a></li>
                    <li class="nav-item"><a class="nav-link" 
                        href="http://localhost/proyecto_grado/croptech/vista/admon_cultivo.php">Control cultivos</a></li>
                    <li class="nav-item"><a class="nav-link" 
                        href="http://localhost/proyecto_grado/croptech/vista/admon_cultivosBD.php">Listar cultivos</a></li>
                </ul>

                <form class="d-flex form-inline my-2 my-lg-0  navbar-right" >
                    <a href="http://localhost/proyecto_grado/croptech/controlador/cerrar_sesion.php" 
                    class="btn btn btn-dark" style="float: right;">Cerrar sesión</a>
                </form>

            </div>
        </div>
    </nav>
    <!--FIN NAVBAR-->

    <?php require '../modelo/facade.php';
        $fac=new facade();
        $resul=$fac->readOneFullById($_SESSION['usuario']);
    ?>
        
         <!--SECCIÓN CONTENIDO-->
        <div class="container-lg pb-4 pt-4 "> 

            <div class="m-1 row justify-content-center">
                <div class="col-auto p-5 text-center bg-light border border-success"> 
                    <div class="jumbotron">
                        <h3 class="display-5 text-success text-shadow h1">Editar contraseña</h3>
                        <hr>
                        <form action="../controlador/validar_updates.php" method="post">
                            <h5 class="text-left h1" >Datos de sesion:</h5>
                            <div class="form-row row justify-content-center p-2">
                                <br>
                                <div class="form-group col-md-12">
                                    <h6 class="display-6">Correo: <?php echo $resul[0]['correo']?></h6>
                                </div>
                            </div>
                            <div class="form-row row justify-content-center p-2">
                                <div class="form-group col-md-12">
                                  <input type="password" class="form-control" placeholder="Contraseña nueva" id="pass1" name="pass1" required>
                                  <div id="passwordHelpBlock" class="form-text">
                                        La contraseña debe tener: 6-16 caracteres, letras y numeros, al menos una mayúscula y una minúscula.
                                  </div>
                                </div>
                            </div>
                            <div class="form-row row justify-content-center p-2">
                                <div class="form-group col-md-12">
                                  <input type="password" class="form-control"  id="pass2" name="pass2" placeholder="Verifique contraseña" required>
                                </div>
                            </div>
                            <button type="submit" value="EDITAR" name="Sadmon" class="btn btn-outline-secondary btn-lg" onclick="return validarEditPas();">EDITAR CONTRASEÑA</button>
                        </form>
                    </div>
                </div>
            </div>
            </div>
        </div>
        <!--FIN SECCIÓN CONTENIDO-->
        <hr>
        <div class="p-3" id="separator-ribbon">
            <div class="bg-light">     
                <h4 class="text-center pb-3 pt-3"></h4></div>
            </div>
        </div>
        <script src="../js/validaciones_form.js"></script>
        <?php require '../footer.php';?>
    </body>
    </html>
<?php
 }else{
    echo "<script type='text/javascript'>
    alert('ERROR!! al iniciar sesion');
    window.location='../index.php';
    </script>";
}?>
