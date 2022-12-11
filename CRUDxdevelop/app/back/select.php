<?php
require "../config/conexion.php";
$sqlUsuarios = "SELECT * FROM USUARIOS";
$usuarios = $conn->query($sqlUsuarios);
