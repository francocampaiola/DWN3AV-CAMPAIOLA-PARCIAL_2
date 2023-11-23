<?php
$miObjetoMaterial = new Material();
$materiales = $miObjetoMaterial->listar();
?>

<section>
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <h1 class="mt-5 mb-5 display-6 text-center">
                    Administración de gorras | Materiales
                </h1>
            </div>
            <?php foreach ($materiales as $material) {
            ?>
                <div class="col col-md-3">
                    <div class="card gap-2 mb-2">
                        <div class="card-body">
                            <h2 class="card-title fs-5 text-center">
                                <?= $material->getNombre() ?>
                            </h2>
                        </div>
                        <div class="row mx-auto">
                            <div class="col">
                                <a href="index.php?sec=edit_material&id=<?= $material->getId() ?>" class="mb-2 btn btn-primary btn-lg btn-block">
                                    Editar
                                </a>
                            </div>
                            <div class="col">
                                <a href="index.php?sec=delete_material&id=<?= $material->getId() ?>" class="mb-2 btn btn-danger btn-lg btn-block">
                                    Borrar
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
            <a href="index.php?sec=add_material" class="mt-5 btn btn-primary btn-lg btn-block">
                Crear nuevo material
            </a>
        </div>
    </div>
</section>