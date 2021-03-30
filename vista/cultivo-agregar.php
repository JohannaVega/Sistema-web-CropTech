<?php 
session_start(); 
if($_SESSION['usuario']){
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar usuario - croptech</title>
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
        <li class="nav-item"><a class="nav-link " aria-current="page" 
        href="http://localhost/proyecto_grado/croptech/vista/user_inicio.php">Inicio</a> </li>
        <li class="nav-item"><a class="nav-link" 
        href="http://localhost/proyecto_grado/croptech/vista/user_perfil.php">Perfil</a></li>
        <li class="nav-item">
        <a class="nav-link" 
        href="http://localhost/proyecto_grado/croptech/vista/cultivo-historial.php" >Mis cultivos</a></li>
      </ul>

      <form class="d-flex">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success ps-3" type="submit">Search</button>
      </form>

      <form class="d-flex form-inline my-2 my-lg-0  navbar-right" >
          <button class="btn btn btn-dark"
            data-toggle="button" aria-pressed="false" autocomplete="off"
            style="float: right;" type="submit">Sing out</button>
         </form>

        </div>
    </div>
    </nav>
        <!--FIN NAVBAR-->
        <br>
        <div class="container"> 

        <div class="m-1 row justify-content-center">
            <div class="col-auto p-5 text-center bg-light border border-success"> 
        <div class="jumbotron">
        <h3 class="display-5 text-success text-shadow h1">Nuevo cultivo</h3>
        <hr>
                    <form action="../controlador/validar_cultivos.php" method="post">
                    <h6 class="text-left h1" >Información del cultivo:</h6>
                    <div class="form-row row justify-content-center p-2">
                    
                    <div class="form-group col-md-12">
                    <input type="text" id= "cnombre" name="cnombre" class="form-control" placeholder="Nombre del cultivo" required>
                    </div>
                    </div>
                    <div class="form-row row justify-content-center p-2">
                    <div class="form-group col-md-12">
                    <p>Fecha de registro del cultivo:</p>
                    <input type="date" id="fecha_registro" class="form-control" name="fecha_registro" placeholder="Fecha registro del cultivo" required>
                    </div>
                    </div>
                    <?php $idu=$_SESSION['usuario'] ?>
                    <input type="hidden" name="idu" value='<?php echo $idu;?>'>
                    
                    <div align="center" id="error">
                    <?php 
                    if(isset($_GET['iderror'])){
                        if($_GET['iderror'] == 'ok'){
                        ?>
                         <script>
                        alert("Cultivo nuevo registrado correctamente"); 
                         </script>
                        <p align="center" style="color:green;" >Cultivo nuevo registrado correctamente</p>
                        <?php
                        }
                        
                        if($_GET['iderror'] == 'bad'){
                        ?>
                        <script>
                        alert("Error en el sistema, vuelva a intentarlo mas tarde"); 
                         </script>
                        <p align="center" style="color:red;" >Error en el sistema, vuelva a intentarlo mas tarde</p>
                        <?php
                        }     
                    }
                    ?>
                    </div>
                    <button type="submit" value="CREAR_C" name="user_c" class="btn btn-outline-secondary btn-lg" onclick="return validarInsertC();">CREAR CULTIVO</button>
                    </form>
                    </div>
                    <div class="d-none d-sm-none d-md-block" >
                <div class="jumbotron bg-transparent">
                </div>
                </div>
              
                
            </div>
            </div>
            </div>
            
            </div>
            <script src="../js/validaciones_form.js"></script>
            <hr>
        <div class="p-3" id="separator-ribbon">
            <div class="bg-light">     
            <h4 class="text-center pb-3 pt-3"></h4></div>
          </div>
        </div>

    <?php require '../footer.php';?>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" 
        integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" 
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" 
       integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" 
       crossorigin="anonymous"></script>
</body>
</html>
<?php }else{
    echo "<script type='text/javascript'>
    alert('ERROR!! al iniciar sesion');
    window.location='../index.php';
    </script>";
}?>