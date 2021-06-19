<?php
if(isset($_GET['u']) ){
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Añadir teléfono - CropTech</title>
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
                  href="http://localhost/proyecto_grado/croptech/vista/user_inicio.php">Inicio</a> </li>
                  <li class="nav-item"><a class="nav-link active" 
                  href="http://localhost/proyecto_grado/croptech/vista/user_perfil.php">Perfil</a></li>
                  <li class="nav-item"><a class="nav-link" 
                  href="http://localhost/proyecto_grado/croptech/vista/cultivos-activos.php" >Mis cultivos</a></li>
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
    $idu=$_GET['u'];
    ?>

    <!--SECCIÓN CONTENIDO-->
    <div class="container-lg pb-4 pt-4">
        <div class="m-1 row justify-content-center">
            <div class="col-auto p-5 text-center bg-light border border-success"> 
                <div class="jumbotron">
                    <h4 class="display-5 text-success text-shadow h1">Añade teléfono</h4>
                    <hr>
                    <form action="../controlador/validar_updates.php" method="POST">
                        
                    <div class="form-row row justify-content-around p-2 pt-3">
                        <div class="form-group col-md-12">
                            <label>Tipo de teléfono:</label>
                            <select class="form-select" id="tipo_telefono" name="tipo_telefono" required>
                                <option value="0">Selecciona una opción</option>
                                <option value="1">Teléfono fijo</option>
                                <option value="2">Teléfono movil</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-row row justify-content-around p-2 pt-3">
                        <div class="form-group col-md-12">
                            <label>Teléfono:</label>
                                <input type="tel" class="form-control" name="telefono"
                                aria-label="Telefono" min="1000000" max="3999999999" id="telefono" required>
                        </div>
                    </div>
                    <div class="form-row row justify-content-around p-2 pt-3">
                        <div class="form-group col-md-12">
                            <input type="hidden" name="idu" value='<?php echo $idu;?>'>
                            <button type="submit" value="ADDTEL" name="user_edit" class="btn btn-success btn-lg" 
                            onclick="return validar_insertU();" >Agregar teléfono</button>
                        </div>
                    </div>
                    <div class="form-row row justify-content-around p-2">
                        <div class="form-group col-md-12">
                            <a href="javascript:history.back()" class="btn btn-outline-dark"> Volver Atrás</a>
                            </div>
                    </div>
                    </form>
                </div>
            </div>
             <!--SECCIÓN CAJA TRASERA-->
             <div class="col ">
                <div class="caja_trasera"> 
                    <div>
                      <h1 id="name" class="text-center text-white text-shadow">CropTech - Profile</h1>
                      <hr>
                      <br>
                      <h3  class="pt-5">Hola de nuevo, </h3>
                      <p >Ingresa el tipo de teléfono a registrar ya sea teléfono fijo o movil.
                        Recuerda, solo puedes ingresar un máximo de dos números de contacto.</p>
                    <div>
                </div>
            </div>
            <!--FIN SECCIÓN CAJA TRASERA-->
        </div>
    </div>
    <!--FIN SECCIÓN CONTENIDO-->

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