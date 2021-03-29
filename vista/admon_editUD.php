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
        href="http://localhost/proyecto_grado/croptech/vista/admon_inicio.php">Inicio</a> </li>
        <li class="nav-item"><a class="nav-link " 
        href="http://localhost/proyecto_grado/croptech/vista/admon_usuarios.php">Adminstrar usuarios</a></li>
      </ul>

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
        <?php
            if(isset($_GET['idu'])){
            require '../modelo/facade.php';
            $fac=new facade();
            $resul=$fac->readOneFullById($_GET['idu']);

        ?>
        <div class="m-1 row justify-content-center">
            <div class="col-auto p-5 text-center bg-light border border-success"> 
        <div class="jumbotron">
        <h4 class="display-5 text-success text-shadow h1">Editar datos de usuario</h4>
            <hr>
                    <form action="../controlador/validar_updates.php" method="post">
                    <div class="form-row row justify-content-center p-2">
                    <div class="form-group col-md-12">
                        <input type="text" id="nombres" value='<?php echo $resul[0]['nombre'];?>'name="nombres"
                        class="form-control" placeholder="Nombres" required>
                    </div>
                    </div>

                    <div class="form-row row justify-content-center p-2">
                    <div class="form-group col-md-12">
                        <input type="text" id="apellidos" value='<?php echo $resul[0]['apellido'];?>'name="apellidos"
                        class="form-control" placeholder="Apellidos" required>
                    </div>
                    </div> 

                    <div class="form-row row justify-content-center p-2">
                    <div class="form-group col-md-12">
                    <input type="text" id="sexo" value='<?php echo $resul[0]['sexo'];?>'name="sexo"
                        class="form-control" placeholder="Sexo" readonly>
                    </div> 
                    </div>  

                    <div class="form-row row justify-content-center p-2">
                    <div class="form-group col-md-12">
                    <input type="number" id="telefono" class="form-control" value='<?php echo $resul[0]['telefono'];?>' 
                    name="telefono"  placeholder="Telefono" min="3000000000" max="3999999999" required>
                    </div>
                    </div>

                    <div class="form-row row justify-content-center p-2">
                    <div class="form-group col-md-12">
                    <input type="text" id="correo" class="form-control" value='<?php echo $resul[0]['correo'];?>' 
                    name="correo"  placeholder="Correo electronico" required>
                    </div>
                    </div>  

                    <input type="hidden" name="idu" value='<?php echo $_GET['idu'];?>'>
                    <div align="center" id="error">
                    </div>
                    <button align="center" type="submit" value="EDITAR_A" name="admon_edit" class="btn btn-outline-secondary btn-lg" onclick="return validarEditU();">EDITAR USUARIO</button>
                    </form>
                    </div>
                    <div class="d-none d-sm-none d-md-block" >
                <div class="jumbotron bg-transparent">
                </div></div>
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
            <script src="../assest/js/validaciones_form.js"></script>
            
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
  header("Location: http://localhost/proyecto_grado/croptech/vista/admon_usuarios.php");
}
}else{
  echo "<script type='text/javascript'>
  alert('ERROR!! al iniciar sesion');
  window.location='../index.php';
  </script>";
  }
  ?>