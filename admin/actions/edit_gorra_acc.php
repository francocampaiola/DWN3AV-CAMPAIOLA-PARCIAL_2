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

    header('Location: ../index.php?sec=dashboard');
} catch (Exception $e) {
    die("No se pudo editar la gorra");
}
