<?php
class contraladorUsuario{
    public function crtlLoginUsuario(){
        
        if (isset($_POST["usuario"]) && isset($_POST["contrasenia"]) && !empty($_POST["usuario"]) && !empty($_POST["contrasenia"])){
           
            $usuario = $_POST["usuario"];
            $contrasenia = $_POST["contrasenia"];
            $datos = modeloUsuario::buscarUsuario($usuario, $contrasenia);

            if (isset($datos['usuario']) && $datos['usuario'] == $usuario && $datos['contrasenia'] == $contrasenia){
                $_SESSION["login"] = "activo";
                $_SESSION["nombre"] = $datos["nombres"]." ". $datos["apellidos"];
                echo '<script>
							window.location.href="inicio";
						  </script>';
            }
            else{
                 echo ('
                    <script>
                     Swal.fire({
                         icon: "error",
                         title: "Datos de autenticación",
                         text: "Inserte correctamente sus credenciales",
                        });
                    </script>
                    ');
            }
            
        }
    }

    public function ctrlGuardarUsuario()
    {
        if (isset($_POST['crearNombres']) && isset($_POST['crearApellidos']) && isset($_POST['crearUsuario']) &&
            isset($_POST['crearContrasenia'])){

            $data = array(
                "crearNombres" => $_POST['crearNombres'],
                "crearApellidos" => $_POST['crearApellidos'],
                "crearUsuario" => $_POST['crearUsuario'],
                "crearContrasenia" => $_POST['crearContrasenia']
            );

            $res = modeloUsuario::guardarUsuario($data);

            if ($res == "OK"){
                echo '<script>
                        Swal.fire({
                            icon:"success",
                            title: "¡Datos de Usuarios Guardados Correctamente...!",
                            showConfirmButton: true,
                            confirmButtonText: "Cerrar"
                        }).then(function(result){
                            if(result.value){
                                window.location= "usuarios";
                            }
                        })
                      </script>
                    ';
            }else{
                echo '<script>
                        Swal.fire({
                            icon:"error",
                            title: "¡Datos de usuarios no se pueden guardar!",
                            showConfirmButton: true,
                            confirmButtonText: "Cerrar"
                        }).then(function(result){
                            if(result.value){
                                window.location= "usuarios";
                            }
                        })
                      </script>
                ';
            }
        }
    }

    public static function ctrlCargarDatos($parametro, $id){
        $res = modeloUsuario::traerDatos($parametro, $id);
        return $res;
    }

    public function ctrlActualizarDatos()
    {
        if (isset($_POST['editarNombres']) && isset($_POST['editarApellidos']) && isset($_POST['editarUsuario']) &&
            isset($_POST['editarContrasenia'])){
                $data = array(
                    'id_usuarios' => (int) $_POST['id_usuario'],
                    'nombres' => $_POST['editarNombres'],
                    'apellidos' => $_POST['editarApellidos'],
                    'usuario' => $_POST['editarUsuario'],
                    'contrasenia' => $_POST['editarContrasenia'],
                );
                $res = modeloUsuario::editarDatos($data);

            if ($res == "OK"){
                echo '<script>
                        Swal.fire({
                            icon:"success",
                            title: "¡Datos de Usuarios Actualizados Correctamente...!",
                            showConfirmButton: true,
                            confirmButtonText: "Cerrar"
                        }).then(function(result){
                            if(result.value){
                                window.location= "usuarios";
                            }
                        })
                      </script>
                    ';
            }else{
                echo '<script>
                        Swal.fire({
                            icon:"error",
                            title: "¡Datos de usuarios no se pueden ser actualizados!",
                            showConfirmButton: true,
                            confirmButtonText: "Cerrar"
                        }).then(function(result){
                            if(result.value){
                                window.location= "usuarios";
                            }
                        })
                      </script>
                ';
            }
        }
    }

    public static function ctrlEliminar($id){
        $res = modeloUsuario::eliminarDatos((int)$id);
        return $res;
    }

    public static function ctrlContarUsuarios(){
        $res = modeloUsuario::contarUsuarios();
        return $res;
    }
}
