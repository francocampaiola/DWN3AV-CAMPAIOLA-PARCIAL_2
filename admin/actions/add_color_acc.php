<?php
require_once '../../functions/autoload.php';

$postData = $_POST;

try {
    (new Color())->insert(
        $postData['nombre'],
        $postData['codigo_hexadecimal']
    );

    header('Location: ../../admin/index.php?sec=admin_colores');
} catch (Exception $e) {
    die("No se pudo agregar el color, $e");
}
