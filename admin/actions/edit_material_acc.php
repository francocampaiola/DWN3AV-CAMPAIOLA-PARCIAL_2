<?php
require_once '../../functions/autoload.php';

$postData = $_POST;
$idMaterial = $_GET['id'] ?? null;

try {
    $material = (new Material())->get_x_id($idMaterial);

    $material->edit(
        $postData['nombre']
    );

    header('Location: ../index.php?sec=dashboard');
} catch (Exception $e) {
    die("No se pudo editar la material");
}
