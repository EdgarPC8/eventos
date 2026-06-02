<?php
class ControladorGeneroPeliculas{
    #Función para cargar todo los genero
    public function cargarGeneroPelulas (){
        $res = ModeloGeneroPeliculas::cargarGenero ();
        return $res;
    }

}