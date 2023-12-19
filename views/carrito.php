<?php

$carrito = new Carrito();
$productosCarrito = $carrito->listar_gorras();

?>

<section class="container-fluid">
    <h1 class="mt-5 mb-5 display-6 text-center">Carrito</h1>
    <div class="container">
        <?php
        if (count($productosCarrito) > 0) { ?>
            <form action="actions/update_carrito_acc.php" method="POST">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Imagen</th>
                            <th>Marca y modelo</th>
                            <th>Precio</th>
                            <th>Cantidad</th>
                            <th>Subtotal</th>
                            <th>Eliminar</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?PHP
                        foreach ($productosCarrito as $key => $producto) {
                            $subtotal = $producto['precio'] * $producto['cantidad'];
                        ?>
                            <tr>
                                <td class="align-middle"><a href="index.php?sec=detalle_prod&id=<?= $key ?>"><img src="./img/gorras/<?= $producto['imagen'] ?>" alt="<?= $producto['alt'] ?>" class="img-fluid shadow-sm" width="100"></a></td>
                                <td class="align-middle"><?= $producto['marca'], ' ', $producto['modelo'] ?></td>
                                <td class="align-middle">$<?= number_format($producto['precio'], 2, ",", ".") ?></td>
                                <td class="align-middle" width="10%">
                                    <label for="cantidad_<?= $key ?>" class="visually-hidden">Cantidad</label>
                                    <input type="number" name="cantidad[<?= $key ?>]" id="cantidad_<?= $key ?>" value="<?= $producto['cantidad'] ?>" class="form-control">
                                </td>
                                <td class="align-middle">$<?= number_format($subtotal, 2, ",", ".") ?></td>
                                <td class="align-middle">
                                    <a href="actions/delete_gorra_carrito_acc.php?id=<?= $producto['id'] ?>">
                                        <img src="./img/icon_delete.png" alt="eliminar" height="30px">
                                    </a>
                                </td>
                            </tr>
                        <?PHP } ?>
                        <tr>
                            <td colspan="4" class="text-end">Total</td>
                            <td>$<?= number_format($carrito->precio_carrito(), 2, ",", ".") ?></td>
                            <td></td>
                        </tr>
                    </tbody>
                </table>
                <div class="row justify-content-end mt-5 mb-5">
                    <div class="col-4">
                        <input type="submit" value="Actualizar carrito" class="btn btn-secondary w-100">
                    </div>
                    <div class="col-4">
                        <a href="index.php?sec=productos" class="btn btn-secondary w-100">Volver a la tienda</a>
                    </div>
                    <div class="col-4">
                        <a href="actions/empty_carrito_acc.php" class="btn btn-secondary w-100">Vaciar el carrito</a>
                    </div>
                    <div class="row mt-3 mx-auto">
                        <div class="col-12">
                            <a href="actions/checkout_acc.php" class="btn btn-primary w-100">Finalizar la compra</a>
                        </div>
                    </div>
                </div>
            </form>
        <?php } else { ?>
            <div class="d-flex flex-column row align-items-center">
                <div class="col-6 d-flex flex-column justify-content-center">
                    <h3 class="text-center">¡No hay productos en el carrito!</h3>
                    <a href="index.php?sec=productos" class="btn btn-secondary mx-auto mt-5 mb-5">Volver a la tienda</a>
                </div>
            </div>
        <?php } ?>
    </div>
</section>