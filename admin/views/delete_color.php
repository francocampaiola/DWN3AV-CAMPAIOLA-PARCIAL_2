<?php 
    $id = $_GET['id'] ?? FALSE;
    $color = (new Color())->get_x_id($id);
?>

<section>
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <h1 class="mt-5 mb-5 display-6 text-center">
                    Eliminar color
                </h1>
            </div>
        </div>
        <form class="row g-3" action="actions/delete_color_acc.php?id=<?= $color->getId() ?>" method="POST" enctype="multipart/form-data">
            <div class="col-md-6 mb-3">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" class="form-control" id="nombre" name="nombre" value="<?= $color->getNombre() ?>" required disabled>
            </div>
            <div class="col-md-6 mb-3">
                <label for="codigo_hexadecimal" class="form-label">Código hexadecimal</label>
                <input type="color" class="form-control form-control-color" name="codigo_hexadecimal" id="codigo_hexadecimal" value=<?= $color->getCodigoHexadecimal() ?> title="Seleccione un color" required disabled> 
            </div>
            <button type="submit" class="btn btn-primary btn-danger">Eliminar</button>
        </form>
    </div>
</section>