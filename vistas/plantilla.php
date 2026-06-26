<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Sistema</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="vistas/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="vistas/dist/css/adminlte.min.css">
  <!-- Sweetalert2-->
  <link rel="stylesheet" href="vistas/plugins/sweetalert2/sweetalert2.min.css">
  <script src="vistas/plugins/sweetalert2/sweetalert2.min.js"></script>

  <!-- DataTables -->
  <link rel="stylesheet" href="vistas/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="vistas/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="vistas/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  
</head>


<?php

if (isset($_SESSION["login"]) && ($_SESSION["login"]=="activo")){
  
  echo '<body class="hold-transition sidebar-mini">';
    

  echo '<div class="wrapper">';

  include "vistas/componentes/menu.php";
  include "vistas/componentes/sidebar.php";

  //Rutas de nuestra aplicación

  if (isset($_GET["enlace"])){
    if ($_GET["enlace"]== "inicio" ||
        $_GET["enlace"]== "salir" ||
        $_GET["enlace"]== "peliculas" ||
        $_GET["enlace"]== "usuarios")
      {
        include "vistas/componentes/".$_GET["enlace"].".php";
      }
      else{
        include "vistas/componentes/404.php";
      }
  }else{
    include  "vistas/componentes/inicio.php";
  }

  include "vistas/componentes/footer.php";
  echo '</div>';
}
else{
  echo '<body class="hold-transition login-page">';
  include  "vistas/componentes/login.php";
}


?>


  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->


<!-- jQuery -->
<script src="vistas/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="vistas/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="vistas/dist/js/adminlte.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="vistas/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="vistas/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="vistas/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="vistas/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="vistas/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="vistas/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="vistas/plugins/jszip/jszip.min.js"></script>
<script src="vistas/plugins/pdfmake/pdfmake.min.js"></script>
<script src="vistas/plugins/pdfmake/vfs_fonts.js"></script>
<script src="vistas/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="vistas/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="vistas/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>

 <!-- Archivos propios-->
<script src="vistas/dist/js/peliculas.js"></script>
<?php if (isset($_GET["enlace"]) && $_GET["enlace"] == "usuarios") { ?>
<script src="vistas/dist/js/usuarios.js"></script>
<?php } ?>


</body>
</html>
