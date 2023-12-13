<?php

$miObjetoGorra = new Gorra();

$catalogo = $miObjetoGorra->catalogo_completo();

?>

<section>
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <h1 class="mt-5 mb-5 display-6 text-center">
                    Administración general | Gorras
                </h1>
            </div>
            <div class="col-12 mt-3">
                <?= (new Alerta())->mostrar_alertas() ?>
            </div>
            <?php foreach ($catalogo as $gorra) {
            ?>
                <div class="col-12 col-md-3">
                    <div class="card gap-2 mb-2">
                        <img src="../img/gorras/<?= $gorra->getImagen() ?>" alt="Imagen de gorra <?= $gorra->getMarca() ?>, modelo <?= $gorra->getModelo() ?>">
                        <div class="card-body">
                            <h2 class="card-title fs-5 text-center"><?= $gorra->getMarca() ?> <?= $gorra->getModelo() ?></h5>
                        </div>
                        <div class="row mx-auto">
                            <div class="col-6">
                                <a href="index.php?sec=edit_gorra&id=<?= $gorra->getId() ?>" class="mb-2 btn btn-primary btn-lg btn-block">
                                    Editar
                                </a>
                            </div>
                            <div class="col-6">
                                <a href="index.php?sec=delete_gorra&id=<?= $gorra->getId() ?>" class="mb-2 btn btn-danger btn-lg btn-block">
                                    Borrar
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
            <a href="index.php?sec=add_gorra" class="mt-5 btn btn-primary btn-lg btn-block">
                Crear nueva gorra
            </a>
        </div>
    </div>
</section>