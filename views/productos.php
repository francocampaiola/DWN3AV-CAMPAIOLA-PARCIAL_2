<?php

$miObjetoGorra = new Gorra();

$catalogo = $miObjetoGorra->catalogo_completo();

?>

<section class="container-fluid">
    <h1 class="mt-5 mb-5 display-6 text-center">Catálogo de productos</h1>
    <div class="container">
        <?php if ($catalogo) { ?>
            <div class="row">
                <?php foreach ($catalogo as $gorra) { 
                        ?>
                    <div class="col-12 col-md-3">
                        <div class="card gap-2 mb-2">
                            <img src="img/gorras/<?= $gorra->getImagen() ?>" alt="Imagen de gorra <?= $gorra->getMarca() ?>, modelo <?= $gorra->getModelo() ?>">
                            <div class="card-body">
                                <h2 class="card-title fs-5"><?= $gorra->getMarca() ?> <?= $gorra->getModelo() ?></h5>
                                <p class="card-text mx-auto"><?= $gorra->precio_formateado() ?> USD</p>
                            </div>
                            <a href="index.php?sec=producto&id=<?= $gorra->getId()?>" class="ms-2 me-2 mb-2 btn btn-primary btn-lg btn-block">
                                Ver más
                            </a>
                        </div>
                    </div>
                <?php } ?>
            </div>
        <?php } else { ?>
            <p>No hay productos disponibles en el catálogo.</p>
        <?php } ?>
    </div>
</section>