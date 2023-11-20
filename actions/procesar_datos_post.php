<?php
$datos = $_POST;
?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Tienda de Gorras</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
        <link rel="stylesheet" href="./styles/style.css">
    </head>
    <body>
        <section>
            <div class="container">
                <div class="row">
                    <div class="col-12 text-center">
                        <h1 class="mt-5 mb-5 display-6 text-center">
                            ¡Gracias por contactarte, <?= $datos['nombre'] ?>!
                        </h1>
                        <p class="fs-5">
                            Recibimos tu mensaje exitosamente. En breve estaremos enviándote una respuesta a <?= $datos['email']?>.
                        </p>
                        <p class="fs-5">
                            Tu mensaje:
                        </p>
                        <span class="text-muted">
                            <?= $datos['mensaje'] ?>
                        </span>
                        <p class="fs-5 mt-2">
                            Mientras tanto, podés seguir navegando por nuestra tienda.
                        </p>
                        <a href="../index.php" class="btn btn-primary btn-sm btn-block">
                            Volver al inicio
                        </a>
                    </div>
                </div>
            </div>
        </section>
    </body>
</html>