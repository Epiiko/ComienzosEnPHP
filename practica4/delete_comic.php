<?php
require 'database_conection.php';
if($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id_comic"];
    $sql = $_conexion -> prepare("DELETE FROM comics WHERE id_comic = ?");
    $sql -> bind_param("s", $id);
    $sql -> execute();
    header('location: index.php');
}
    