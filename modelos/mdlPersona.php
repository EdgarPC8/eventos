<?php
require_once "conexion.php";
class ModeloPersona {
    public static function guardarPersona ($data){
        $stm = conexion::conectar()->prepare("INSERT INTO peliculas (nombre, genero, lenguaje, actor, anio, doblada)
                                                VALUES (:crearPelicula, :crearGenero, :crearLenguaje, :crearActor,
                                                :crearAnio, crearDoblado");
       $stm->bindParam(":crearPelicula", $data["crearPelicula"], PDO::PARAM_STR); 
       $stm->bindParam(":crearGenero", $data["crearGenero"], PDO::PARAM_STR); 
       $stm->bindParam(":crearLenguaje", $data["crearLenguaje"], PDO::PARAM_STR); 
       $stm->bindParam(":crearActor", $data["crearActor"], PDO::PARAM_STR); 
       $stm->bindParam(":crearAnio", $data["crearAnio"], PDO::PARAM_STR); 
       $stm->bindParam(":crearDoblado", $data["crearDoblado"], PDO::PARAM_STR);
       if ($stm->execute()){
            return "OK";
       }
       else{
        return "Error";
       }


    }
}