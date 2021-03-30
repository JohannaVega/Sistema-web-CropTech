<?php 
session_start(); 
if($_SESSION['usuario']){
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title> Historial de cultivos - CropTech </title>
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link rel="stylesheet" href="../assets/css/estilos.css">

        <link rel="stylesheet" href="https://unpkg.com/leaflet@1.5.1/dist/leaflet.css"
        integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ=="
        crossorigin="" />


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

     <!--Boton que se muestra cuando 
     disminuyan las dimensiones del ancho de pantalla
    id del navbar= "navbarSupportedContent"-->
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <!--La clase colapsa los elementos del nav-->
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item"><a class="nav-link " aria-current="page" 
        href="http://localhost/proyecto_grado/croptech/vista/user_inicio.php">Inicio</a> </li>
        <li class="nav-item"><a class="nav-link" 
        href="http://localhost/proyecto_grado/croptech/vista/user_perfil.php">Perfil</a></li>
        <li class="nav-item">
        <a class="nav-link active" 
        href="http://localhost/proyecto_grado/croptech/vista/cultivo-historial.php">Mis cultivos</a></li>
      </ul>

      <form class="d-flex">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
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
        <?php require '../modelo/facade.php';
            $obj=new facade();
            $idu=$_SESSION['usuario'];
            $resul=$obj->read_cultivos($idu);
        ?>
             <hr>
            <div class="pt-2 pl-5 pr-5">
            <div >     
            <h3 class="text-center pb-3 pt-3">Hecha un vistazo a tus cultivos !!</h3></div>
            </div>
            </div>
            <hr>
            

             <div class="container"> 
             <div class="m-1 row justify-content-center">
             <div class="col-auto p-5 text-center bg-light border border-success">
             <h3 class="display-5 text-success text-shadow h1">Historial de tus cultivos</h3>
                <hr>
                
             <?php
             if(($exist=$obj->read_cultivosbyUser($idu))=='si'){//se muestran los cultivos registrados
             ?>
             <!--Tabla con los cultivos registrados-->
               <div class="table-responsive">
                    <table id="tmedicos" class="table table-striped table-light">
                        <thead>
                            <tr>
                            <th scope="col">Nombre cultivo</th>
                            <th scope="col">Fecha de registro</th>
                            
                            <th scope="col"></th>
                            <th scope="col"></th>
                            <th scope="col"></th>
                            
                            </tr>
                        </thead>
                        <tbody>
                            <?php for($i=0;$i<count($resul);$i++){?>
                            <tr>
                            <td><?php echo $resul[$i]['nombre_cultivo'];?></td>
                            <td><?php echo $resul[$i]['fecha_registro'];?></td>

                            <!--editar datos-->
                            <td> <a href="http://localhost/proyecto_grado/croptech/vista/admon_editUP.php?idu=<?php echo $resul[$i]['id_usuario'];?>"
                            class="btn btn-outline-success"  title="Ver datos del cultivo">
                            <img src="http://localhost/proyecto_grado/croptech/assets/img/ver.png" alt="Editar" id="icono" height="30px" width="30px"></a></td>
                            <!--editar contraseña-->
                            <td><a href="http://localhost/proyecto_grado/croptech/vista/admon_editUD.php?idu=<?php echo $resul[$i]['id_usuario'];?>"
                            class="btn btn-outline-success" title="Actualizar datos del cultivo">
                            <img src="http://localhost/proyecto_grado/croptech/assets/img/actualizar.png" alt="Editar" id="icono" height="30px" width="30px"></a></td>
                            <td>
                            <a href="http://localhost/proyecto_grado/croptech/controlador/validar_updates.php?idu=<?php echo $resul[$i]['id_usuario'];?>&accion=delete"
                                class="btn btn-outline-success" title="Eliminar cultivo">
                            <img src="http://localhost/proyecto_grado/croptech/assets/img/delete.png" 
                            alt="Editar" id="icono" height="30px" width="30px"></a></td>
                            <?php } ?>
                            </tr>
                        
                        </tbody>
                    </table>
 
                </div>
            <br><br>
                <!--Fin de la tabla-->
        
             <?php } 
             ?>
             <?php
             if(($exist=$obj->read_cultivosbyUser($idu))=='no')
             { ?>
                <!--Mostramos mensaje (no tiene registro de cultivos)-->
                
                  <div class="container">
                    <div class="m-1 row justify-content-center">
                        <h3 class="text-center pb-5 pt-5 h1">¡Aún no tienes cultivos registrados!</h3>
                    </div>

                        <div class="m-1 row justify-content-center">
                        <div class="col-auto p-5 text-center">
                        <img src="http://localhost/proyecto_grado/croptech/assets/img/sad.png" alt="sad"  height="100px" width="100px"></a></td>
                        </div>
                        </div>
                 </div>
                <?php } ?>
                </div>
            </div>
            </div>

                <!--Fin mensaje-->
             <!--Fin conteiner donde de muestra el registro de cultivos-->
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
            } ?>       