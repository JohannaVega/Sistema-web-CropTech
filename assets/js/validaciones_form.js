
 
 var expfecha, expnum ;
 var expfecha = /^([0-9]{4})\-([0-9]{2})\-([0-9]{2})$/;
 var expnum=/^([0-9])*$/;
 var exptelefono=/^\d{10}$/;
 var exptelefono1=/^\d{7}$/;
 var expnumbers=/^([0-9])*$/;
 var expespacio= /^\s+$/;//valida espacios en blanco
 var expCorreo=/\w+@\w+\.+[a-z]/;
 var expURL=/^https?:\/\/[\w\-]+(\.[\w\-]+)+[/#?]?.*$/;
 var exptext=/^[a-zA-ZÀ-ÿ\u00f1\u00d1]+(\s*[a-zA-ZÀ-ÿ\u00f1\u00d1]*)*[a-zA-ZÀ-ÿ\u00f1\u00d1]+$/g;//valida solo txt
 var exptextsin_= /^[a-zA-ZÀ-ÿ\u00f1\u00d1]+[a-zA-ZÀ-ÿ\u00f1\u00d1][a-zA-ZÀ-ÿ\u00f1\u00d1]+$/;//valida txt sin espacios


function validarEditC() {
    var fecha, hora;
    fecha = document.getElementById("fecha").value;
    hora = document.getElementById("hora").value;
  
   if(!expfecha.test(fecha)){
    alert("Formato de fecha incorrecto: "+fecha);
    return false;
   }
   if(!expnum.test(hora)){
    alert("Formato de hora incorrecto");
    return false;
   }
}
   //Validan los campos de input cuando se registra un usuario nuevo
   function validar_insertU() { 
    var nombres,apellidos,sexo,correo,telefono,contra,contra2,ask,answer,
        tipo_telefono,tipo_telefono2;

        nombres = document.getElementById("pnombre").value;
        apellidos = document.getElementById("sapellido").value;
        sexo = document.getElementById("sexo").value;
        correo = document.getElementById("correo").value;
        tipo_telefono = document.getElementById("tipo_telefono").value;
        tipo_telefono2 = document.getElementById("tipo_telefono2").value;
        telefono = document.getElementById("telefono").value;
        telefono2 = document.getElementById("telefono2").value;
        contra = document.getElementById("pass1").value;
        contra2 = document.getElementById("pass2").value;
        ask = document.getElementById("ask").value;
        answer = document.getElementById("answer").value;
    
        
    if(nombres===""|| apellidos===""|| sexo===""|| correo===""  || telefono==="" || 
      tipo_telefono=="" || tipo_telefono2=="" || contra==="" || contra2==="" || ask==="" || answer===""){
      alert("Por favor rellene los campos obligatorios ");
      return false;
    }
    if(expespacio.test(nombres.value) || expespacio.test(apellidos.value) || expespacio.test(sexo.value) ||
     expespacio.test(correo.value) || expespacio.test(telefono.value) || expespacio.test(telefono2.value)
     || expespacio.test(contra.value) ||  expespacio.test(contra2.value) || expespacio.test(ask.value) ||
      expespacio.test(answer.value)){
      alert("Datos no validos (No se permiten espacios en blanco)");
      return false;
    }
    if( (expnumbers.test(nombres)) || nombres.length>100){
      alert("Nombres invalidos");
      return false;
    }
    if( (expnumbers.test(apellidos)) || apellidos.length>100){
      alert("Apellidos invalidos");
      return false;
    }
    if(tipo_telefono == '0' && tipo_telefono>1){
      alert("No seleccionó tipo de teléfono no.1 o seleccion no valida");
      return false;
    }
     if((telefono.length || telefono2.length)>10){
      alert("Telefonos invalidos, no pueden contener más de 10 números");
      return false;
     }
    if((contra.length || contra2.length)>16){
      alert("Contraseña superó el límite de caracteres");
      return false;
    }

    if((ask.length || answer.length)>100){
      alert("Pregunta o respuesta superó el límite de caracteres");
      return false;
    }
    if(!expCorreo.test(correo) || corrreo.length>60){
      alert("Correo no valido");
      return false;
    }

   }
   //-------------------------------------------------------------------------------------------//


   //Validan los campos de input cuando se registra un cultivo nuevo
   function validarInsertC(){
    var nombre_cultivo,fecha_registro;
    nombre_cultivo = document.getElementById("cnombre").value;
    fecha_registro = document.getElementById("fecha_registro").value;

    if(nombre_cultivo===""|| fecha_registro===""){
      alert("Por favor rellene los campos obligatorios ");
      return false;
    }
    if(expespacio.test(nombre_cultivo.value) || expespacio.test(fecha_registro.value)){
      alert("Datos no validos (No se permiten espacios en blanco)");
      return false;
    }
    if((!/^[a-zA-ZÀ-ÿ\u00f1\u00d1]+(\s*[a-zA-ZÀ-ÿ\u00f1\u00d1]*)*[a-zA-ZÀ-ÿ\u00f1\u00d1]+$/g.test(nombre_cultivo)
     || nombre_cultivo.length>100)){
      alert("Nombre de cultivo invalido");
      return false;
     }
     if(!expfecha.test(fecha_registro)){
      alert("Formato de fecha invalido");
      return false;
    }
   }
  //-------------------------------------------------------------------------------------------//

  //Validaremos los campos input cuando registraremos una nueva actualizacion a un cultivo
  function validarActualizacionC(){
    var cantidad_hojas_nuevas,centimetros_obtenidos,fecha_registro;
    cantidad_hojas_nuevas = document.getElementById("cantidad_hojas_nuevas").value;
    centimetros_obtenidos = document.getElementById("centimetros_obtenidos").value;
    fecha_registro = document.getElementById("fecha_registro").value; 

      if(cantidad_hojas_nuevas===""|| centimetros_obtenidos=="" ||fecha_registro===""){
        alert("Por favor rellene los campos obligatorios ");
        return false;
      }
      if(expespacio.test(cantidad_hojas_nuevas.value)||exespacio.test(centimetros_obtenidos.value)|| expespacio.test(fecha_registro.value)){
        alert("Datos no validos (No se permiten espacios en blanco)");
        return false;
      }
      if((cantidad_hojas_nuevas.length)>3){
        alert("Cantidad de hojas invalido");
        return false;
      }
      if((centimetros_obtenidos.length)>3){
        alert("Cantidad de centimetros obtenidos en crecimiento invalido");
        return false;
      }
     if(!expfecha.test(fecha_registro)){
      alert("Formato de fecha invalido");
      return false;
      }
  }
  //-------------------------------------------------------------------------------------------//


   //Validan los campos de input cuando se registra una tienda 
   function validarinsertT(){
    var name_shop,address,descripcion;
    name_shop = document.getElementById("name_shop").value;
    address = document.getElementById("address").value;
    address_web = document.getElementById("address_web").value;
    descripcion = document.getElementById("descripcion").value;

    if(name_shop===""|| descripcion==="" || address===""){
      alert("Por favor rellene todos campos son obligatorios ");
      return false; 
    }
    if(expespacio.test(name_shop.value) || expespacio.test(descripcion.value) || expespacio.test(address.value)){
      alert("Datos no validos (No se permiten espacios en blanco)");
      return false;
    }

    if((!/^[a-zA-ZÀ-ÿ\u00f1\u00d1]+(\s*[a-zA-ZÀ-ÿ\u00f1\u00d1]*)*[a-zA-ZÀ-ÿ\u00f1\u00d1]+$/g.test(name_shop)
     || name_shop.length>100)){
      alert("Nombre del establecimiento invalido");
      return false;
     }
     if(expnumbers.test(descripcion) || expnumbers.test(name_shop)){
      alert("No se permite ingresar solo numeros en los campos descripción y nombre del establecimiento");
      return false;
     }
     if(!expURL.test(address_web)){
       alert("Solo se permiten URL como: http://www.algunlugar.com");
       return false;
     }
   }
   //-------------------------------------------------------------------------------------------//
   
   //Se valida que el input de desactivar usuario no este vacio
   function validar_desactivarU(){
     var descripcion;
     descripcion = document.getElementById("descripcion").value;

      if(descripcion===""){
        alert("Por favor rellene todos campos son obligatorios ");
        return false; 
      }
      if(expespacio.test(descripcion.value)){
        alert("Datos no validos (No se permiten espacios en blanco)");
        return false;
      }
   }

   //Se validan los campos de input cuando se edita un usuario
   function validarEditU(){
    let act=0;
    console.log("enviando5..");
       var nombres, apellidos, telefono, correo;
       nombres = document.getElementById("nombres").value;
       apellidos = document.getElementById('apellidos').value;
       telefono = document.getElementById("telefono").value;
       correo = document.getElementById("correo").value;

       if(nombre==="" || apellidos==="" || telefono==="" || correo==="" ){
        alert("Por favor rellene los campos obligatorios ");
        act=1;
       }
       if(expespacio.test(nombres) || expespacio.test(apellidos) || expespacio.test(telefono) || expespacio.test(correo) ){
        alert("No se permiten espacios en blanco");
        act=1;
       }

       if((!/^[a-zA-ZÀ-ÿ\u00f1\u00d1]+(\s*[a-zA-ZÀ-ÿ\u00f1\u00d1]*)*[a-zA-ZÀ-ÿ\u00f1\u00d1]+$/g.test(nombres) || nombres.length>100)){
        alert("Nombres invalidos");
        act=1;
       }
       if( !/^[a-zA-ZÀ-ÿ\u00f1\u00d1]+(\s*[a-zA-ZÀ-ÿ\u00f1\u00d1]*)*[a-zA-ZÀ-ÿ\u00f1\u00d1]+$/g.test(apellidos) || apellidos.length>100){
        alert("Apellidos invalidos");
        act=1;
       }
       if((telefono.length)>11){
        alert("Telefonos invalidos");
        return false;
       }
       if(!expCorreo.test(correo) || corrreo.length>100){
        alert("Correo no valido");
        act=1;
      }
       if(act ==1){
            return false;
        }else{
            return true;
        }
   }
   //-------------------------------------------------------------------------------------------//
   
  
   //Se validan los inputs de la contraseña a actualizar
   function validarEditPas (){  
    console.log("enviando6..");
    var pass1, pass2;
    pass1 = document.getElementById("pass1").value;
    pass2 = document.getElementById("pass2").value;

    if((pass1==="" || pass2==="")|| (pass1===null || pass2===null)){
     alert("Por favor rellene los campos obligatorios ");
     return false;
    }
    if(expespacio.test(pass1) || expespacio.test(pass2)){
     alert("No se permiten espacios en blanco");
     return false;
    }
    if((pass1.length || pass2.length)>16){
     alert("La contraseña exedió el límite de caracteres");
     return false;
    }
    if(pass1==pass2){
      alert("¡ Las contraseñas coinciden !");
      return true;
    }else{
      alert("Las contraseñas no coinciden");
     return false;
    }
   }
   //-------------------------------------------------------------------------------------------//

   function validarInsertC() {
     var idm, idp, fecha, hora;
     idm = document.getElementById("idm").value;
     idp = document.getElementById("idp").value;
     fecha = document.getElementById("fecha").value;
     hora = document.getElementById("hora").value;

     if(idm==="" || idp==="" || fecha==="" || hora==="" ){
      alert("Por favor rellene los campos obligatorios ");
      return false;
     }
     if(expespacio.test(idm) || expespacio.test(idp) || expespacio.test(fecha) || expespacio.test(hora) ){
      alert("No se permiten espacios en blanco");
      return false;
     }
     if(!expnum.test(idm) || idm.length>11){
      alert("Especialista no valido");
      return false;
     }
     if(!expnum.test(idp) || idp.length>11){
      alert("Usuario no valido");
      return false;
     }
     if(!expfecha.test(fecha)){
      alert("Fecha no valida");
      return false;
     }
     if(!expnum.test(hora)){
      alert("Hora no valida");
      return false;
     }
   }

