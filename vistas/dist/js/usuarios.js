$(function () {
  $("#tableUsuarios")
    .DataTable({
      responsive: true,
      lengthChange: false,
      autoWidth: false,
      buttons: ["copy", "csv", "excel", "pdf", "print", "colvis"],
    })
    .buttons()
    .container()
    .appendTo("#tableUsuarios_wrapper .col-md-6:eq(0)");
});

$(".editarUsuarioTabla").click(function () {
  var id_usuarios = $(this).attr("id_usuarios");
  var datos = new FormData();
  datos.append("id_usuarios", id_usuarios);
  datos.append("operacion", "editar");
  $.ajax({
    url: "ajax/ajaxUsuarios.php",
    method: "POST",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    dataType: "json",
    success: function (respuesta) {
      $("#id_usuario").val(respuesta["id_usuario"]);
      $("#editarNombres").val(respuesta["nombres"]);
      $("#editarApellidos").val(respuesta["apellidos"]);
      $("#editarUsuario").val(respuesta["usuario"]);
      $("#editarContrasenia").val(respuesta["contrasenia"]);
    },
    error: function (xhr, status, error) {
      console.error("Error crítico en la petición AJAX:", error);
      console.log("Detalles del servidor:", xhr.responseText);
    },
  });
});

$(".eliminarUsuarioTabla").click(function () {
  var id_usuarios = $(this).attr("id_usuarios");
  var datos = new FormData();
  datos.append("id_usuarios", id_usuarios);
  datos.append("operacion", "eliminar");
  Swal.fire({
    title: "Está seguro que desea eliminar los datos de usuario?",
    text: "No podrá recuperar los datos!",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Sí, eliminalo!",
    cancelButtonText: "Cancelar",
  }).then((result) => {
    if (result.value) {
      $.ajax({
        url: "ajax/ajaxUsuarios.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (respuesta) {
          if (respuesta == 1) {
            Swal.fire({
              icon: "success",
              title: "Elimando",
              text: "Datos Eliminados conexito!",
              showConfirmButton: true,
              confirmButtonText: "Cerrar",
            }).then(function (result) {
              if (result.value) {
                window.location = "usuarios";
              }
            });
          } else {
            Swal.fire({
              icon: "error",
              title: "Oops...",
              text: "No se pudo eliminar los datos!",
            });
          }
        },
      });
    }
  });
});
