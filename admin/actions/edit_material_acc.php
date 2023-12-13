<?php
require_once '../../functions/autoload.php';

$postData = $_POST;
$idMaterial = $_GET['id'] ?? null;

try {
    $material = (new Material())->get_x_id($idMaterial);

    $material->edit(
        $postData['nombre']
    );

    (new Alerta())->registrar_alerta("success", "El material se editó con éxito");
    header('Location: ../index.php?sec=dashboard');
} catch (Exception $e) {
    (new Alerta())->registrar_alerta("danger", "No se pudo editar el material.");
    header('Location: ../index.php?sec=dashboard');
    die("No se pudo editar la material");
}
