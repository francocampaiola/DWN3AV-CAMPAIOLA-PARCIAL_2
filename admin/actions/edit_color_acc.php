<?php
require_once '../../functions/autoload.php';

$postData = $_POST;
$idColor = $_GET['id'] ?? null;

try {
    $color = (new Color())->get_x_id($idColor);

    $color->edit(
        $postData['nombre'],
        $postData['codigo_hexadecimal']
    );

    header('Location: ../index.php?sec=dashboard');
} catch (Exception $e) {
    die("No se pudo editar el color");
}
