function editaTarea(aidi) {

   datos = {

      type:"tareaEdit",
      aidita:aidi
   }

   $.ajax({
      type: "POST",
      url: "modales.php",
      data: datos,
      success: function (response) {
         $("#divModalEditar").html(response);
      }
   });
   
}


function cerrarModalEdit(){
   
   $(".cerrarModal").hide();
}


function liberame(idtarea,accion){

   datos = {
      type:accion,
      idtarea
   }

   $.ajax({
      type: "POST",
      url: "liberartareas.php",
      data: datos,
      success: function (response) {
         
         location.reload();
      }
   });  

}