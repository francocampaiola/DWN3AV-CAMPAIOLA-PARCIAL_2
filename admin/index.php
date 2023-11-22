<?php
require_once "../functions/autoload.php";

$secciones_validas = [
    'dashboard' => [
        'titulo' => 'Panel de Administración',
        'vista' => 'dashboard'
    ],
    'admin_gorras' => [
        'titulo' => 'Administración de gorras | General',
        'vista' => 'admin_gorras'
    ],
    'admin_colores' => [
        'titulo' => 'Administración de gorras | Colores',
        'vista' => 'admin_gorras'
    ],
    'admin_marcas' => [
        'titulo' => 'Administración de gorras | Marcas',
        'vista' => 'admin_marcas'
    ],
    'admin_materiales' => [
        'titulo' => 'Administración de gorras | Materiales',
        'vista' => 'admin_materiales'
    ],
    'add_gorra' => [
        'titulo' => 'Añadir gorra',
        'vista' => 'add_gorra'
    ],
    'edit_gorra' => [
        'titulo' => 'Editar gorra',
        'vista' => 'edit_gorra'
    ],
    'delete_gorra' => [
        'titulo' => 'Eliminar gorra',
        'vista' => 'delete_gorra'
    ],
    'add_color' => [
        'titulo' => 'Añadir color',
        'vista' => 'add_color'
    ],
    'edit_color' => [
        'titulo' => 'Editar color',
        'vista' => 'edit_color'
    ],
];

$secciones_navegables = [
    'dashboard' => 'Panel de Administración',
];

$secciones_navegables_dropdown = [
    'admin_gorras' => 'Administrador de productos',
    'admin_colores' => 'Administrador de colores',
    'admin_marcas' => 'Administrador de marcas',
    'admin_materiales' => 'Administrador de materiales'
];

$seccion = $_GET['sec'] ?? 'dashboard';

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
    <link rel="stylesheet" href="../styles/style.css">
    <link rel="icon" type="image/x-icon" href="../img/favicon.svg">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand disabled">
                <img src="../img/logo.svg" height="80" alt="Inicio">
            </a>
            <span class="badge bg-warning text-dark">Admin</span>
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
                        echo "<li class='nav-item dropdown'>";
                        echo "<a class='nav-link dropdown-toggle' href='#'; id='navbarDropdown' role='button' data-bs-toggle='dropdown' aria-expanded='false'>";
                        echo "Administración de gorras";
                        echo "</a>";
                        echo "<ul class='dropdown-menu aria-labelledby='navbarDropdown'>";
                        foreach ($secciones_navegables_dropdown as $key => $value) {
                            echo "<li><a class='";
                            if ($key == $seccion) {
                                echo " active";
                            }
                            echo " nav-link text-left ms-2' href='index.php?sec=$key'>$value</a></li>";
                        }
                        echo "</ul>";
                    ?>
                    <?php
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