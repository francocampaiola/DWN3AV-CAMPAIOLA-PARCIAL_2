<?php

$id = $_GET['id'] ?? FALSE;

$objGorra = new Gorra();
$gorra = $objGorra->catalogo_x_id($id);
$colores = (new Color())->listar_colores_x_gorra();

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
                        } else {
                            echo "Color: ";
                        }

                        $numColores = count($colores);
                        foreach ($colores as $key => $color) {
                            echo $color->getNombre();

                            if ($key < $numColores - 1) {
                                echo ", ";
                            }
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
                    <a href="index.php?sec=success" class="btn btn-danger w-100 fw-bold">COMPRAR</a>

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
