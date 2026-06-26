<?php

require_once "conexion.php";

class modeloUsuario{
    public static function buscarUsuario ($usuario, $contrasenia){
        try{
            $stm = conexion::conectar()->prepare("SELECT * FROM usuarios WHERE usuario = :usuario AND contrasenia = :contrasenia");
            $stm->bindParam(":usuario", $usuario, PDO::PARAM_STR);
            $stm->bindParam(":contrasenia", $contrasenia, PDO::PARAM_STR);
            $stm->execute();
            return $stm->fetch();
        }catch (Exception $e){
            echo 'Error: ' . $e->getMessage();
        }
    }

    public static function guardarUsuario($data)
    {
        $stm = conexion::conectar()->prepare("INSERT INTO usuarios (nombres, apellidos, usuario, contrasenia)
                                                VALUES (:crearNombres, :crearApellidos, :crearUsuario, :crearContrasenia)");
        $stm->bindParam(":crearNombres", $data["crearNombres"], PDO::PARAM_STR);
        $stm->bindParam(":crearApellidos", $data["crearApellidos"], PDO::PARAM_STR);
        $stm->bindParam(":crearUsuario", $data["crearUsuario"], PDO::PARAM_STR);
        $stm->bindParam(":crearContrasenia", $data["crearContrasenia"], PDO::PARAM_STR);
        if ($stm->execute()) {
            return "OK";
        } else {
            return "Error";
        }
    }

    public static function traerDatos($parametro, $id)
    {
        if ($parametro) {
            $stm = conexion::conectar()->prepare("SELECT * FROM usuarios");
            $stm->execute();
            return $stm->fetchAll();
        } else {
            $stm = conexion::conectar()->prepare("SELECT * FROM usuarios WHERE id_usuario = :id_usuario");
            $stm->bindParam(":id_usuario", $id, PDO::PARAM_INT);
            $stm->execute();
            return $stm->fetch();
        }
    }

    public static function editarDatos($data)
    {
        $stm = conexion::conectar()->prepare("UPDATE usuarios SET nombres=:nombres, apellidos=:apellidos,
                                            usuario=:usuario, contrasenia=:contrasenia
                                            WHERE id_usuario=:id_usuario");
        $stm->bindParam(":nombres", $data["nombres"], PDO::PARAM_STR);
        $stm->bindParam(":apellidos", $data["apellidos"], PDO::PARAM_STR);
        $stm->bindParam(":usuario", $data["usuario"], PDO::PARAM_STR);
        $stm->bindParam(":contrasenia", $data["contrasenia"], PDO::PARAM_STR);
        $stm->bindParam(":id_usuario", $data["id_usuarios"], PDO::PARAM_INT);
        if ($stm->execute()) {
            return "OK";
        } else {
            return "Error";
        }
    }

    public static function eliminarDatos($id)
    {
        $stm = conexion::conectar()->prepare("DELETE FROM usuarios WHERE id_usuario=:id");
        $stm->bindParam(":id", $id, PDO::PARAM_INT);
        if ($stm->execute()) {
            return 1;
        } else {
            return 0;
        }
    }

    public static function contarUsuarios(){
        $stm = conexion::conectar()->prepare("SELECT COUNT(*) AS numeroUsuarios FROM usuarios");
        $stm->execute();
        return $stm->fetch();
    }
}
