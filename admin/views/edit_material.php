<?php 
    $id = $_GET['id'] ?? FALSE;
    $material = (new Material())->get_x_id($id);
?>

<section>
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <h1 class="mt-5 mb-5 display-6 text-center">
                    Editar material
                </h1>
            </div>
        </div>
        <form class="row g-3" action="actions/edit_material_acc.php?id=<?= $material->getId() ?>" method="POST" enctype="multipart/form-data">
            <div class="col-md-6 mb-3 mx-auto">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" class="form-control" id="nombre" name="nombre" value="<?= $material->getNombre() ?>" required>
            </div>
            <button type="submit" class="btn btn-primary">Actualizar</button>
        </form>
    </div>
</section>