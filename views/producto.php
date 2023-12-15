<?php

$id = $_GET['id'] ?? FALSE;

$objGorra = new Gorra();
$gorra = $objGorra->catalogo_x_id($id);
$colores = (new Color())->get_colores_por_id_gorra($id);

$carrito = new Carrito();
$productosCarrito = $carrito->listar_gorras();

if (count($colores) < 2) {
    $colores[] = (new Color())->get_x_id($gorra->getColor_id());
}

if (empty($productosCarrito)) {
    $cantidad = 0;
} else {
    foreach ($productosCarrito as $key => $value) {
        if ($id == $value['id']) {
            $cantidad = $value['cantidad'];
        } else {
            $cantidad = 0;
        }
    }
}

?>

<div class="container">
    <h1 class="mt-5 mb-5 display-6 text-center">
        Detalle del producto
    </h1>
    <div class="row w-75 mx-auto">
        <?php
        if (!empty($gorra)) { ?>
            <div class="col-12 col-md-8">
                <img class="img-fluid" src="img/gorras/<?= $gorra->getImagen() ?>" width="350px">
            </div>
            <div class="col-12 col-md-4">
                <div class="row pb-3">
                    <h2><?= $gorra->getMarca() ?> <?= $gorra->getModelo() ?></h2>
                    <p class="text-muted">Accesorio</p>
                </div>
                <div class="row pb-3">
                    <p class="fs-6">
                        <?php
                        if (count($colores) > 1) {
                            echo "Colores: ";
                            $numColores = count($colores);
                            foreach ($colores as $key => $color) {
                                echo $color->getNombre();

                                if ($key < $numColores - 1) {
                                    echo ", ";
                                }
                            }
                        } else {
                            echo "Color: ";
                            echo $colores[0]->getNombre();
                        }
                        ?>
                    </p>
                    <p class="fs-6">
                        Material: <?= $gorra->getMaterial() ?>
                    </p>
                    <p class="fs-6">
                        Fecha de lanzamiento: <?=
                                                date("d/m/Y", strtotime($gorra->getFechaLanzamiento())); ?>
                    </p>
                    <p class="text-muted">
                        <?= $gorra->getDescripcion() ?>
                    </p>
                    <p class="text-muted mt-2">
                        (<?= $gorra->getStock() ?> unidades restantes)
                    </p>
                </div>
                <div class="row mb-3">
                    <div class="d-flex">
                        <h2 class="text-danger mb-3"><?= $gorra->precio_formateado() ?></h2>
                        <span class="pe-2"></span>
                        <div class="text-danger fs-6">USD</div>
                    </div>
                    <div>
                        <form action="actions/add_gorra_carrito_acc.php" method="GET" class="row">
                            <div class="col-6">
                                <label for="cantidad" class="form-label">Cantidad:</label>
                                <input type="number" name="cantidad" id="cantidad" class="form-control" value="1">
                                <input type="hidden" name="id" id="id" value="<?= $gorra->getId() ?>">
                            </div>
                            <div class="col-12 mt-2">
                                <input type="submit" class="btn btn-danger w-100 fw-bold" value="Agregar al carrito"></input>
                                <input type="hidden" value="<?= $gorra->getId() ?>" name="id" id="id">
                            </div>
                        </form>
                    </div>
                    <div class="d-flex justify-content-end mt-3">
                        <p>Ya agregaste <? $cantidad ?> unidades de esta gorra.</p>
                    </div>
                </div>
            </div>

        <?php } else { ?>
            <div class="col">
                <h2 class="text-center m-5">No se encontró el producto deseado.</h2>
            </div>
        <?php }
        ?>
    </div>
</div>