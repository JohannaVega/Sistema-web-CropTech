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

        <style>
            @import url('https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap');
        </style>
        <style>
            @import url('https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&display=swap');
        </style>

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
                href="http://localhost/proyecto_grado/croptech/vista/cultivos-activos.php">Mis cultivos</a></li>
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
            require '../modelo/facade.php';
            $idu=$_SESSION['usuario'];

            $obj_1=new facade();
            $exist=$obj_1-> validar_cultivos_user($idu);

            $obj_2=new facade();
            $resul=$obj_2-> read_cultivos_user($idu);


        ?>
             
             <div class="m-1 row justify-content-center">
                <div class="col-auto p-3 text-center ">
                    <h1 class="display-5 text-success text-shadow h1">Hecha un vistazo a tus cultivos !!</h1>
                    <hr>
                </div>
            </div>

             <div class="container-lg "> 
                <div class="m-1 row justify-content-center">
                <div class="col-auto p-5 text-center bg-light border border-success">
                <h1>Historial de tus cultivos</h1>
                    <hr>
                    <div class="m-1 row justify-content-center">
                <div class="col-auto text-center ">

                <?php
                if(isset($_GET['iderror'])){
                    ?>
                    <?php
                    if ($_GET['iderror']=='bad'){
                        ?>
                        <p  style="color:red;" >Error al registrar los datos ingresados, intentalo más tarde</p>
                        <?php
                    }else if ($_GET['iderror']=='ok'){
                        ?>
                        <p  style="color:green;" >Registro de datos exitoso</p>
                        <div id="passwordHelpBlock" class="form-text">
                            Si desea ver los datos registrados, seleccione la opción ver datos (La lupa) del cultivo recien actualizado.
                        </div>
                        <?php
                    }else if ($_GET['iderror']=='ext'){
                        ?>
                        <p  style="color:red;" >Extesión de archivo no valido, vuelva a realizar el registro</p>
                        <?php
                    }else if ($_GET['iderror']=='tam'){
                        ?>
                        <p  style="color:red;" >Tamaño de la imagen  excede límite permitido, vuelva a realizar el registro</p>
                        <?php
                    }else if ($_GET['iderror']=='amb_bad'){
                        ?>
                        <p  style="color:red;" >Error al registrar datos ambientales, vuelva a realizar el registro</p>
                        <?php
                    }else if ($_GET['iderror']=='img_bad'){
                        ?>
                        <p  style="color:red;" >Error al registrar imagen, intentelo más tarde</p>
                        <?php
                    }else if ($_GET['iderror']=='server'){
                        ?>
                        <p  style="color:red;" >Error al cargar imagen, intentelo más tarde</p>
                        <?php
                    }else if ($_GET['iderror']=='img'){
                        ?>
                        <p  style="color:red;" >Error al guardar datos de la imagen, intentelo más tarde</p>
                        <?php
                    }else if ($_GET['iderror']=='isNull'){
                        ?>
                        <p  style="color:red;" >Error en el envio de datos, intentelo más tarde</p>
                        <?php
                    }else{
                        ?>
                        <p  style="color:red;" ><?php echo 'kol '.$_GET['iderror'] ;?></p>
                        <?php
                    }
                }
                ?>
                <hr>
                </div>
            </div>
                    
                <?php
                if($exist=='exist'){//se muestran los cultivos registrados
                ?>
                <!--Tabla con los cultivos registrados-->
                <div class="table-responsive">
                        <table id="tmedicos" class="table table-striped table-light">
                            <thead>
                                <tr>
                                <th scope="col">Nombre cultivo</th>
                                <th scope="col">Fecha de registro</th>
                                <th scope="col">Estado</th>
                                
                                <th scope="col"></th>
                                <th scope="col"></th>
                                <th scope="col"></th>
                                
                                </tr>
                            </thead>
                            <tbody>
                                <?php for($i=0;$i<count($resul);$i++){?>
                                <tr>
                                <td><?php echo $resul[$i]['nombre_cultivo'];?></td>
                                <td><?php echo $resul[$i]['fecha_siembra'];?></td>
                                <td><?php echo $resul[$i]['estado'];?></td>

                               
                                <td> <a href="http://localhost/proyecto_grado/croptech/vista/admon_editUP.php?idSiembra=<?php echo $resul[$i]['nro_registro_siembra'];?>"
                                class="btn btn-outline-success"  title="Ver datos del cultivo">
                                <img src="http://localhost/proyecto_grado/croptech/assets/img/ver.png" alt="Editar" id="icono" height="30px" width="30px"></a></td>
                                <?php
                                if($resul[$i]['estado'] != 'Desactivo'){
                                    ?>
                                    <td>
                                        <a href="http://localhost/proyecto_grado/croptech/vista/cultivo_condiciones_ambientales.php?idSiembra=<?php echo $resul[$i]['nro_registro_siembra'];?>"
                                        class="btn btn-outline-success" title="Actualizar datos del cultivo">
                                        <img src="http://localhost/proyecto_grado/croptech/assets/img/actualizar.png" alt="Editar" id="icono" height="30px" width="30px"></a>
                                    </td>
                                    <td>
                                        <a href="http://localhost/proyecto_grado/croptech/vista/cultivo_desactivar.php?idc=<?php echo $resul[$i]['nro_registro_siembra'];?>&accion=delete"
                                            class="btn btn-outline-success" title="Desactivar cultivo">
                                        <img src="http://localhost/proyecto_grado/croptech/assets/img/delete.png" 
                                        alt="Editar" id="icono" height="30px" width="30px"></a>
                                    </td>

                                <?php
                                }
                                
                                
                                } ?>
                                </tr>
                            
                            </tbody>
                        </table>
    
                    </div>
                <br><br>
                    <!--Fin de la tabla-->
            
                <?php } else if ($exist=='no_exist')
                { ?>
                    <!--Mostramos mensaje (no tiene registro de cultivos)-->
                    
                    <div class="container">
                        <div class="row justify-content-center">
                            <h1>¡Aún no has registrado tu primer cultivo!</h1>
                        </div>

                        <div class="row justify-content-center">
                            <div class="col-auto text-center">
                                <img src="http://localhost/proyecto_grado/croptech/assets/img/huert.gif" alt="Heyy"  height="200px" width="200px"></a>
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