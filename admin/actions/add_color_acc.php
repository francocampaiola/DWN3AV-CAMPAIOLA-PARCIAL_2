<?php
require_once '../../functions/autoload.php';

$postData = $_POST;

try {
    (new Color())->insert(
        $postData['nombre'],
        $postData['codigo_hexadecimal']
    );

    (new Alerta())->registrar_alerta("success", "El color se agregó correctamente");
    header('Location: ../../admin/index.php?sec=admin_colores');
} catch (Exception $e) {
    (new Alerta())->registrar_alerta("error", "No se pudo agregar el color.");
    die("No se pudo agregar el color, $e");
}
