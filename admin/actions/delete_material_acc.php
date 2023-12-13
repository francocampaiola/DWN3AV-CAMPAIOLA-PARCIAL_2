<?php
require_once '../../functions/autoload.php';

$idMaterial = $_GET['id'] ?? null;

try {
    $material = (new Material())->get_x_id($idMaterial);
    $material->delete();

    (new Alerta())->registrar_alerta("success", "El material se eliminó correctamente");
    header('Location: ../index.php?sec=dashboard');
} catch (Exception $e) {
    (new Alerta())->registrar_alerta("danger", "No se pudo eliminar el material. Es probable que existan gorras que sean de este material.");
    header('Location: ../index.php?sec=dashboard');
    die("No se pudo eliminar el material");
}
