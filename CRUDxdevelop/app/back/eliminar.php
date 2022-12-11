<?php

session_start();

require '../config/conexion.php';
$id = $conn->real_escape_string($_POST["id"]);


$sql = "DELETE FROM usuarios WHERE id=$id";
if ($conn->query($sql)) {
    $dir = "fotosperfil";

    $foto = $dir . '/' . $id . '.jpg';
    if (file_exists($foto)) {
        unlink($foto);
    }
    $_SESSION['color'] = "success";
    $_SESSION['msg'] = "Registro Eliminado";
} else {
    $_SESSION['color'] = "danger";
    $_SESSION['msg'] = "Error al eliminar el registro";
}
header('Location:../usuarios/principal.php');
