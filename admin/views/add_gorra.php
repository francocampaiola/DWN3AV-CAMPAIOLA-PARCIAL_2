<?php
$marcas = (new Marca())->listar();
$materiales = (new Material())->listar();
$colores = (new Color())->listar();
?>

<section>
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <h1 class="mt-5 mb-5 display-6 text-center">
                    Agregar una nueva gorra
                </h1>
            </div>
        </div>
        <form class="row g-3" action="actions/add_personaje_acc.php" method="POST" enctype="multipart/form-data">
            <div class="col-md-6 mb-3">
                <label for="nombre" class="form-label">Marca</label>
                <select class="form-control" id="marca_id" name="marca_id" required>
                <option selected="selected">Seleccionar una marca</option>
                <?php foreach ($marcas as $marca) : ?>
                    <option value="<?= $marca->getId() ?>"><?= $marca->getNombre() ?></option>
                <?php endforeach; ?>
                </select>
            </div>

            <div class="col-md-6 mb-3">
                <label for="modelo" class="form-label">Modelo</label>
                <input type="text" class="form-control" id="modelo" name="modelo" required>
            </div>

            <div class="col-md-6 mb-3">
                <label for="imagen" class="form-label">Imagen</label>
                <input class="form-control" type="file" id="imagen" name="imagen" required>
            </div>

            <div class="col-md-6 mb-3">
                <label for="fecha_lanzamiento" class="form-label">Fecha de lanzamiento</label>
                <input type="date" class="form-control" id="fecha_lanzamiento" name="fecha_lanzamiento" required>
            </div>

            <div class="col-md-6 mb-3">
                <label for="stock" class="form-label">Stock</label>
                <input type="number" class="form-control" id="stock" name="stock" required>
            </div>

            <div class="col-md-6 mb-3">
                <label for="precio" class="form-label">Precio</label>
                <input type="number" class="form-control" id="precio" name="precio" required>
            </div>

            <div class="col-md-12 mb-3">
                <label for="descripcion" class="form-label">Descripción</label>
                <textarea class="form-control" id="descripcion" name="descripcion"></textarea>
            </div>

            <button type="submit" class="btn btn-primary">Cargar</button>

        </form>
    </div>
</section>