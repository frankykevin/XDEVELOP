<?php

session_start();

require '../config/conexion.php';
$nombre = $conn->real_escape_string($_POST["nombre"]);
$apellidos = $conn->real_escape_string($_POST["apellidos"]);
$email = $conn->real_escape_string($_POST["email"]);
$contrasena = $conn->real_escape_string($_POST["contrasena"]);
if (empty($nombre) || empty($apellidos) || empty($contrasena)) {
    $_SESSION['color'] = "danger";
    $_SESSION['msg'] = "No puedes dejar datos vacios";
    header('Location:../usuarios/principal.php');
} else {
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header('Location:../usuarios/principal.php');
        $_SESSION['color'] = "danger";
        $_SESSION['msg'] = "El e-mail no es valido";
    } else {
        $sql = "INSERT INTO usuarios (Nombre,Apellidos,Email,Contrasena) 
    VALUES('$nombre','$apellidos','$email',MD5('$contrasena'))";
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
                    $sql2 = "UPDATE usuarios SET Imagen='$foto' WHERE id=$id";
                    if ($conn->query($sql2)) {
                    }
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
            $_SESSION['msg'] = "Error al crear Registro, el E-mail no puede repetirse";
        }
        header('Location:../usuarios/principal.php');
    }
}
