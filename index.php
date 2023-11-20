<?php
    require_once "classes/Gorra.php";
    require_once "classes/Marca.php";
    require_once "classes/Color.php";
    require_once "classes/Material.php";
    require_once "classes/Conexion.php";

    $secciones_validas = [
        'home' => [
            'titulo' => 'Inicio',
            'vista' => 'home'
        ],
        'quienes_somos' => [
            'titulo' => '¿Quiénes somos?',
            'vista' => 'quienes_somos'
        ],
        'producto' => [
            'titulo' => 'Producto',
            'vista' => 'producto'
        ],
        'productos' => [
            'titulo' => 'Productos',
            'vista' => 'productos'
        ],
        'jordan' => [
            'titulo' => 'Jordan',
            'vista' => 'jordan'
        ],
        'envios' => [
            'titulo' => 'Envíos & Pickup',
            'vista' => 'envios'
        ],
        'success' => [
            'titulo' => '¡Gracias por su compra!',
            'vista' => 'success'
        ],
    ];

    $secciones_navegables = [
        'home' => 'Inicio',
        'quienes_somos' => '¿Quiénes somos?',
        'productos' => 'Productos',
        'jordan' => 'Jordan',
        'envios' => 'Envíos & Pickup'
    ];

    $seccion = $_GET['sec'] ?? 'home';

    if (!array_key_exists($seccion, $secciones_validas)) {
        $vista = "404";
        $titulo = "404: Página no encontrada";
    } else {
        $vista = $seccion;
        $titulo = $secciones_validas[$seccion]['titulo'];
    }
?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Tienda de Gorras | <?= $titulo ?></title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
        <link rel="stylesheet" href="./styles/style.css">
        <link rel="icon" type="image/x-icon" href="img/favicon.svg">
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <a class="navbar-brand disabled">
                    <img src="img/logo.svg" height="80" alt="Inicio">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                    <ul class="navbar-nav ms-auto text-end">
                        <?php 
                            foreach ($secciones_navegables as $key => $value) {
                                echo "<li class='nav-item'>";
                                echo "<a class='nav-link";
                                if ($key == $seccion) {
                                    echo " active";
                                }
                                echo "' href='index.php?sec=$key'>$value</a>";
                                echo "</li>";
                            }
                        ?>
                    </ul>
                </div>
            </div>
        </nav>

        <main>
            <?php
                require_once "views/$vista.php"
            ?>
        </main>

        <footer class="container-fluid">
            <hr>
            <p class="text-center"><strong>Tienda de Gorras © 2023</strong></p>
        </footer>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>
        
    </body>
</html>