<?php 
ob_start();
require 'config/config.php';
require 'config/db.php';
require_once 'functions/functions.php';
$title = "Crear Empleado";
require 'views/layout/header.php';
require 'views/empleados/empleadosView.php';
require 'views/layout/footer.php';
ob_end_flush();