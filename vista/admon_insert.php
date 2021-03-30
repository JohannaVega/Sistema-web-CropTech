<?php 
/*session_start(); 
if($_SESSION['usuario']){*/
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

        <div class="m-1 row justify-content-center">
            <div class="col-auto p-5 text-center bg-light border border-success"> 
        <div class="jumbotron">
        <h3 class="display-5 text-success text-shadow h1">Nuevo Usuario</h3>
        <hr>
                    <form action="../controlador/validarlogin.php" method="post">
                    <h6 class="text-left h1" >Datos Personales:</h6>
                    <div class="form-row row justify-content-center p-2">
                    
                    <div class="form-group col-md-12">
                        <input type="text" id= "pnombre" name="pnombre" class="form-control" placeholder="Nombres" required>
                    </div>
                    </div>
                    <div class="form-row row justify-content-center p-2">
                    <div class="form-group col-md-12">
                    <input type="text" id="sapellido" class="form-control" name="sapellido" placeholder="Apellidos" required>
                    </div>
                    </div>
                    <div class="form-row row justify-content-center p-2">
                    <div class="form-group col-md-12">
                    <select class="form-select form-select-lg mb-1" id="sexo" name="sexo" required>
                    <option value="0">Sexo</option>
                    <option value="Masculino">Masculino</option>
                    <option value="Femenino">Femenino</option>
                    </select>
                    </div>
                    </div>
                    
                    <h5 align="left">Datos de sesion: </h5>
                    <div class="form-row row justify-content-center p-2">
                    <div class="form-group col-md-12">
                    <input type="mail" class="form-control" id="correo" name="correo" placeholder="Correo">
                    </div>
                    </div>
                    <div class="form-row row justify-content-center p-2">
                    <div class="form-group col-md-12">
                    <input type="number" id="telefono" class="form-control" name="telefono" min="3000000000" max="3999999999" placeholder="Telefono" required>
                    </div>
                    </div>
                    <div class="form-row row justify-content-center p-2">
                    <div class="form-group col-md-12">
                    <input type="password" class="form-control" id="pass1" name="pass1" placeholder="Clave" required>
                    <div id="passwordHelpBlock" class="form-text">
                    La contraseña debe tener: 6-16 caracteres, letras y numeros, al menos una mayúscula y una minúscula.
                    </div>
                    </div>
                    </div>
                    <div class="form-row row justify-content-center p-2">
                    <div class="form-group col-md-12">
                    <input type="password" class="form-control" id="pass2" name="pass2" placeholder="Verifique clave" required>
                    </div>
                    </div>
                    <div class="form-row row justify-content-center p-2">
                    <div class="form-group col-md-12" >
                    <select class="form-select form-select-lg mb-1" id="ask" name="ask" required>
                    <option value="0">Pregunta de seguridad</option>
                    <option value="1">Nombre se su primer mascota</option>
                    <option value="2">Direccion de su primer lugar de residencia</option>
                    <option value="3">Nombre mejor amigo de la infancia</option>
                    <option value="4">Nombre de su localidad de residencia</option>
                    <option value="5">Color de su camisa favorita</option>
                    </select>
                    </div>
                    </div>
                    
                    <div class="form-row row justify-content-center p-2">
                    <div class="form-group col-md-12" >
                    <input type="password" class="form-control" id="answer" name="answer" placeholder="Respuesta" required>
                    </div>
                    </div>
                    <div align="center" id="error">
                    <?php 
                    if(isset($_GET['iderror'])){
                        if($_GET['iderror'] == 'ok'){
                        ?>
                         <script>
                        alert("Usuario registrado correctamente"); 
                         </script>
                        <p align="center" style="color:green;" >Usuario Ingresado correctamente</p>
                        <?php
                        }
                        if($_GET['iderror'] == 'a'){
                        ?>
                        <script>
                        alert("La clave debe tener al menos 6 caracteres"); 
                         </script>
                        <p align="center" style="color:red;" >La clave debe tener al menos 6 caracteres</p>
                        <?php
                        }
                        if($_GET['iderror'] == 'b'){
                        ?>
                        <script>
                        alert("La clave no puede tener más de 16 caracteres"); 
                         </script>
                        <p align="center" style="color:red;" >La clave no puede tener más de 16 caracteres</p>
                        <?php
                        }
                        if($_GET['iderror'] == 'c'){
                        ?>
                        <script>
                        alert("La clave debe tener al menos una letra minúscula"); 
                         </script>
                        <p align="center" style="color:red;" >La clave debe tener al menos una letra minúscula</p>
                        <?php
                        }
                        if($_GET['iderror'] == 'd'){
                        ?>
                        <script>
                        alert("La clave debe tener al menos una letra mayúscula"); 
                         </script>
                        <p align="center" style="color:red;" >La clave debe tener al menos una letra mayúscula</p>
                        <?php
                        }
                        if($_GET['iderror'] == 'e'){
                        ?>
                        <script>
                        alert("La clave debe tener al menos un caracter numérico"); 
                         </script>
                        <p align="center" style="color:red;" >La clave debe tener al menos un caracter numérico</p>
                        <?php
                        }
                        if($_GET['iderror'] == '1'){
                        ?>
                        <p align="center" style="color:red;" >Error en el sistema, vuelva a intentarlo mas tarde</p>
                        <?php
                        }
                        if($_GET['iderror'] == '2'){
                        ?>
                        <script>
                        alert("El telefono ingresado, ya registrado en el sistema"); 
                        </script>
                        <p align="center" style="color:red;" >El telefono ingresado, ya registrado en el sistema</p>
                        <?php
                        }
                        if($_GET['iderror'] == '3'){
                        ?>
                        <script>
                        alert("No selecciono sexo, vuelva a llenar el formualrio"); 
                        </script>
                        <p align="center" style="color:red;" >No selecciono sexo, vuelva a llenar el formualrio</p>
                        <?php
                        }
                        if($_GET['iderror'] == '4'){
                        ?>
                        <script>
                        alert("No selecciono pregunta, vuelva a llenar el formulario"); 
                        </script>
                        <p align="center" style="color:red;" >No selecciono pregunta, vuelva a llenar el formulario</p>
                        <?php
                        }
                        if($_GET['iderror'] == '5'){
                        ?>
                        <script>
                        alert("El email ingresado ya esta registrado en el sistema"); 
                        </script>
                        <p align="center" style="color:red;" >El email ingresado ya esta registrado en el sistema</p>
                        <?php
                        }
                        if($_GET['iderror'] == '6'){
                        ?>
                        <script>
                        alert("Las contraseñas ingresadas no son iguales"); 
                        </script>
                        <p align="center" style="color:red;" >Las contraseñas ingresadas no son iguales</p>
                        <?php
                        }
                        
                    }
                    ?>
                    </div>
                    <button type="submit" value="CREAR_U" name="edit_admon" class="btn btn-outline-secondary btn-lg" onclick="return validar_insertU();">CREAR USUARIO</button>
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
<?php /*}else{
    echo "<script type='text/javascript'>
    alert('ERROR!! al iniciar sesion');
    window.location='../index.php';
    </script>";
}*/?>