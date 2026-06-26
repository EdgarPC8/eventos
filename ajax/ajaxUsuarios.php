<?php
require_once "../modelos/mdlUsuario.php";
require_once "../controladores/ctrlUsurios.php";

class usuariosAjax {
    public $id_usuarios;
    
    public function traerDatos(){
        $parametros = False;
        $id = $this->id_usuarios;
        $respuesta = contraladorUsuario::ctrlCargarDatos($parametros, $id);
        echo json_encode($respuesta);
    }

    public function eliminarDatos(){
        $id = $this->id_usuarios;
        $respuesta = contraladorUsuario::ctrlEliminar($id);
        echo json_encode($respuesta);
    }
}

if (isset($_POST["id_usuarios"])){
    $objUsuariosAjax = new usuariosAjax();
    $objUsuariosAjax->id_usuarios = $_POST["id_usuarios"];
    switch($_POST['operacion']){
        case 'editar': 
            $objUsuariosAjax->traerDatos();
            break;
        case 'eliminar':
            $objUsuariosAjax->eliminarDatos();
            break;
    }
}
