<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cambio contraseña - Croptech</title>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <style>
     @import url('https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap');
    </style>

    <style>
      @import url('https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&display=swap');
    </style>

    <link rel="stylesheet" href="../assets/css/estilos.css">

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
                    href="http://localhost/proyecto_grado/croptech/index.php">Inicio</a> 
                    </li>
            
                </ul>
            </div>
        </div>
    </nav>
    <!--FIN NAVBAR-->

    <!--SECCIÓN ERROR 1-->
    <?php  
       if (isset($_GET['iderror']) && isset($_GET['user']) ){
    ?>
            <div class="container-lg pb-4 pt-4">
                <div class="m-1 row justify-content-center">
                    <div class="col-auto p-5 text-center bg-light border border-success"> 
                        <div class="jumbotron">
                            <h4 class="display-5 text-success text-shadow h1">Editar contraseña </h4>
                            <hr>
                            <?php  
                            if($_GET['iderror'] == 'ok' ||$_GET['iderror'] == 'ok1'){
                                ?>
                                <p style="color:green;" >Clave editada correctamente</p>
                                <?php
                            }
                            ?>
                            <div class="form-row row justify-content-center  p-2">
                                 <div class="form-group col-md-12">
                                     <a href="http://localhost/proyecto_grado/croptech/login/sing-in.php" 
                                     class="btn btn-outline-secondary btn-lg">Ir a iniciar sesión</a>
                                 </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>  
        <!--FIN SECCIÓN ERROR 1-->

        <!--SECCIÓN EN LA QUE TRAEMOS LOS DATOS DE LOGIN DEL USUARIO-->
        <?php  
            } else if( isset($_GET['user']) ) {
                require '../modelo/facade.php';
                $fac=new facade();
                $id_user=$_GET['user'];
                $resul=$fac->readOneFullById($id_user);
            //}
        ?>

        <!--SECCIÓN CONTENIDO-->
        <div class="container-lg pb-4 pt-4">
            <div class="m-1 row justify-content-center">
                <div class="col-auto p-5 text-center bg-light border border-success"> 
                    <div class="jumbotron">
                    <h4 class="display-5 text-success text-shadow h1">Editar contraseña </h4>
                    <hr>
                    <form action="../controlador/validar_updates.php" method="POST">
                        <h5 class="text-left h1" >Datos de sesion:</h5>
                            <div class="form-row">
                                <!--SECCIÓN ERROR 1-->
                                <?php  
                                if( (isset($_GET['iderror'])) && $_GET['iderror']!='ok1' ){
                                ?>
                                    <?php
                                    if($_GET['iderror'] == '1' ||$_GET['iderror'] == '2'){
                                        ?>
                                        <p style="color:red;" >Error al cambiar contraseña, revise los datos ingresados</p>
                                        <?php
                                    }
                                    if($_GET['iderror'] == '3'){
                                        ?>
                                        <p style="color:red;" >Error al cambiar contraseña, por favor intentelo más tarde</p>
                                        <?php
                                    }
                                    ?>

                                <?php
                                }  
                                ?>
                                <!--FIN SECCIÓN ERROR 1-->

                                <br>
                                <div class="form-group col-md-12">
                                    <h6 class="display-6">Nombre del usuario: <?php echo $resul[0]['nombre'];?></h6>
                                </div>
                                <div class="form-group col-md-12">
                                    <h6 class="display-6">Correo: <?php echo $resul[0]['correo'];?></h6>
                                </div>
                            </div>
                            <div class="form-row row justify-content-center p-2">
                                <div class="form-group col-md-12" >
                                    <input type="password" class="form-control" placeholder="Contraseña nueva" id="pass1" name="pass1" required>
                                    <div id="passwordHelpBlock" class="form-text">
                                        La contraseña debe tener: 6-16 caracteres, letras y numeros, al menos una mayúscula y una minúscula.
                                    </div>
                                </div>
                            </div>
                            <div class="form-row row justify-content-center  p-2">
                                <div class="form-group col-md-12">
                                    <input type="password" class="form-control"  id="pass2" name="pass2" placeholder="Verifique contraseña" required>
                                </div>
                            </div>
                            <input type="hidden" name="iduser" value='<?php echo $id_user;?>'>
                            <button type="submit" value="EDITAR_PASS" name="user_edit" class="btn btn-outline-secondary btn-lg" 
                            onclick="return validarEditPas();" >Editar contraseña</button>
                    </form>
                    </div>
                
                </div>
            </div>
        </div>
        <!--FIN SECCIÓN CONTENIDO-->

        <?php             
        }
        else{
            echo "<script type='text/javascript'>
            alert('ERROR!! en el envio de datos');
            window.location='ask.php';
            </script>";
        }
        ?>
        <!--FIN SECCIÓN ERROR 2-->

        <?php require '../footer.php';?>

        <!--COMPLEMENTOS BOOTSTRAP-->
        <script src="../assets/js/validaciones_form.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" 
            integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" 
            crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" 
        integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" 
        crossorigin="anonymous"></script>
        <!--FIN COMPLEMENTOS BOOTSTRAP-->


    
</body>
</html>