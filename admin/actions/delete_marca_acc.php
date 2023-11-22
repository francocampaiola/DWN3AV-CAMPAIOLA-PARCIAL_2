<?php
require_once '../../functions/autoload.php';

$idMarca = $_GET['id'] ?? null;

try {
    $marca = (new Marca())->get_x_id($idMarca);
    $marca->delete();

    header('Location: ../index.php?sec=dashboard');
} catch (Exception $e) {
    die("No se pudo eliminar la marca");
}
