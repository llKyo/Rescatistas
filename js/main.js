window.generarTbody = function(lista){
   var $tbody = $(".tabla_rescatistas > tbody");
   $tbody.empty();
   for (var i = 0; i < lista.length; i++) {
     var rescatista = lista[i];
     var $tr = $("<tr></tr>");
     var $tdNombre = $("<td></td>");
     var $tdRut = $("<td></td>");
     var $tdCurso = $("<td></td>");

     $tdNombre.text(rescatista.nombre);
     $tdRut.text(rescatista.rut);
     // if(rescatista.curso == 1){
     //   $tdCurso.text("Sí");
     // } else {
     //   $tdCurso.text("No");
     // }
     $tdCurso.text(rescatista.curso == 1? "Sí": "No");

     $tr.append($tdRut);
     $tr.append($tdNombre);
     $tr.append($tdCurso);
     var $tdAcciones = $("<td></td>");
     var $boton = $("<button type='button' "
        +"class='btn btn-danger eliminar_btn'>Eliminar</button>");
     $boton.data("rescatista",rescatista);
     $tdAcciones.append($boton);
     $tr.append($tdAcciones);
     $tbody.append($tr);
   }
};

//Debe ir a la api/rescatistas y
//procesar el json, mostrando los datos en la tabla
window.cargarTabla = function(){
   //ajax
   //EndPoint
   var url = "api/rescatistas";
   //Ajax es un Deferred, se la dejo boteando
   var ajax = $.ajax({
        type: 'GET'
      , url: url
   });
   //si llego a esta linea de codigo
   //no quiere decir que la petición se haya terminado
   ajax.done(function(respuesta){
     //la respuesta es el json que mandó desde
     //php
     var lista = JSON.parse(respuesta);
     window.generarTbody(lista);
   });
   //Si llegara a fallar la petición
   //el resultado erroneo llega a
   //ajax.fail
};

$(document).ready(function(){
  window.cargarTabla();
  $("body").on("click", "#ingresar_btn",function(){
      //1. Obtener los datos del formulario
      var nombre = $("#nombre").val()
        , rut = $("#rut").val()
        , curso = $("#curso_rendido").val()
      ;
      //2. Efectuar una petición ajax de tipo POST
      var url = "api/rescatistas/create.php";
      var ajax = $.ajax({
        type:"POST",
        url: url,
        data:{
          nombre:nombre,
          rut: rut,
          curso: curso}
      });
      //3. Procesar la respuesta
      ajax.done(function(respuesta){
          //recargar la tabla
          window.cargarTabla();
      });
  });

  $("body").on("click", ".eliminar_btn", function(){
      var id = $(this).data("rescatista").id;
      var url ="api/rescatistas/delete.php";
      var ajax = $.ajax({
        type: "POST",
        url: url,
        data: {
          id: id
        }
      });
      ajax.done(function(respuesta){
        window.cargarTabla();
      });
  });

});
