<section>
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <h1 class="mt-5 mb-5 display-6 text-center">
                    Panel de Administración
                </h1>
            </div>
            <p class="text-center">
                ¡Bienvenid@ a tu Panel de Administrador!
            </p>
            <p class="text-center">
                Navega por las diferentes secciones para administrar los productos de la tienda.
            </p>
            <div class="col-12 mt-3">
                <?= (new Alerta())->mostrar_alertas() ?>
            </div>
        </div>
    </div>
</section>