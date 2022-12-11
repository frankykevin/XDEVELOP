<?php

session_start();

require '../config/conexion.php';
$id = $conn->real_escape_string($_POST["id"]);
$nombre = $conn->real_escape_string($_POST["nombre"]);
$apellidos = $conn->real_escape_string($_POST["apellidos"]);
$email = $conn->real_escape_string($_POST["email"]);
$contrasena = $conn->real_escape_string($_POST["contrasena"]);

$sql = "UPDATE usuarios SET Nombre='$nombre',Apellidos='$apellidos',Email='$email',Contrasena='$contrasena' WHERE id=$id";
if ($conn->query($sql)) {
    $_SESSION['color'] = "success";
    $_SESSION['msg'] = "Registro Actualizado";
    if ($_FILES['foto']['error'] == UPLOAD_ERR_OK) {
        $formatos = array("image/jpg", "image/jpeg");
        if (in_array($_FILES['foto']['type'], $formatos)) {
            $dir = "fotosperfil";

            $info_img = pathinfo($_FILES['foto']['name']);
            $info_img['extension'];

            $foto = $dir . '/' . $id . '.jpg';
            if (!file_exists($dir)) {
                mkdir($dir, 0777);
            }
            if (!move_uploaded_file($_FILES['foto']['tmp_name'], $foto)) {
                $_SESSION['color'] = "danger";
                $_SESSION['msg'] .= "<br>ERROR AL GUARDAR LA IMAGEN";
            }
        } else {
            $_SESSION['color'] = "danger";
            $_SESSION['msg'] .= "<br>Formato de imagen no permitido";
        }
    }
} else {
    $_SESSION['color'] = "danger";
    $_SESSION['msg'] = "Error al Actualizar";
}
header('Location:../usuarios/principal.php');
