<?php
require_once '../../functions/autoload.php';

$postData = $_POST;

try {
    (new Marca())->insert(
        $postData['nombre']
    );

    header('Location: ../../admin/index.php?sec=dashboard');
} catch (Exception $e) {
    die("No se pudo agregar el color");
}
