<?php
require_once '../../functions/autoload.php';

$postData = $_POST;
$filesData = $_FILES['imagen'] ?? null;
$idGorra = $_GET['id'] ?? null;

try {
    $gorra = (new Gorra())->gorra_x_id($idGorra);

    if (!empty($filesData['tmp_name'])) {
        $imagen = (new Imagen())->subirImagen(__DIR__ . "../../img/gorras", $fileData);
    } else {
        $imagen = $gorra->getImagen();
    }

    print_r($gorra);

    $gorra->edit(
        $postData['marca_id'],
        $postData['modelo'],
        $postData['fecha_lanzamiento'],
        $postData['material_id'],
        $postData['color_id'],
        $postData['stock'],
        $postData['precio'],
        $postData['descripcion'],
        $imagen,
        $idGorra
    );

    (new Alerta())->registrar_alerta("success", "La gorra se editó con éxito");
    header('Location: ../index.php?sec=dashboard');
} catch (Exception $e) {
    (new Alerta())->registrar_alerta("danger", "No se pudo editar la gorra.");
    header('Location: ../index.php?sec=dashboard');
    die("No se pudo editar la gorra");
}
