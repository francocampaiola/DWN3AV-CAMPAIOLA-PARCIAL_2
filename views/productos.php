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
                    <div class="col-12 col-md-4">
                        <div class="card border-warning mb-4 shadow">
                            <img src="img/gorras/<?= $gorra->getImagen() ?>" alt="Imagen de gorra <?= $gorra->getMarca() ?>, modelo <?= $gorra->getModelo() ?>" class="card-img-top">
                            <div class="card-body">
                                <h2 class="card-title h5 text-warning text-center"><?= $gorra->getMarca() ?> <?= $gorra->getModelo() ?></h2>
                                <p class="card-text fs-2 text-muted text-center"><?= $gorra->precio_formateado() ?> USD</p>
                            </div>
                            <a href="index.php?sec=producto&id=<?= $gorra->getId() ?>" class="btn btn-outline-warning">
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