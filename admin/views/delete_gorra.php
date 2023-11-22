<?php
$marcas = (new Marca())->listar();
$materiales = (new Material())->listar();
$colores = (new Color())->listar();
$id = $_GET['id'] ?? FALSE;
$gorra = (new Gorra())->gorra_x_id($id);
?>

<section>
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <h1 class="mt-5 mb-5 display-6 text-center">
                    Eliminar gorra
                </h1>
            </div>
        </div>
        <form class="row g-3" action="actions/delete_gorra_acc.php?id=<?= $gorra->getId() ?>" method="POST" enctype="multipart/form-data">
            <div class="col-md-6 mb-3">
                <label for="nombre" class="form-label">Marca</label>
                <select class="form-control" id="marca_id" name="marca_id" required disabled>
                    <?php foreach ($marcas as $marca) : ?>
                        <option value="<?= $marca->getId() ?>" <?= $marca->getNombre() == $gorra->getMarca() ? 'selected' : '' ?>>
                            <?= $marca->getNombre() ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="col-md-6 mb-3">
                <label for="modelo" class="form-label">Modelo</label>
                <input type="text" class="form-control" id="modelo" name="modelo" value="<?= $gorra->getModelo() ?>" required disabled>
            </div>
            <div class="col-md-6 mb-3">
                <label for="imagen" class="form-label">Imagen</label>
                <img src="../img/gorras/<?= $gorra->getImagen() ?>" height="200" width="200" alt="Imágen Illustrativa de <?= $gorra->getModelo() ?>" class="img-fluid rounded shadow-sm d-block">
            </div>
            <div class="col-md-4 mb-3">
                <label for="imagen" class="form-label">Reemplazar Imagen</label>
                <input class="form-control" type="file" id="imagen" name="imagen" disabled>
            </div>
            <div class="col-md-12 mb-3 text-center">
                <label for="color" class="form-label">Color</label>
                <div class="form-check d-flex gap-2 justify-content-center">
                    <?php foreach ($colores as $color) : ?>
                        <div>
                            <input name="color_id[]" id="color_id_<?= $color->getId() ?>" type="checkbox" disabled value="<?= $color->getId() ?>" <?= in_array($color->getId(), $gorra->getColores()) ? 'checked' : '' ?>>
                            <?= $color->getNombre() ?>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
            <div class="col-md-6 mb-3">
                <label for="fecha_lanzamiento" class="form-label">Fecha de lanzamiento</label>
                <input type="date" class="form-control" id="fecha_lanzamiento" name="fecha_lanzamiento" value=<?= $gorra->getFechaLanzamiento() ?> required disabled>
            </div>
            <div class="col-md-6 mb-3">
                <label for="material" class="form-label">Material</label>
                <select class="form-control" id="material_id" name="material_id" required disabled>
                    <option selected="selected">Seleccionar un material</option>
                    <?php foreach ($materiales as $material) : ?>
                        <option value="<?= $material->getId() ?>" <?= $material->getNombre() == $gorra->getMaterial() ? 'selected' : '' ?>>
                            <?= $material->getNombre() ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="col-md-6 mb-3">
                <label for="stock" class="form-label">Stock</label>
                <input type="number" min="0" class="form-control" id="stock" name="stock" value="<?= $gorra->getStock() ?>" required disabled>
            </div>
            <div class="col-md-6 mb-3">
                <label for="precio" class="form-label">Precio</label>
                <input type="number" step=0.01 class="form-control" id="precio" name="precio" value="<?= $gorra->getPrecio() ?>" required disabled>
            </div>
            <div class="col-md-12 mb-3">
                <label for="descripcion" class="form-label">Descripción</label>
                <textarea class="form-control" id="descripcion" name="descripcion" disabled><?= $gorra->getDescripcion() ?></textarea>
            </div>
            <button type="submit" class="btn btn-danger">Eliminar</button>
        </form>
    </div>
</section>