<?php
require_once "../modelos/mdlPersona.php";
require_once "../controladores/ctrlPersona.php";
class peliculasAjax {
    public $id_peliculas;
    
    public function traerDatos(){
        $parametros = False;
        $id = $this->id_peliculas;
        $respuesta = ControladorPersona::ctrlCargarDatos($parametros, $id);
        echo json_encode($respuesta);
    }

    public function eliminarDatos(){
        $id = $this->id_peliculas;
        $respuesta = ControladorPersona::ctrlEliminar($id);
        echo json_encode($respuesta);
    }

}
if (isset($_POST["id_peliculas"])){
    $objPeliculasAjax = new peliculasAjax();
    $objPeliculasAjax->id_peliculas = $_POST["id_peliculas"];
    switch($_POST['operacion']){
        case 'editar': 
            $objPeliculasAjax->traerDatos();
            break;
        case 'eliminar':
            $objPeliculasAjax->eliminarDatos();
            break;
    }
}