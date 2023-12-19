<?php 
    require_once('../functions/autoload.php');
    $productosCarrito = (new Carrito())->listar_gorras();
    $postData = $_POST;
    $idUsuario = $_SESSION['loggedIn']['id'] ?? FALSE;

    try {
        if ($idUsuario) {
            $compraRealizada = [
                "id_usuario" => $idUsuario,
                "fecha" => date("Y-m-d", time()),
                "importe" => (new Carrito())->precio_carrito()
            ];

            $productosComprados = [];

            foreach ($productosCarrito as $key => $value) {
                $productosComprados[$key] = $value['cantidad'];
            }

            (new Carrito())->insertar_compra_database($compraRealizada, $productosComprados);
            (new Carrito())->vaciar_carrito();
            header('Location: ../index.php?sec=success');
        }
        else {
            (new Alerta())->registrar_alerta('danger','Tu sesión de usuario expiró. Volvé a iniciar sesión.');
            header('Location: ../index.php?sec=login');
        }
    }
    catch (Exception $e) {
        (new Alerta())->registrar_alerta('danger', 'No se pudo procesar el pago.');
    }