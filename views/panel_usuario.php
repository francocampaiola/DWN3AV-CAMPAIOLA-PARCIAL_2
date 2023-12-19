<?php
$datosUsuario = $_SESSION['loggedIn'];

?>

<div class=" d-flex justify-content-center p-5">
    <div>
        <div class="container">
            <h1 class="text-center mb-5 fw-bold">Panel de Usuario</h1>
            <div class="border rounded p-3 mb-4">
                <div class="row">
                    <div class="col-12 ">
                        <p class="text-center ">¡Bienvenid@ <?= $datosUsuario['username'] ?> a tu Panel de Usuario!</p>
                    </div>
                </div>
                <div class="row">
                    <?= (new Alerta())->mostrar_alertas() ?>
                </div>
            </div>
            <?php
            if ($datosUsuario['rol'] == 'superadmin' || $datosUsuario['rol'] == 'admin') {
                echo "<div class='row'>";
                echo "<div class='col-12'>";
                echo "<p class='text-center'>Parece que sos administrador...</p>";
                echo "<div class='d-flex'>";
                echo "<a class='mx-auto btn btn-primary text-center' href='admin/index.php?sec=dashboard'>Ir al admin</a>";
                echo "</div>";
                echo "</div>";
                echo "</div>";
            }
            ?>
        </div>
    </div>
</div>