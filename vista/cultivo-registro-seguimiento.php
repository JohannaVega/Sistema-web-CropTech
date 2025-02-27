<?php 
session_start(); 
if($_SESSION['usuario']){
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>INGRESO DATOS DE CULTIVO - croptech</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">

    <link rel="stylesheet" href="../assets/css/estilos.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" 
    crossorigin="anonymous">

    <style>
    @import url('https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap');
    </style>
    <style>
    @import url('https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&display=swap');
    </style>

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

    <!--TRAEMOS LA INFORMACION DE CULTIVOS-->
    <?php 
      require '../modelo/facade.php';
      $obj_facade = new facade();
      $cultivos2=$obj_facade->read_registros_siembra();
    ?>
        <br>
        <div class="container-lg pb-4 pt-4 "> 
            <!--FILA 1-->
            <div class="m-1 row justify-content-center">
                <!--COLUMNA 1-->
                <div class="col-auto p-5 text-center bg-light border border-success"> 
                    <div class="jumbotron">
                        <h1 class="display-5 text-success text-shadow h1">Nuevo cultivo</h1>
                        <hr>
                                <form action="../controlador/validar_cultivos.php" method="post">
                                    <h6 class="text-left h1" >Información actualizacion del cultivo:</h6>
                                    <div class="form-row row justify-content-center p-2">

                                       <!--ID DE IMAGEN-->  

                                    <!--INGRESAMOS LA CANTIDAD DE HOJAS NUEVAS-->
                                      <div class="form-row row justify-content-center p-2">
                                        <div class="form-group col-md-12">
                                        <p>Ingresamos la cantidad de hojas nuevas del cultivo:</p>
                                        <input type="number" id="cantidad_hoja_nuevas" class="form-control" name="cantidad_hojas_nuevas" required>
                                      </div>
                                      </div>
                                     
                                     <!--INGRESAMOS LOS CENTIMETROS OBTENIDOS DE LAS PLANTAS-->
                                     <div class="form-row row justify-content-center p-2">
                                        <div class="form-group col-md-12">
                                        <p>Ingresamos los centimetros de crecimiento que se han obtenido:</p>
                                        <input type="number" id="centimetros_obtenidos" class="form-control" name="centimetros_obtenidos" required>
                                      </div>
                                      </div> 
                                     
                                      <!--AGREGAMOS LOS COMENTARIOS SOBRE ESA ACTUALIZACION-->
                                      <div class="form-row row justify-content-center p-2">
                                      <div class="form-group col-md-12">
                                      <input type="text" id="comentarios" class="form-control" name="comentarios" required>
                                      </div>
                                     </div>
                                     
                                     <!--SELECCIONAMOS LA FECHA EN LA CUAL SE HACE ESE REGISTRO NUEVO DEL CULTIVO-->
                                     <div class="form-row row justify-content-center p-2">
                                            <div class="form-group col-md-4">
                                              <p>Fecha de ingreso de datos de actualizacion del cultivo:</p>
                                              <input type="date" id="fecha_registro" class="form-control" name="fecha_registro" required>
                                            </div>
                                        </div>

                                     <!--ID CONDICIONES AMBIENTALES-->   
                                      

                                    <!--ELEGIMOS EL REGISTRO DE SIEMBRA AL CUAL LE AGREGAREMOS LAS NUEVAS ESPECIFICACIONES-->
                                        <div class="form-row row justify-content-center p-2">
                                            <div class="form-group col-md-4">
                                                  <label>Registro de siembra:</label>
                                                      <select class="form-select form-select mb-1" id="nro_registro_siembra" name="nro_registro_siembra" required>
                                                        <option value="0">Seleccione una opción</option>
                                                        <?php for($i=0; $i<count($cultivos2); $i++){ ?>
                                                        <option value="<?php echo $cultivos2[$i]['id_cultivo']; ?>"><?php echo $cultivos2[$i]['nombre_cultivo']; ?></option>
                                                        <?php } ?>
                                                      </select>
                                            </div>
                                        </div>
                                       
                                    
                                        <div  id="error">
                                            <?php 
                                            if(isset($_GET['iderror'])){
                                                if($_GET['iderror'] == 'ok'){
                                                ?>
                                                <script>
                                                alert("Cultivo nuevo registrado correctamente"); 
                                                </script>
                                                <p style="color:green;" >Actualizacion del cultivo registrada correctamente</p>
                                                <?php
                                                }
                                                
                                                if($_GET['iderror'] == 'bad'){
                                                ?>
                                                <script>
                                                alert("Error en el sistema, vuelva a intentarlo mas tarde"); 
                                                </script>
                                                <p style="color:red;" >Error en el sistema, vuelva a intentarlo mas tarde</p>
                                                <?php
                                                }     
                                            }
                                            ?>
                                        </div>
                                        <div class="form-row row justify-content-center p-2">
                                            <div class="form-group col-md-8">
                                              <button type="submit" value="ACTUALIZAR_C" name="actualizar_c" class="btn btn-outline-secondary btn-lg" 
                                              onclick="return validarActualizacionC();">Actulizar registro de cultivo</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                    </div>  
                </div>
                <!--FIN COLUMNA 1-->

                <!--SECCIÓN CAJA TRASERA-->
                <div class="col ">
                    <div class="caja_trasera"> 
                        <div>
                            <h1 id="name" class="text-center text-white text-shadow">CropTech - Cultivo</h1>
                            <hr>
                            <br>
                            <h3 class="pt-5">Hola, </h3>
                            <p >En esta sección puedes agregar un cultivo seleccionando entre las opciones que
                            que te presentamos. </p>
                        <div>
                    </div>
                </div>
                <!--FIN SECCIÓN CAJA TRASERA-->
            </div>
            <!--FIN FILA 1-->

        </div>
            
        </div>
        </div>
        <script src="../js/validaciones_form.js"></script>
        <hr>
        <div class="p-3" id="separator-ribbon">
            <div class="bg-light">     
              <h4 class="text-center pb-3 pt-3"></h4>
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