<?php
require_once '../../functions/autoload.php';

$idGorra = $_GET['id'] ?? null;

try {
    $gorra = (new Gorra())->gorra_x_id($idGorra);
    $gorra->delete();

    if (!empty($gorra->getImagen())) {
        (new Imagen())->borrarImagen(__DIR__ . "../../img/gorras/" . $gorra->getImagen());
    }
    (new Alerta())->registrar_alerta("success", "La gorra se eliminó correctamente");
    header('Location: ../index.php?sec=dashboard');
} catch (Exception $e) {
    (new Alerta())->registrar_alerta("danger", "No se pudo eliminar la gorra.");
    header('Location: ../index.php?sec=dashboard');
    die("No se pudo eliminar la gorra");
}
