<?php 
session_start(); 
if($_SESSION['usuario']){
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil - croptech</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <style>
    @import url('https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&display=swap');
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
                  href="http://localhost/proyecto_grado/croptech/vista/user_inicio.php">Inicio</a> </li>
                  <li class="nav-item"><a class="nav-link active" 
                  href="http://localhost/proyecto_grado/croptech/vista/user_perfil.php">Perfil</a></li>
                  <li class="nav-item"><a class="nav-link" 
                  href="http://localhost/proyecto_grado/croptech/vista/cultivo-historial.php" >Mis cultivos</a></li>
                </ul>
              
                <form class="d-flex form-inline my-2 my-lg-0  navbar-right" >
                        <a href="http://localhost/proyecto_grado/croptech/controlador/cerrar_sesion.php" 
                        class="btn btn btn-dark" style="float: right;">Cerrar sesión</a>
                </form>

            </div>
        </div>
    </nav>
    <!--FIN NAVBAR-->
       
    <?php 
      $id=$_SESSION['usuario']; //la varible int es un entero
      require '../modelo/facade.php';
      $fac=new facade();
      $resul=$fac-> readOneFullById($id);
      $idaux=0;
    ?>
    <br>
    <!--SECCIÓN CONTENIDO-->
    <div class="container-lg pb-4 pt-4">
        <div class="m-1 row justify-content-md-center">
            <div class="col-auto p-5 text-center bg-light border border-success">
                <div class="jumbotron">
                    <h3 class="display-5 text-success text-shadow h1">Datos de usuario</h3>
                    <br>
                    <?php 
                    if($resul[0]['sexo'] == 'Masculino'){
                    ?>
                      <img id="foto" src="http://localhost/proyecto_grado/croptech/assets/img/user.png" height="150px" width="150px">
                    <?php 
                    }
                    else{
                        ?>
                        <img id="foto" src="http://localhost/proyecto_grado/croptech/assets/img/user_w.png" height="150px" width="150px" >
                      <?php
                    }
                    ?>
                    <br> 
                    <br> 
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
                                      <p  style="color:red;" >Telefono ingresado al actualizar datos ya existe</p>
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

                    <h3 >Datos Personales:</h3>
                    <br>
                    <?php for($i=0;$i<count($resul);$i++){?> 
                      <p class="lead">Nombres: <?php echo $name=$resul[$i]['nombre']?> </p>
                      <p class="lead">Apellidos: <?php echo $resul[$i]['apellido']?> </p>
                      <p class="lead">Sexo: <?php echo $resul[$i]['sexo']?> </p>
                      <p class="lead">Telefono 1: <?php echo $resul[$i]['telefono_usuario']?> </p>
                      <p class="lead">Telefono 2: <?php echo $resul[$i]['telefono_2']?> </p>
                      <p class="lead">E-mail: <?php echo $resul[$i]['correo']?> </p>
                    <br>
                    <div class="pd-4">
                        <a href="http://localhost/proyecto_grado/croptech/vista/user_edit_p.php" class="btn btn-secondary">EDITAR CLAVE</a>
                        <a href="http://localhost/proyecto_grado/croptech/vista/user_edit_e.php" class="btn btn-success">EDITAR DATOS</a>
                    </div>
                    <?php
                    }
                    ?>
                </div>
            </div>
            <!--SECCIÓN CAJA TRASERA-->
            <div class="col ">
                <div class="caja_trasera"> 
                    <div>
                      <h1 id="name" class="text-center text-white text-shadow">CropTech - Profile</h1>
                      <hr>
                      <br>
                      <h3 align="center" class="pt-5">Hola, <?php echo $name; ?></h3>
                      <p >En esta sección puedes visualizar y editar tus datos de usuario.</p>
                    <div>
                </div>
            </div>
            <!--FIN SECCIÓN CAJA TRASERA-->
        </div>
      </div>
    </div>
    </div>
    <!--FIN SECCIÓN CONTENIDO-->
          <hr>
    <!--SECCIÓN SEPARADOR-->
    <div class="p-3" id="separator-ribbon">
            <div class="bg-light">     
            <h4 class="text-center pb-3 pt-3"></h4>
            </div>
    </div>
    <!--FIN SECCIÓN SEPARADOR-->
  
    <?php  require "../footer.php"; ?>

        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" 
        integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" 
        crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" 
        integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" 
        crossorigin="anonymous"></script>

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