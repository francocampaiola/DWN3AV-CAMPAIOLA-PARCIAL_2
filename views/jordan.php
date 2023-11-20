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
                <div class="col-12 col-md-3">
                    <div class="card gap-2 mb-2">
                        <img src="img/<?= $gorra->getImagen() ?>" alt="Imagen de gorra <?= $gorra->getMarca() ?>, modelo <?= $gorra->getModelo() ?>">
                        <div class="card-body">
                            <h2 class="card-title fs-5"><?= $gorra->getMarca() ?> <?= $gorra->getModelo() ?></h5>
                                <p class="card-text mx-auto"><?= $gorra->precio_formateado() ?> USD</p>
                        </div>
                        <a href="index.php?sec=producto&id=<?= $gorra->getId() ?>" class="ms-2 me-2 mb-2 btn btn-primary btn-lg btn-block">
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