<?php
require_once "conexion.php";
class ModeloPersona
{
    #Función par guardar datos
    public static function guardarPersona($data)
    {

        $stm = conexion::conectar()->prepare("INSERT INTO peliculas (nombre, id_genero, lenguaje, actor, anio, doblada)
                                                VALUES (:crearPelicula, :crearGenero, :crearLenguaje, :crearActor, :crearAnio, :crearDoblado)");
        $stm->bindParam(":crearPelicula", $data["crearPelicula"], PDO::PARAM_STR);
        $stm->bindParam(":crearGenero", $data["crearGenero"], PDO::PARAM_STR);
        $stm->bindParam(":crearLenguaje", $data["crearLenguaje"], PDO::PARAM_STR);
        $stm->bindParam(":crearActor", $data["crearActor"], PDO::PARAM_STR);
        $stm->bindParam(":crearAnio", $data["crearAnio"], PDO::PARAM_STR);
        $stm->bindParam(":crearDoblado", $data["crearDoblado"], PDO::PARAM_STR);
        if ($stm->execute()) {
            return "OK";
        } else {
            return "Error";
        }
    }

    #Función para cargar los datos
    public static function traerDatos($parametro, $id)
    {
        if ($parametro) {
            $stm = conexion::conectar()->prepare("SELECT peliculas.*, genero_peliculas.nombres AS genero 
                                              FROM peliculas 
                                              INNER JOIN genero_peliculas ON peliculas.id_genero= genero_peliculas.id_genero");
            $stm->execute();
            return $stm->fetchAll();
        } else {
            $stm = conexion::conectar()->prepare("SELECT * FROM peliculas WHERE id_pelicula = :id_pelicula");
            $stm->bindParam(":id_pelicula", $id, PDO::PARAM_INT);
            $stm->execute();
            return $stm->fetch();
        }
    }

    #Función para actualizar datos
    public static function editarDatos($data)
    {

        $stm = conexion::conectar()->prepare("UPDATE peliculas SET nombre=:nombre, id_genero=:id_genero, 
                                            lenguaje=:lenguaje, actor=:actor, anio=:anio, doblada=:doblada
                                            WHERE id_pelicula=:id_pelicula");
        $stm->bindParam(":nombre", $data["nombre"], PDO::PARAM_STR);
        $stm->bindParam(":id_genero", $data["id_genero"], PDO::PARAM_INT);
        $stm->bindParam(":lenguaje", $data["lenguaje"], PDO::PARAM_STR);
        $stm->bindParam(":actor", $data["actor"], PDO::PARAM_STR);
        $stm->bindParam(":anio", $data["anio"], PDO::PARAM_STR);
        $stm->bindParam(":doblada", $data["doblada"], PDO::PARAM_STR);
        $stm->bindParam(":id_pelicula", $data["id_peliculas"], PDO::PARAM_INT);
        if ($stm->execute()) {
            return "OK";
        } else {
            return "Error";
        }
    }

    #Función para eliminar datos
    public static function EliminarDatos($id)
    {
        $stm = conexion::conectar()->prepare("DELETE FROM peliculas WHERE id_pelicula=:id");
        $stm->bindParam(":id", $id, PDO::PARAM_INT);
        if ($stm->execute()) {
            return 1;
        } else {
            return 0;
        }
    }
}
