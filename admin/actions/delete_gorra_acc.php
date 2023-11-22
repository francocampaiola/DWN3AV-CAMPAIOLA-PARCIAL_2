<?php
require_once '../../functions/autoload.php';

$idGorra = $_GET['id'] ?? null;

try {
    $gorra = (new Gorra())->gorra_x_id($idGorra);
    $gorra->delete();

    if (!empty($gorra->getImagen())) {
        (new Imagen())->borrarImagen(__DIR__ . "../../img/gorras/" . $gorra->getImagen());
    }
    header('Location: ../index.php?sec=dashboard');
} catch (Exception $e) {
    die("No se pudo eliminar la gorra");
}
