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
                        <tr>Imagen</tr>
                        <tr>Marca y modelo</tr>
                        <tr>Precio</tr>
                        <tr>Cantidad</tr>
                        <tr>Subtotal</tr>
                        <tr>Eliminar</tr>
                    </thead>
                    <tbody>
                        <?PHP
                        foreach ($productosCarrito as $key => $producto) {
                            $subtotal = $producto['precio'] * $producto['cantidad'];

                        ?>
                            <tr>
                                <td class="align-middle"><a href="index.php?sec=detalle_prod&id=<?= $key ?>"><img src="./img/productos/<?= $producto['imagen'] ?>" alt="<?= $producto['alt'] ?>" class="img-fluid shadow-sm" width="100"></a></td>
                                <td class="align-middle"><?= $producto['nombre'] ?></td>
                                <td class="align-middle">$<?= number_format($producto['precio'], 2, ",", ".") ?></td>
                                <td class="align-middle" width="10%">
                                    <label for="cantidad_<?= $key ?>" class="visually-hidden">Cantidad</label>
                                    <input type="number" name="cantidad[<?= $key ?>]" id="cantidad_<?= $key ?>" value="<?= $producto['cantidad'] ?>" class="form-control">
                                </td>
                                <td class="align-middle">$<?= number_format($subtotal, 2, ",", ".") ?></td>
                                <td class="align-middle">
                                    <a href="actions/delete_prod_carrito_act.php?id=<?= $producto['id'] ?>">
                                        <img src="img/iconos/icon-delete.png" alt="eliminar"></a>
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
            </form>
        <?php } else { ?>
            <div class="d-flex flex-column row align-items-center">
                <div class="col-6 d-flex flex-column justify-content-center">
                    <h3 class="text-center">¡No hay productos en el carrito!</h3>
                    <img class="img-fluid d-block" src="./img/carrito-vacio.jpg" alt="ilustración de un carrito vacío y una mujer con cara triste">
                    <a href="index.php?sec=catalogo_completo" class="btn btn-grey-white mx-auto mt-5 mb-5">Volver a la tienda</a>
                </div>
            </div>
        <?php } ?>
    </div>
</section>