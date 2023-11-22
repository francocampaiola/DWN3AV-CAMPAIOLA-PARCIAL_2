<?php
require_once '../../functions/autoload.php';

$idColor = $_GET['id'] ?? null;

try {
    $color = (new Color())->get_x_id($idColor);
    $color->delete();

    header('Location: ../index.php?sec=dashboard');
} catch (Exception $e) {
    die("No se pudo eliminar el color" . $e);
}
