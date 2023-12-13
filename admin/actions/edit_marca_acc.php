<?php
require_once '../../functions/autoload.php';

$postData = $_POST;
$idMarca = $_GET['id'] ?? null;

try {
    $marca = (new Marca())->get_x_id($idMarca);

    $marca->edit(
        $postData['nombre']
    );

    (new Alerta())->registrar_alerta("success", "La marca se editó con éxito");
    header('Location: ../index.php?sec=dashboard');
} catch (Exception $e) {
    (new Alerta())->registrar_alerta("danger", "No se pudo editar la marca.");
    header('Location: ../index.php?sec=dashboard');
    die("No se pudo editar la marca");
}
