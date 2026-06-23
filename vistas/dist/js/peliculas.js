$(function () {
  $("#tablePeliculas")
    .DataTable({
      responsive: true,
      lengthChange: false,
      autoWidth: false,
      buttons: ["copy", "csv", "excel", "pdf", "print", "colvis"],
    })
    .buttons()
    .container()
    .appendTo("#tablePeliculas_wrapper .col-md-6:eq(0)");
  $("#example2").DataTable({
    paging: true,
    lengthChange: false,
    searching: false,
    ordering: true,
    info: true,
    autoWidth: false,
    responsive: true,
  });
});

$(".editarPeliculaTabla").click(function () {
  var id_peliculas = $(this).attr("id_peliculas");
  var datos = new FormData();
  datos.append("id_peliculas", id_peliculas);
  datos.append("operacion", "editar");
  $.ajax({
    url: "ajax/ajaxPeliculas.php",
    method: "POST",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    dataType: "json",
    success: function (respuesta) {
      $("#id_pelicula").val(respuesta["id_pelicula"]);
      $("#editarPelicula").val(respuesta["nombre"]);
      $("#editarGenero").val(respuesta["id_genero"]);
      $("#editarLenguaje").val(respuesta["lenguaje"]);
      $("#editarActor").val(respuesta["actor"]);
      $("#editarAnio").val(respuesta["anio"]);
      $("#editarDoblado").val(respuesta["doblada"]);
    },
    error: function (xhr, status, error) {
      console.error("Error crítico en la petición AJAX:", error);
      console.log("Detalles del servidor:", xhr.responseText);
    },
  });
});

$(".eliminarPeliculaTabla").click(function () {
  var id_peliculas = $(this).attr("id_peliculas");
  var datos = new FormData();
  datos.append("id_peliculas", id_peliculas);
  datos.append("operacion", "eliminar");
  Swal.fire({
    title: "Está seguro que desea eliminar los datos de película?",
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
        url: "ajax/ajaxPeliculas.php",
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
                window.location = "peliculas";
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
