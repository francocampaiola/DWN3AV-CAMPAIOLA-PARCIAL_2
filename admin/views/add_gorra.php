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
        <form class="row g-3" action="actions/add_gorra_acc.php" method="POST" enctype="multipart/form-data">
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
                <div class="form-text">Te recomendamos que la imagen sea de 800x800 píxeles y en formato webp.</div>
            </div>

            <div class="col-md-6 mb-3">
                <label for="fecha_lanzamiento" class="form-label">Fecha de lanzamiento</label>
                <input type="date" class="form-control" id="fecha_lanzamiento" name="fecha_lanzamiento" required>
            </div>

            <div class="col-md-6 mb-3">
                <label for="material" class="form-label">Material</label>
                <select class="form-control" id="material_id" name="material_id" required>
                    <option selected="selected">Seleccionar un material</option>
                    <?php foreach ($materiales as $material) : ?>
                        <option value="<?= $material->getId() ?>" required><?= $material->getNombre() ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="col-md-6 mb-3">
                <label for="color" class="form-label">Color</label>
                <div class="form-check d-flex gap-2">
                    <?php foreach ($colores as $color) : ?>
                        <div>
                            <input name="color_id[]" id="color_id_<?= $color->getId() ?>" type="checkbox" value="<?= $color->getId() ?>"> <?= $color->getNombre() ?>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>


            <div class="col-md-6 mb-3">
                <label for="stock" class="form-label">Stock</label>
                <input type="number" min="0" class="form-control" id="stock" name="stock" required>
            </div>

            <div class="col-md-6 mb-3">
                <label for="precio" class="form-label">Precio</label>
                <input type="number" step=0.01 class="form-control" id="precio" name="precio" required>
            </div>

            <div class="col-md-12 mb-3">
                <label for="descripcion" class="form-label">Descripción</label>
                <textarea class="form-control" id="descripcion" name="descripcion"></textarea>
            </div>

            <button type="submit" class="btn btn-primary">Cargar</button>

        </form>
    </div>
</section>