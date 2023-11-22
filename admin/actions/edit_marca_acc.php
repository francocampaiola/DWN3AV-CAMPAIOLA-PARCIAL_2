<?php
require_once '../../functions/autoload.php';

$postData = $_POST;
$idMarca = $_GET['id'] ?? null;

try {
    $marca = (new Marca())->get_x_id($idMarca);

    $marca->edit(
        $postData['nombre']
    );

    header('Location: ../index.php?sec=dashboard');
} catch (Exception $e) {
    die("No se pudo editar la marca");
}
