<?php
require_once "conexion.php";
class ModeloGeneroPeliculas {
    public static function cargarGenero(){
        $stm = conexion::conectar()->prepare("SELECT * FROM genero_peliculas");
        $stm->execute();
        return $stm->fetchAll();
    }
}