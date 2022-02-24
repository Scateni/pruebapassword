<?php
define('PATH', 'http://pruebapassword.test/');
define("HOST", "localhost");
define("USER", "root");
define("PASSWORD", "");
define("DB", "prueba");
function limpiarDatos($datos){
  $datos = trim($datos);
  $datos = stripcslashes($datos);
  $datos = htmlspecialchars($datos);
  return $datos;
}