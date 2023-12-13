<?php
require_once '../../functions/autoload.php';

$postData = $_POST;
$idColor = $_GET['id'] ?? null;

try {
    $color = (new Color())->get_x_id($idColor);

    $color->edit(
        $postData['nombre'],
        $postData['codigo_hexadecimal'],
        $idColor
    );

    (new Alerta())->registrar_alerta("success", "El color se editó con éxito");
    header('Location: ../index.php?sec=dashboard');
} catch (Exception $e) {
    (new Alerta())->registrar_alerta("danger", "No se pudo editar el color.");
    header('Location: ../index.php?sec=dashboard');
    die("No se pudo editar el color");
}
