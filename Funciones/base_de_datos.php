<?php
    $servidor='localhost';
    $_usuario= 'root';
    $_contraseña = 'medac';
    $_base_de_datos ='db_usuarios';
    $conexion_usuarios= new mysqli($servidor, $_usuario, $_contraseña,$_base_de_datos)
 or die("Error de conexion");
 ?>
 <?php
    $servidor='localhost';
    $_usuario= 'root';
    $_contraseña = 'medac';
    $_base_de_datos ='db_peliculas';
    $conexion_peliculas= new mysqli($servidor, $_usuario, $_contraseña,$_base_de_datos)
 or die("Error de conexion");
 ?>

