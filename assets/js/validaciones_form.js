
 
 var expfecha, expnum ;
 var expfecha = /^([0-9]{4})\-([0-9]{2})\-([0-9]{2})$/;
 var expnum=/^([0-9])*$/;
 var exptelefono=/^\d{10}$/;
 var expespacio= /^\s+$/;//valida espacios en blanco
 var expCorreo=/\w+@\w+\.+[a-z]/;
 var exptext=/^[a-zA-ZÀ-ÿ\u00f1\u00d1]+(\s*[a-zA-ZÀ-ÿ\u00f1\u00d1]*)*[a-zA-ZÀ-ÿ\u00f1\u00d1]+$/g;//valida solo txt
 var exptextsin_= /^[a-zA-ZÀ-ÿ\u00f1\u00d1]+[a-zA-ZÀ-ÿ\u00f1\u00d1][a-zA-ZÀ-ÿ\u00f1\u00d1]+$/;

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
    var nombres,apellidos,sexo,correo,telefono,contra,contra2,ask,answer;

        nombres = document.getElementById("pnombre").value;
        apellidos = document.getElementById("sapellido").value;
        sexo = document.getElementById("sexo").value;
        correo = document.getElementById("correo").value;
        telefono = document.getElementById("telefono").value;
        telefono2 = document.getElementById("telefono2").value;
        contra = document.getElementById("pass1").value;
        contra2 = document.getElementById("pass2").value;
        ask = document.getElementById("ask").value;
        answer = document.getElementById("answer").value;
    
        
    if(nombres===""|| apellidos===""|| sexo===""|| correo===""  || telefono==="" || 
     contra==="" || contra2==="" || ask==="" || answer===""){
      alert("Por favor rellene los campos obligatorios ");
      return false;
    }
    if(expespacio.test(nombres.value) || expespacio.test(apellidos.value) || expespacio.test(sexo.value) ||
     expespacio.test(correo.value) || expespacio.test(telefono.value) || expespacio.test(telefono2.value)
     || expespacio.test(contra.value) ||  expespacio.test(contra2.value) || expespacio.test(ask.value) ||
      expespacio.test(answer.value)){
      alert("Datos no validos (Solo ingreso espacios)");
      return false;
    }
  
    if((!/^[a-zA-ZÀ-ÿ\u00f1\u00d1]+(\s*[a-zA-ZÀ-ÿ\u00f1\u00d1]*)*[a-zA-ZÀ-ÿ\u00f1\u00d1]+$/g.test(nombres) || nombres.length>100)){
      alert("Nombres invalidos");
      return false;
    }
    if( !/^[a-zA-ZÀ-ÿ\u00f1\u00d1]+(\s*[a-zA-ZÀ-ÿ\u00f1\u00d1]*)*[a-zA-ZÀ-ÿ\u00f1\u00d1]+$/g.test(apellidos) || apellidos.length>100){
      alert("Apellidos invalidos");
      return false;
    }
     if(!exptelefono.test(telefono)){
      alert("Teléfono muy largo o teléfono invalido");
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
      alert("Datos no validos (Solo ingreso espacios)");
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
   //Se validan los campos de input cuando se edita un usuario
  //validarEditP
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
       if(!exptelefono.test(telefono)){
        alert("Teléfono muy largo o teléfono invalido");
        act=1;
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
   function validarInsertM (){
    var pnombre, snombre, papellido, sapellido, telefono, fechanacimiento,
    sexo, id, correo, pass1, pass2, ask, answer, especialidad, descripcion;

    pnombre = document.getElementById("pnombre").value;
    snombre = document.getElementById("snombre").value;
    papellido = document.getElementById("papellido").value;
    sapellido = document.getElementById("sapellido").value;
    telefono = document.getElementById("telefono").value;
    fechanacimiento = document.getElementById("fechanacimiento").value;
    sexo = document.getElementById("sexo").value;
    id = document.getElementById("id").value;
    correo = document.getElementById("correo").value;
    pass1 = document.getElementById("pass1").value;
    pass2 = document.getElementById("pass2").value;
    ask = document.getElementById("ask").value;
    answer = document.getElementById("answer").value;
    especialidad = document.getElementById("especialidad").value;
    descripcion = document.getElementById("descripcion").value;

    if(pnombre===""|| papellido===""  || telefono==="" || fechanacimiento==="" || 
  sexo==="" || id===""  || pass1==="" || pass2==="" || ask==="" || answer==="" 
  || especialidad==="" || descripcion===""){
    alert("Por favor rellene los campos obligatorios ");
    return false;
  }
  if(!exptextsin_.test(pnombre) || !exptextsin_.test(snombre) || !exptextsin_.test(papellido) || !exptextsin_.test(sapellido) 
  || !exptextsin_.test(sexo) ){
    alert("No puede ingresar numeros ni espacios en campos que no lo requieren");
    return false;
  }

  if((ask.length || answer.length)>100 ){
    alert("Pregunta o respuesta muy larga");
    return false;
  }
  if(!exptelefono.test(telefono)){
      alert("Telefono muy largo o telefono invalido");
      return false;
  }
  if(!expfecha.test(fechanacimiento)){
      alert("Formato de fecha invalido");
      return false;
  }
  if(sexo.length>15){
    alert("Supero limite de caracteres en text sexo");
    return false;
  }
 
  if(!expnum.test(id) || id.length>11){
    alert("No. de identificacion no valido (solo se aceptan numeros)");
    return false;
  }
  if(!expCorreo.test(correo) || corrreo.length>100){
    alert("Correo no valido");
    return false;
  }
  if(pnombre.length>50 || snombre.length>50  || papellido.length>50|| sapellido.length>50){
    alert("Nombres o apellidos muy largos");
    return false;
  }
  if(!exptext.test(especialidad) || especialidad.length>100){
    alert("Datos de especialidad no validos o supera el lim" );
    return false;
  }
  if(descripcion.length>100){
    alert("Descripcion especialidad supera el lim" );
    return false;
  }
   }
   function validarEditM (){
    var nombre, apellido, telefono, fechanacimiento, especialidad,descripcion;
    nombre = document.getElementById("nombre").value;
    apellido = document.getElementById("apellido").value;
    telefono = document.getElementById("telefono").value;
    fechanacimiento = document.getElementById("fechanacimiento").value;
    especialidad = document.getElementById("especialidad").value;
    descripcion = document.getElementById("descripcion").value;

    if(nombre==="" || apellido==="" || telefono==="" || fechanacimiento==="" || especialidad==="" || descripcion===""){
      alert("Por favor rellene los campos obligatorios ");
      return false;
     }
     if(expespacio.test(nombre) || expespacio.test(apellido) || expespacio.test(telefono) || expespacio.test(fechanacimiento)
     || expespacio.test(especialidad) || expespacio.test(descripcion) ){
      alert("No se permiten espacios en blanco");
      return false;
     }

     if(!/^[a-zA-ZÀ-ÿ\u00f1\u00d1]+(\s*[a-zA-ZÀ-ÿ\u00f1\u00d1]*)*[a-zA-ZÀ-ÿ\u00f1\u00d1]+$/g.test(nombre) || nombre.length>100){
      alert("Nombre, excede el limite de caracteres o no valido");
      return false;
     }
     if(!/^[a-zA-ZÀ-ÿ\u00f1\u00d1]+(\s*[a-zA-ZÀ-ÿ\u00f1\u00d1]*)*[a-zA-ZÀ-ÿ\u00f1\u00d1]+$/g.test(apellido) || apellido.length>100){
      alert("Apellidos, excede el limite de caracteres o no valido");
      return false;
     }
     if(!exptelefono.test(telefono)){
      alert("Telefono muy largo o telefono invalido");
      return false;
     }
     if(!expfecha.test(fechanacimiento)){
      alert("Formato de fecha invalido");
      return false;
     }
     if(!/^[a-zA-ZÀ-ÿ\u00f1\u00d1]+(\s*[a-zA-ZÀ-ÿ\u00f1\u00d1]*)*[a-zA-ZÀ-ÿ\u00f1\u00d1]+$/g.test(especialidad) || especialidad.length>100){
      alert("Datos de especialidad no validos o supera el lim" );
      return false;
    }
    if(descripcion.length>100){
      alert("Descripcion especialidad supera el lim" );
      return false;
    }
   }
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
     alert("La contraseña exedio el limite de caracteres");
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

