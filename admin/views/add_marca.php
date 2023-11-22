<section>
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <h1 class="mt-5 mb-5 display-6 text-center">
                    Agregar marca
                </h1>
            </div>
        </div>
        <form class="row g-3" action="actions/add_marca_acc.php" method="POST" enctype="multipart/form-data">
            <div class="col-md-6 mb-3 mx-auto">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" class="form-control" id="nombre" name="nombre" required>
            </div>
            <button type="submit" class="btn btn-primary">Cargar</button>
        </form>
    </div>
</section>