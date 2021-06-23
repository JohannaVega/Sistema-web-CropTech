<?php 
session_start(); 
if($_SESSION['usuario']){
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Desactivar cuenta - CropTech</title>

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

    <?php 
      $idu=$_SESSION['usuario']; //la varible int es un entero
      require '../modelo/facade.php';
      $fac=new facade();
      $rol=$fac-> read_rol_byId($idu);
      
      //SI ES UN CULTIVADOR, MOSTRAMOS MODULO CULTIVADOR
      if($rol==1){
          ?>
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
                      <li class="nav-item"><a class="nav-link" 
                      href="http://localhost/proyecto_grado/croptech/vista/user_shops.php" >Proveedores</a></li>
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
        //SI ES UN PROVEEDOR, MOSTRAMOS MODULO PROVEEDOR
      }else if($rol==2){
        ?>
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
                        href="http://localhost/proyecto_grado/croptech/vista/proveedor_inicio.php">Inicio</a> </li>
                        <li class="nav-item"><a class="nav-link active" aria-current="page" 
                        href="http://localhost/proyecto_grado/croptech/vista/proveedor_registrar.php">Registrar tienda</a> </li>
                        <li class="nav-item"><a class="nav-link " aria-current="page" 
                        href="http://localhost/proyecto_grado/croptech/vista/proveedor_mishop.php">Tu tienda</a> </li>
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
        //SI ES UN ADMINISTRADOR, MOSTRAMOS MODULO ADMINISTRADOR
      } else if ($rol==3){
        ?>
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
        <?php
      }
      ?>

      <div class="container-lg pb-4 pt-4 "> 
            <!--FILA 1-->
            <div class="m-1 row justify-content-center">
                <!--COLUMNA 1-->
                <div class="col-auto p-5 text-center bg-light border border-success"> 
                    <div class="jumbotron">
                        <h1 class="display-5 text-success text-shadow h1">Desactivar cuenta</h1>
                        <br>

                        <div id="error">
                            <?php
                            if(isset($_GET['iderror'])){
                                if($_GET['iderror'] == 'no_razon' || $_GET['iderror'] == 'no_detalles'){
                                    ?>
                                    <br>
                                    <p  style="color:red;" >No se indicó la razón por la que desea desactivar la cuenta, intentalo de nuevo</p>

                                    <?php
                                }
                                if($_GET['iderror'] == 'mensaje_ok'){
                                    ?>
                                    <br>
                                    <p  style="color:green;" >Mensaje enviado al E-Mail del admon</p>

                                    <?php
                                }
                                if($_GET['iderror'] == 'mensaje_bad'){
                                    ?>  
                                    <br>
                                    <p  style="color:red;" >Mensaje no enviado al E-Mail del admon</p>
                                    <?php
                                }           
                            }
                            ?>
                        </div>
                        <hr>
                        <!--FORMULARIO DATOS-->
                        <form action="../controlador/validar_updates.php" method="post">
                            <div class="form-row row justify-content-center p-2">
                                <div class="form-group col-md-12" >
                                    <label>Cuéntanos las razones por las que deseas desactivar tu cuenta:</label>
                                    
                                    <select class="form-select" id="descripcion" name="descripcion" required>
                                        <option value="0">Selecciona una opción</option>
                                        <option value="1">Ya tengo otra cuenta</option>
                                        <option value="2">No me parece útil esta plataforma</option>
                                        <option value="3">No se como usar esta plataforma</option>
                                        <option value="4">Es algo temporal. Regresaré</option>
                                        <option value="5">Otro (Proporciona más detalles)</option>
                                    </select>
                                    <hr>
                                    <textarea  class="form-control"  rows="2" cols="5" 
                                        id="razon" name="razon" 
                                        placeholder="Seleccionaste otro... Danos más detalles" required> 
                                    </textarea>
                                </div>
                            </div>

                            <input type="hidden" name="idu" value='<?php echo $idu; ?>'>
                            <input type="hidden" name="tipo" value='<?php echo 1; ?>'>
                            <hr>
                            <button class="btn btn-danger p-2" value="DESACTIVAR_USER" name="user_edit"
                            onclick="return validar_desactivarU();" type="submit">DESACTIVAR </button>

                        </form>
                        <!--FORMULARIO DATOS-->

                    </div>

                </div>
                 <!--FIN COLUMNA 1-->

                <!--SECCIÓN CAJA TRASERA-->
                <div class="col ">
                    <div class="caja_trasera"> 
                        <div>
                            <h1 id="name" class="text-center text-white text-shadow">CropTech - Gestión usuarios</h1>
                            <hr>
                            <br>
                            <p >¿Estás seguro que deseas desactivar tu cuenta de usuario?
                            Cuéntanos las razones por las que deseas desactivar tu cuenta, clickea en desactivar y
                            se enviará una notificación que será evaluada por el administrador 
                            del sistema, te enviaremos una respuesta de confirmación a tu cuenta de correo en  
                            un transcurso de 24 horas. </p>
                        <div>
                    </div>
                </div>
                <!--FIN SECCIÓN CAJA TRASERA-->
            </div>
            <!--FIN FILA 1-->
        </div>
        </div>
        </div>

        <hr>
        <!--CONTEINER SEPARADOR RIBBON-->
        <div class="p-3" id="separator-ribbon">
            <div class="bg-light">     
                <h4 class="text-center pb-3 pt-3"></h4>
             </div>
        </div>
        <!--FIN CONTEINER SEPARADOR RIBBON-->

        <?php  require "../footer.php"; ?>

        <!--COMPLEMENTOS BOOTSTRAP-->
        <script src="../assets/js/validaciones_form.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" 
                integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" 
                crossorigin="anonymous">
            </script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" 
                integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" 
                crossorigin="anonymous">
            </script>
        <!--FIN COMPLEMENTOS BOOTSTRAP-->

        <script src="../js/validaciones_form.js"></script>
    
</body>
</html>

<?php
}
?>