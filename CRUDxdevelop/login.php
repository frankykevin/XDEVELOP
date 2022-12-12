<?php
session_start();

require '../CRUDxdevelop/app/config/conexion.php';
$email = $conn->real_escape_string($_POST["email"]);
$contrasena = $conn->real_escape_string($_POST["contrasena"]);
$pass2 = md5($contrasena);
$sqlUsuarios = "SELECT * FROM USUARIOS WHERE Email='$email' AND Contrasena='$pass2'";
$usuarios = $conn->query($sqlUsuarios);
$rows = $usuarios->num_rows;
if ($rows > 0) {
    header('Location: ../CRUDxdevelop/app/usuarios/principal.php');
    $_SESSION['autenticado'] = true;
} else {
    header('Location: index.php');
    $_SESSION['color'] = "danger";
    $_SESSION['msg'] = "Por favor verifica usuario y contraseña";
}
