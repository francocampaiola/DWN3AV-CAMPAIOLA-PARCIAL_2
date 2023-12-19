<?php
$modelo = "Air Jordan";
$objGorra = new Gorra();

$gorra = $objGorra->catalogo_x_modelo($modelo);
?>

<section class="container-fluid">
    <h1 class="mt-5 mb-5 display-6 text-center">
        <?= $modelo ?>
    </h1>
    <div class="container">
        <div class="row justify-content-center">
            <?php
            foreach ($gorra as $gorra) { ?>
                <div class="col-12 col-md-4">
                    <div class="card border-danger mb-4 shadow">
                        <img src="img/gorras/<?= $gorra->getImagen() ?>" alt="Imagen de gorra <?= $gorra->getMarca() ?>, modelo <?= $gorra->getModelo() ?>" class="card-img-top">
                        <div class="card-body">
                            <h2 class="card-title h5 text-danger"><?= $gorra->getMarca() ?> <?= $gorra->getModelo() ?></h2>
                            <p class="card-text fs-5 text-muted"><?= $gorra->precio_formateado() ?> USD</p>
                        </div>
                        <a href="index.php?sec=producto&id=<?= $gorra->getId() ?>" class="btn btn-outline-danger">
                            Ver más
                        </a>
                    </div>
                </div>
            <?php } ?>
        </div>
        <hr>
        <div class="row text-center">
            <h2 class="display-3">Destacá. Demostrá. Nueva línea Air Jordan.</h2>
            <img class="img-fluid mb-2" src="./img/jordan_banner.jpg" alt="Banner de jordan">
            <div class="col d-flex justify-content-center">
                <a href="index.php?sec=productos" class="btn btn-primary btn-sm btn-block">
                    Volver al catálogo
                </a>
            </div>
        </div>
    </div>
</section>