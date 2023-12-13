<?php
require_once '../../functions/autoload.php';

$postData = $_POST;

try {
    (new Marca())->insert(
        $postData['nombre']
    );
    (new Alerta())->registrar_alerta("success", "La marca se agregó correctamente");
    header('Location: ../../admin/index.php?sec=dashboard');
} catch (Exception $e) {
    (new Alerta())->registrar_alerta("error", "No se pudo agregar la marca.");
    die("No se pudo agregar la marca");
}
