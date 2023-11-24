<section>
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <h1 class="mt-5 mb-5 display-6 text-center">
                    Iniciar sesión
                </h1>
            </div>
            <form action="admin/actions/auth_login.php" method="POST">
                <div class="form-group mb-3">
                    <label for="username">Nombre de usuario</label>
                    <input type="text" name="username" class="form-control" id="username" placeholder="nombre.apellido">
                </div>
                <div class="form-group mb-3">
                    <label for="pass">Password</label>
                    <input type="password" class="form-control" name="password" id="password" placeholder="**************">
                </div>
                <button type="submit" class="d-flex mx-auto btn btn-primary">Iniciar sesión</button>
            </form>
        </div>
    </div>
</section>