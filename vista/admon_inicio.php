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
        $resul=$fac->readUserById($_SESSION['usuario']);
    ?>

        <br>
        <br>
        
        <div class="container">
            
            <div class="m-1 row justify-content-center">
            <div class="col-auto p-5 text-center bg-light border border-success">

            <div class="jumbotron">

                <h3 class="display-5 text-success text-shadow h1">Perfil administrador</h3>
                <hr>
                <img id="foto" src="http://localhost/proyecto_grado/croptech/assets/img/user_admon.png" 
                height="200px" width="200px">
                <br>
                <form action="admon_editP.php" method="post">
                <h5 class="text-left h1" >Datos personales:</h5>
                <br>
                <p class="lead">Id: <?php echo $resul[0]['id_admon'];?> </p>
                <p class="lead">Correo: <?php echo $resul[0]['correo'];?> </p>
                <input type="hidden" value='<?php echo $resul[0]['correo'];?>' name="correo">
                <p class="lead">Pregunta de seguridad: <?php echo $resul[0]['pregunta'];?> </p>
                <p class="lead">Respuesta: <?php echo $resul[0]['respuesta'];?> </p>
                <button type="submit" value="EDITAR" name="Sadmon" class="btn btn-outline-secondary btn-lg" >EDITAR CONTRASEÑA</button>
                </form>
                <div align="center" id="error">
                    <?php    
                    if(isset($_GET['iderror'])){
                    if($_GET['iderror'] == 'EAok'){
                        ?>
                        <br>
                        <p align="center" style="color:green;" >Clave editada correctamente</p>
                        <?php
                    }
                    
                    if($_GET['iderror'] == 'EA1' ||$_GET['iderror'] == 'EA2'||$_GET['iderror'] == 'EA3'){
                    ?>
                    <br>
                    <p align="center" style="color:red;" >Las contraseñas ingresadas no son iguales y/o no contienen numeros y/o mayusculas</p>
                    <?php
                    }
                    
                }?>
            </div>


        </div>
        <div class="jumbotron bg-transparent">
            </div>
        </div>
        </div>
        </div>
        <hr>
        <div class="p-3" id="separator-ribbon">
            <div class="bg-light">     
            <h4 class="text-center pb-3 pt-3"></h4></div>
          </div>
        </div>

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