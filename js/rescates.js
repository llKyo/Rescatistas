window.cargarTabla = function(lista){
  $(".tabla_rescates > tbody").empty();
  for(var i=0; i < lista.length; ++i){
    var rescate = lista[i];
    var $tr = $("<tr></tr>");
    var $tdNombre = $("<td></td>");
    var $tdEdad = $("<td></td>");
    var $tdEstado = $("<td></td>");
    var $tdBtn= $("<td></td>");
    $tdNombre.text(rescate.nombre);
    $tdEdad.text(rescate.edad);
    if(rescate.estado ==0 ){
      $tdEstado.text("Normal");
    } else if(rescate.estado == 1){
      $tdEstado.text("Grave");
    } else {
      $tdEstado.text("Riesgo Vital");
    }
    var $btnEliminar = $("<button type='button'"
      +" class='btn btn-danger btn-eliminar'>Resuelto</button>");
    $btnEliminar.data("rescate", rescate);
    $tdBtn.append($btnEliminar);
    $tr.append($tdNombre);
    $tr.append($tdEdad);
    $tr.append($tdEstado);
    $tr.append($tdBtn);
    $(".tabla_rescates > tbody").append($tr);
  }
}
window.cargarRescatistas = function(){
  var url = "api/rescatistas";
  var ajax = $.ajax({
    type: "GET",
    url: url
  });
  ajax.done(function(respuesta){
     var lista = JSON.parse(respuesta);
     $("#rescatista").empty();

     for(var i=0; i < lista.length; ++i){
       var res = lista[i];
       $("#rescatista")
        .append("<option value='"
          + res.rut+"'>"+res.nombre+"</option>" )
     }
  });
};

window.cargarRescates = function(){
  var url = "api/rescates";
  var ajax = $.ajax({
    type: "GET",
    url: url
  });
  ajax.done(function(respuesta){
    var lista = JSON.parse(respuesta);
    window.cargarTabla(lista);
  });
};
window.ingresarRescate = function(){
  var nombre = $("#nombre").val()
    , rut = $("#rut").val()
    , edad = $("#edad").val()
    , rescatista = $("#rescatista").val()
    , estado = $("#estado").val()
    , descripcion = $("#descripcion").val()
   ;
  var ajax = $.ajax({
    type: 'POST',
    url: "api/rescates/create.php",
    data:{
      rut: rut,
      edad: edad,
      nombre: nombre,
      estado: estado,
      rut_rescatista: rescatista,
      descripcion_suceso: descripcion
    }
  });
 ajax.done(function(respuesta){
    window.cargarRescates();
 });
};
$(document).ready(function(){

    window.cargarRescatistas();
    window.cargarRescates();
    $("body").on("click", '.btn-eliminar', function(){
       var rescate = $(this).data("rescate");
       var ajax = $.ajax({
          type: 'POST',
          url: "api/rescates/delete.php",
          data:{id: rescate.id}
       });
       ajax.done(function(respuesta){
         window.cargarRescates();
       });
    });

    $("body").on("click", "#ingresar_rescate", function(){
       var errores = [];
       if($("#rut").val().trim() == ""){
         errores.push("Debe Ingresar un rut");
       }
       if($("#nombre").val().trim() == ""){
         errores.push("Debe ingresar un nombre");
       }
       if($("#descripcion").val().trim() == ""){
         errores.push("Debe describir el suceso");
       }
       if($("#edad").val().trim() == ""){
         errores.push("Debe ingresar una edad");
       }
       $(".errores").empty();
       if(errores.length == 0){
         window.ingresarRescate();
       } else {
         var $ul = $("<ul class='alert alert-danger'></ul>");
         for(var i=0; i < errores.length; ++i){
           $ul.append("<li>"+errores[i]+"</li>");
         }
         $(".errores").append($ul);
       }
    });
});
