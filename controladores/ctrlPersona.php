<?php
class ControladorPersona{
    #Función para preparar los datos para guardar
    public function ctrlGuardarPersona (){
        
        
        
        if (isset($_POST ['crearPelicula']) && isset($_POST ['crearGenero']) && isset($_POST ['crearLenguaje']) &&
         isset($_POST ['crearActor']) && isset($_POST ['crearAnio']) && isset($_POST ['crearDoblado'])){

            
            $data = array(
                "crearPelicula" => $_POST ['crearPelicula'],
                "crearGenero" => $_POST ['crearGenero'],
                "crearLenguaje" => $_POST ['crearLenguaje'],
                "crearActor" => $_POST ['crearActor'],
                "crearAnio" => $_POST ['crearAnio'],
                "crearDoblado" => $_POST ['crearDoblado']
            );
            
            $res = ModeloPersona::guardarPersona($data);
            echo $res;

            if ($res == "OK"){
                echo '<script>
                        Swal.fire({
                            icon:"success",
                            title: "¡Datos de Peliculas Guardados Correctamente...!",
                            showConfirmButton: true,
                            confirmButtonText: "Cerrar"
                        }).then(function(result){
                            if(result.value){
                                window.location= "peliculas";
                            }
                        })
                      </script>
                    ';
            }else{
                echo '<script>
                        Swal.fire({
                            icon:"error",
                            title: "¡Datos de peliculas no se pueden guardar!",
                            showConfirmButton: true,
                            confirmButtonText: "Cerrar"
                        }).then(function(result){
                            if(result.value){
                                window.location= "peliculas";
                            }
                        })
                      </script>
                ';
            }
         }
    }

    #Función para preparar datos la una consulta
    public static function ctrlCargarDatos ($parametro, $id){
        $res = ModeloPersona::traerDatos($parametro, $id);
        return $res ;
    }

    #Función para actualizar dartos 
    public function ctrlActualizarDatos (){
        if (isset($_POST['editarPelicula']) && isset($_POST['editarGenero']) && isset($_POST['editarLenguaje']) && isset($_POST['editarActor'])&&
            isset($_POST['editarAnio']) && isset($_POST['editarDoblado'])){
                $data = array (
                    'id_peliculas' => (int) $_POST['id_pelicula'],
                    'nombre' => $_POST['editarPelicula'],
                    'id_genero' => (int) $_POST['editarGenero'],
                    'lenguaje' => $_POST['editarLenguaje'],
                    'actor' => $_POST['editarActor'],
                    'anio' => $_POST['editarAnio'],
                    'doblada' => $_POST['editarDoblado'],
                );
                var_dump($data);
                $res = ModeloPersona::editarDatos ($data);
                echo $res;

            if ($res == "OK"){
                echo '<script>
                        Swal.fire({
                            icon:"success",
                            title: "¡Datos de Peliculas Actualizados Correctamente...!",
                            showConfirmButton: true,
                            confirmButtonText: "Cerrar"
                        }).then(function(result){
                            if(result.value){
                                window.location= "peliculas";
                            }
                        })
                      </script>
                    ';
            }else{
                echo '<script>
                        Swal.fire({
                            icon:"error",
                            title: "¡Datos de peliculas no se pueden ser actualizados!",
                            showConfirmButton: true,
                            confirmButtonText: "Cerrar"
                        }).then(function(result){
                            if(result.value){
                                window.location= "peliculas";
                            }
                        })
                      </script>
                ';
            }
            }
    }

    #Función para eliminar datos
    public static function ctrlEliminar($id){
        $res = ModeloPersona::EliminarDatos((int)$id);
        return $res;

    }

    #Función para contar los resgistros
    public static function ctrlContarPeliculas(){
        $res = ModeloPersona::contarPeliculas();
        return $res;
    }

}