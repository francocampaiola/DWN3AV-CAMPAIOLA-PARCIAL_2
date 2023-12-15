<?php
require_once '../functions/autoload.php';

$postData = $_POST;

if (!empty($postData)) {
    (new Carrito())->actualizar_carrito($postData['cantidad']);
    header('Location: ../index.php?sec=carrito');
}

?>