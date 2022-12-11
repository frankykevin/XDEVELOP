<?php

session_start();

require '../config/conexion.php';
$nombre = $conn->real_escape_string($_POST["Nombre"]);
$apellidos = $conn->real_escape_string($_POST["Apellidos"]);
$email = $conn->real_escape_string($_POST["Email"]);
$contrasena = $conn->real_escape_string($_POST["Contrasena"]);

$sql = "INSERT INTO usuarios (Nombre,Apellidos,Email,Contrasena) 
VALUES('$nombre','$apellidos','$email','$contrasena')";
if ($conn->query($sql)) {
    $id = $conn->insert_id;
    $_SESSION['color'] = "success";
    $_SESSION['msg'] = "Registro Creado";

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
    $_SESSION['msg'] = "Error al crear Registro";
}
header('Location:../usuarios/principal.php');
