<?php
class ControladorPersona{
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
}