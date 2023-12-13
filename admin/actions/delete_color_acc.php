<?php
require_once '../../functions/autoload.php';

$idColor = $_GET['id'] ?? null;

try {
    $color = (new Color())->get_x_id($idColor);
    $color->delete();

    (new Alerta())->registrar_alerta("success", "El color se eliminó correctamente");
    header('Location: ../index.php?sec=dashboard');
} catch (Exception $e) {
    (new Alerta())->registrar_alerta("danger", "No se pudo eliminar el color. Es probable que existan gorras que sean de este color.");
    header('Location: ../index.php?sec=dashboard');
    die("No se pudo eliminar el color" . $e);
}
