<?php
    require_once '../functions/autoload.php';

    (new Carrito())->vaciar_carrito();
    header('Location: ../index.php?sec=carrito');
?>