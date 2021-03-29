<?php 
session_start(); 
if($_SESSION['usuario']){
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuarios - croptech</title>
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
        <li class="nav-item"><a class="nav-link" aria-current="page" 
        href="http://localhost/proyecto_grado/croptech/vista/admon_inicio.php">Inicio</a> </li>
        <li class="nav-item"><a class="nav-link active " 
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

        <?php require '../modelo/facade.php';
            $obj=new facade();
            $resul=$obj->readAllUsuarioFull();
        ?>
    <br>
    <div class="container"> 
    <div class="m-1 row justify-content-center">
        <div class="col-auto p-5 text-center bg-light border border-success">
        <h3 class="display-5 text-success text-shadow h1">Usuarios</h3>
        <hr>
        <a href="http://localhost/proyecto_grado/croptech/vista/admon_insert.php" 
        class="btn btn-outline-success">Usuario nuevo</a>
        <br>
        <br>
        <div align="center" id="error">
        <?php
        if(isset($_GET['iderror'])){
        if($_GET['iderror'] == 'ok'){
                    ?>
                    <p align="center" style="color:green;" >Registro actualizado correctamente</p>
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
        if($_GET['iderror'] == 'ok1'){
                    ?>
                    <p align="center" style="color:green;" >Contraseña actualizada correctamente</p>
                    <?php
                    }
        if($_GET['iderror'] == '1' || $_GET['iderror'] == '2' || $_GET['iderror'] == '3'){
                    ?>
                    <p align="center" style="color:red;" >Las contraseñas ingresadas no son iguales y/o no contienen numeros y/o mayusculas</p>
                    <?php
                    }
        if($_GET['iderror'] == 'ok2'){
                    ?>
                    <p align="center" style="color:green;" >Registro eliminado correctamente</p>
                    <?php
                    }
        if($_GET['iderror'] == 'bad2'){
                    ?>
                    <p align="center" style="color:red;" >Error al eliminar el registro</p>
                    <?php
                    }
                    }?>
        </div>
        <div class="table-responsive">
        
    <table id="tmedicos" class="table table-striped table-dark">
    <thead>
        <tr >
        <th scope="col">Id</th>
        <th scope="col">Nombres</th>
        <th scope="col">Apellidos</th>
        <th scope="col">Sexo</th>
        <th scope="col">Telefono</th>
        <th scope="col">Correo</th>
        <th scope="col">Pregunta de seguridad:</th>
        <th scope="col"></th>
        <th scope="col"></th>
        <th scope="col"></th>
        
        </tr>
        </thead>
        <tbody>
        <?php for($i=0;$i<count($resul);$i++){?>
        <tr>
        <td><?php echo $resul[$i]['id_usuario'];?></td>
        <td><?php echo $resul[$i]['nombre'];?></td>
        <td><?php echo $resul[$i]['apellido'];?></td>
        <td><?php echo $resul[$i]['sexo'];?></td>
        <td><?php echo $resul[$i]['telefono'];?></td>
        <td><?php echo $resul[$i]['correo'];?></td>
        <td><?php echo $resul[$i]['pregunta'];?></td>

        <!--editar datos-->
        <td> <a href="http://localhost/proyecto_grado/croptech/vista/admon_editUP.php?idu=<?php echo $resul[$i]['id_usuario'];?>"
        class="btn btn-outline-success">
        <img src="http://localhost/proyecto_grado/croptech/assets/img/edit-p.png" alt="Editar" id="icono" height="30px" width="30px"></a></td>
        <!--editar contraseña-->
        <td><a href="http://localhost/proyecto_grado/croptech/vista/admon_editUD.php?idu=<?php echo $resul[$i]['id_usuario'];?>"
        class="btn btn-outline-success">
        <img src="http://localhost/proyecto_grado/croptech/assets/img/edit-d.png" alt="Editar" id="icono" height="30px" width="30px"></a></td>
        <td>
        <a href="http://localhost/proyecto_grado/croptech/controlador/validar_updates.php?idu=<?php echo $resul[$i]['id_usuario'];?>&accion=delete"
             class="btn btn-outline-success">
        <img src="http://localhost/proyecto_grado/croptech/assets/img/delete.png" 
        alt="Editar" id="icono" height="30px" width="30px"></a></td>
        <?php } ?>
        </tr>
    
        </tbody>
        </table>
        
        <br><br>
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