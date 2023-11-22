<?php
$miObjetoColor = new Color();
$colores = $miObjetoColor->listar();
?>

<section>
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <h1 class="mt-5 mb-5 display-6 text-center">
                    Administración de gorras | Colores
                </h1>
            </div>
            <?php foreach ($colores as $color) {
            ?>
                <div class="col-12 col-md-3">
                    <div class="card gap-2 mb-2">
                        <div class="p-3" style="background-color: <?= $color->getCodigoHexadecimal() ?>"></div>
                        <div class="card-body">
                            <h2 class="card-title fs-5 text-center">
                                <?= $color->getNombre() ?>
                            </h2>
                        </div>
                        <div class="row mx-auto">
                            <div class="col">
                                <a href="index.php?sec=edit_color&id=<?= $color->getId() ?>" class="mb-2 btn btn-primary btn-lg btn-block">
                                    Editar
                                </a>
                            </div>
                            <div class="col">
                                <a href="index.php?sec=delete_color&id=<?= $color->getId() ?>" class="mb-2 btn btn-danger btn-lg btn-block">
                                    Borrar
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
            <a href="index.php?sec=add_color" class="mt-5 btn btn-primary btn-lg btn-block">
                Crear nuevo color
            </a>
        </div>
    </div>
</section>