<?php
require_once '../../functions/autoload.php';

$postData = $_POST;

try {
    (new Material())->insert(
        $postData['nombre']
    );

    (new Alerta())->registrar_alerta("success", "El material se agregó correctamente");
    header('Location: ../../admin/index.php?sec=dashboard');
} catch (Exception $e) {
    (new Alerta())->registrar_alerta("error", "No se pudo agregar el material.");
    die("No se pudo agregar el material");
}
