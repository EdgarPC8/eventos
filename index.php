<?php
//llamar a todos los controladores
require_once "controladores/ctrlPrincipal.php";
require_once "controladores/ctrlUsurios.php";
require_once "controladores/ctrlPersona.php";
require_once "controladores/ctrlGeneroPeliculas.php";


//llamar a todos los modelos
require_once "modelos/mdlUsuario.php";
require_once "modelos/mdlPersona.php";
require_once "modelos/mdlGeneroPeliculas.php";
 
$objPrincipal = new Principal();
$objPrincipal->ctrlPrincipal();