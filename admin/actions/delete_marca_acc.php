<?php
require_once '../../functions/autoload.php';

$idMarca = $_GET['id'] ?? null;

try {
    $marca = (new Marca())->get_x_id($idMarca);
    $marca->delete();

    (new Alerta())->registrar_alerta("success", "La marca se eliminó correctamente");
    header('Location: ../index.php?sec=dashboard');
} catch (Exception $e) {
    (new Alerta())->registrar_alerta("danger", "No se pudo eliminar la marca. Es probable que existan gorras que sean de esta marca.");
    header('Location: ../index.php?sec=dashboard');
    die("No se pudo eliminar la marca");
}
