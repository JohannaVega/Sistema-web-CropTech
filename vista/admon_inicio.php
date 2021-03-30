<?php 
session_start(); 
if($_SESSION['usuario']){
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil de usuario - croptech</title>
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
                    <li class="nav-item"><a class="nav-link active" aria-current="page" 
                    href="http://localhost/proyecto_grado/croptech/vista/admon_inicio.php">Inicio</a> </li>
                    <li class="nav-item"><a class="nav-link " 
                    href="http://localhost/proyecto_grado/croptech/vista/admon_usuarios.php">Adminstrar usuarios</a></li>
                    <li class="nav-item"><a class="nav-link " 
                    href="#">Control cultivos</a></li>
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

        <br>
        <!--SECCIÓN CONTEINER FORM-->
        <div class="container-lg pb-4 pt-4">
            
            <div class="m-1 row justify-content-center">
                <div class="col-auto p-5 text-center bg-light border border-success">

                    <div class="jumbotron">

                        <h3 class="display-5 text-success text-shadow h1">Perfil administrador</h3>
                        <hr>
                        <img id="foto" src="http://localhost/proyecto_grado/croptech/assets/img/user_admon.png" 
                        height="200px" width="200px">
                        <br>

                        <?php for($i=0;$i<count($resul);$i++){?> 
                        <p class="lead">Nombres: <?php echo $name=$resul[$i]['nombre']?> </p>
                        <p class="lead">Apellidos: <?php echo $resul[$i]['apellido']?> </p>
                        <p class="lead">Sexo: <?php echo $resul[$i]['sexo']?> </p>
                        <p class="lead">Telefono 1: <?php echo $resul[$i]['telefono_usuario']?> </p>
                        <p class="lead">Telefono 2: <?php echo $resul[$i]['telefono_2']?> </p>
                        <p class="lead">E-mail: <?php echo $resul[$i]['correo']?> </p>
                        <br>
                        <?php
                        }
                        ?>
                        <div class="pd-4">
                            <a href="http://localhost/proyecto_grado/croptech/vista/admon_editP.php" class="btn btn-secondary">EDITAR CLAVE</a>
                            <a href="http://localhost/proyecto_grado/croptech/vista/admon_editD.php" class="btn btn-success">EDITAR DATOS</a>
                        </div>

                        <!--SECCIÓN DIV DE ERRORES-->
                        <div align="center" id="error">
                            <?php    
                            if(isset($_GET['iderror'])){
                                if($_GET['iderror'] == 'ok1'){
                                    ?>
                                    <br>
                                    <p  style="color:green;" >Contraseña actualizada correctamente</p>
                                    <?php
                                    }
                                    if($_GET['iderror'] == '1' || $_GET['iderror'] == '2' || $_GET['iderror'] == '3'){
                                        ?>
                                        <br>
                                        <p  style="color:red;" >Las contraseñas ingresadas no son iguales y/o no contienen numeros y/o mayusculas</p>
                                        <?php
                                    }
                                    if($_GET['iderror'] == 'ok'){
                                        ?>
                                        <p  style="color:green;" >Registro actualizado correctamente</p>
                                        <?php
                                    }   
                                    if($_GET['iderror'] == 'tel'){
                                        ?>
                                        <p  style="color:red;" >Telefono no.1 ingresado al actualizar datos ya existe</p>
                                        <?php
                                    } 
                                    if($_GET['iderror'] == 'em'){
                                        ?>
                                        <p  style="color:red;" >Correo ingresado al actualizar datos ya existe</p>
                                        <?php
                                    }     
                                    if($_GET['iderror'] == 'bad'){
                                        ?>
                                        <p  style="color:red;" >Error al actualizar el registro, intentelo más tarde</p>
                                        <?php
                                    }
                                }?>
                           
                           
                        </div>
                        <!--FIN SECCIÓN DIV DE ERRORES-->
                    </div>
                </div>
                 <!--SECCIÓN CAJA TRASERA-->
                 <div class="col ">
                    <div class="caja_trasera"> 
                        <div>
                            <h1 id="name" class="text-center text-white text-shadow">CropTech - Admon</h1>
                            <hr>
                            <br>
                            <h3 class="pt-5">Hola, <?php echo $name; ?></h3>
                            <p >En esta sección puedes visualizar y editar tus datos de usuario.
                            En la barra superior encontrarás el acceso a las diferentes funciones de administrador.</p>
                        <div>
                    </div>
                </div>
                <!--FIN SECCIÓN CAJA TRASERA-->
            </div> </div></div>
        </div>
        <!--FIN SECCIÓN CONTEINER FORM-->
        <hr>
        <!--SECCIÓN SEPARADOR RIBBON-->
        <div class="p-3" id="separator-ribbon">
            <div class="bg-light">     
                <h4 class="text-center pb-3 pt-3"></h4></div>
            </div>
        </div>
        <!--FIN SECCIÓN SEPARADOR RIBBON-->

        <?php require '../footer.php';?>

    </body>
</html>
<?php
}else{
  echo "<script type='text/javascript'>
  alert('ERROR!! al iniciar sesion');
  window.location='../index.php';
  </script>";
  }
?>