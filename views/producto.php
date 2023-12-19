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
    <h1 class="mt-5 mb-5 display-6 text-center text-warning">
        Detalle del producto
    </h1>
    <div class="row w-75 mx-auto">
        <?php
        if (!empty($gorra)) { ?>
            <div class="col-12 col-md-6 order-md-2">
                <img class="img-fluid" src="img/gorras/<?= $gorra->getImagen() ?>" alt="Imagen de gorra <?= $gorra->getMarca() ?>, modelo <?= $gorra->getModelo() ?>">
            </div>
            <div class="col-12 col-md-6 order-md-1">
                <h2 class="text-warning"><?= $gorra->getMarca() ?> <?= $gorra->getModelo() ?></h2>
                <p class="text-muted fs-6">
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
                <p class="text-muted fs-6">Material: <?= $gorra->getMaterial() ?></p>
                <p class="text-muted fs-6">Fecha de lanzamiento: <?=
                                                                    date("d/m/Y", strtotime($gorra->getFechaLanzamiento())); ?>
                </p>
                <p class="text-dark"><?= $gorra->getDescripcion() ?></p>
                <p class="text-muted mt-2">(<?= $gorra->getStock() ?> unidades restantes)</p>
                <div class="d-flex align-items-center mt-3">
                    <h2 class="text-danger me-2"><?= $gorra->precio_formateado() ?></h2>
                    <span class="fs-6 text-danger">USD</span>
                </div>
                <form action="actions/add_gorra_carrito_acc.php" method="GET" class="mt-3">
                    <div class="row d-flex justify-content-center">
                        <div class="col-12">
                            <label for="cantidad" class="form-label text-dark">Cantidad:</label>
                            <input type="number" name="cantidad" id="cantidad" class="form-control" value="1">
                            <input type="hidden" name="id" id="id" value="<?= $gorra->getId() ?>">
                        </div>
                        <div class="col-12 mt-2">
                            <input type="submit" class="btn btn-danger w-100 fw-bold" value="Agregar al carrito"></input>
                        </div>
                    </div>
                </form>
                <div class="mt-3 text-end text-muted">
                    <?php
                    if ($cantidad === 1) {
                        echo "Ya agregaste ", $cantidad,  " unidad de esta gorra";
                    } else if ($cantidad > 0) {
                        echo "Ya agregaste ", $cantidad, " unidades de esta gorra";
                    }
                    ?>
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