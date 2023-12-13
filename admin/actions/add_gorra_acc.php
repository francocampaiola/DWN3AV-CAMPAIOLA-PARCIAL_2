<?php
require_once '../../functions/autoload.php';

$postData = $_POST;
$filesData = $_FILES['imagen'];

if (!empty($filesData['tmp_name'])) {
    $og_name = explode('.', $filesData['name']);
    $extension = end($og_name);
    $filename = time() . '.' . $extension;

    $fileUpload = move_uploaded_file($filesData['tmp_name'], '../../img/gorras/' . $filename);

    if (!$fileUpload) {
        die('Error al subir el archivo');
    } else {
        $imagen = $filename;
    }
} else {
    $imagen = "default.jpg";
}

try {
    (new Gorra())->insert(
        $postData['marca_id'],
        $postData['modelo'],
        $postData['fecha_lanzamiento'],
        $postData['material_id'],
        $postData['color_id'],
        $postData['stock'],
        $postData['precio'],
        $postData['descripcion'],
        $imagen,
    );

    (new Alerta())->registrar_alerta("success", "La gorra se agregó correctamente");
    header('Location: ../../admin/index.php?sec=dashboard');
} catch (Exception $e) {
    (new Alerta())->registrar_alerta("error", "No se pudo agregar la gorra.");
    die("No se pudo agregar la gorra, $e");
}
