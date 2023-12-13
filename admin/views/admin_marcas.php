<?php
    $miObjetoMarca = new Marca();
    $marcas = $miObjetoMarca->listar();
?>

<section>
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <h1 class="mt-5 mb-5 display-6 text-center">
                    Administración de gorras | Marcas
                </h1>
            </div>
            <div class="col-12 mt-3">
                <?= (new Alerta())->mostrar_alertas() ?>
            </div>
            <?php foreach ($marcas as $marca) {
            ?>
                <div class="col col-md-3">
                    <div class="card gap-2 mb-2">
                        <div class="card-body">
                            <h2 class="card-title fs-5 text-center">
                                <?= $marca->getNombre() ?>
                            </h2>
                        </div>
                        <div class="row mx-auto">
                            <div class="col-6">
                                <a href="index.php?sec=edit_marca&id=<?= $marca->getId() ?>" class="mb-2 btn btn-primary btn-lg btn-block">
                                    Editar
                                </a>
                            </div>
                            <div class="col-6">
                                <a href="index.php?sec=delete_marca&id=<?= $marca->getId() ?>" class="mb-2 btn btn-danger btn-lg btn-block">
                                    Borrar
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
            <a href="index.php?sec=add_marca" class="mt-5 btn btn-primary btn-lg btn-block">
                Crear nueva marca
            </a>
        </div>
    </div>
</section>