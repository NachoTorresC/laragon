<?php

try {

    $opciones = array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8");

    $conexion = new PDO('mysql:host=localhost;dbname=neptunoex', 'root', '', $opciones);
   // $conexion es un objeto
} catch (PDOException $e) {
    echo "ERROR: " . $e->getMessage();
    }


?>

