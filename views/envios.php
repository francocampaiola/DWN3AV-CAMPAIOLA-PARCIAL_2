<section>
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-12 text-center">
                <h1 class="mt-5 mb-5 display-6 text-center">
                    Envíos y Pickup
                </h1>
                <p class="text-muted">
                    Envíos a todo el país a través de Correo Argentino. El costo del envío se calcula en base a la dirección de entrega y se muestra antes de finalizar la compra.
                </p>
                <p class="text-muted">
                    También podés retirar tu compra en nuestro local de Palermo. Una vez que tu compra esté lista para retirar, te enviaremos un correo electrónico con los detalles.
                </p>
                <p class="fs-5 pb-3 pt-2">
                    ¿Tenes dudas adicionales? Contactanos
                </p>
                <form action="./actions/procesar_datos_post.php" class="w-50 mx-auto mb-5" method="POST">
                    <input required type="text" name="nombre" id="nombre" placeholder="Nombre" class="form-control mb-3">
                    <input required type="email" name="email" id="email" placeholder="Email" class="form-control mb-3">
                    <textarea required name="mensaje" id="mensaje" cols="30" rows="10" placeholder="Mensaje" class="form-control mb-3"></textarea>
                    <input type="submit" value="Enviar" class="btn btn-primary btn-sm btn-block">
                </form>
                <a href="index.php" class="btn btn-secondary btn-sm btn-block">
                    Volver al inicio
                </a>
            </div>
        </div>
    </div>
</section>