<?PHP

class Autenticacion
{
    public function login(string $username, string $password): ?bool
    {
        $usuario = (new Usuario())->usuario_x_username($username);

        if ($usuario) {
            if ((password_verify($password, $usuario->getPassword()))) {
                $datosLogin['username'] = $usuario->getNombre_usuario();
                $datosLogin['nombre_completo'] = $usuario->getNombre_completo();
                $datosLogin['id'] = $usuario->getId();
                $datosLogin['rol'] = $usuario->getRol();
                $datosLogin['password'] = $usuario->getPassword();
                $_SESSION['loggedIn'] = $datosLogin;
                // Reviso el contenido de la variable $password 
                echo "<pre>";
                print_r($password);
                echo "</pre>";

                return true;
            } else {
                (new Alerta())->registrar_alerta("danger", "Contraseña incorrecta. Validá tus datos y volvé a intentarlo.");
                return false;
            }
        } else {
            (new Alerta())->registrar_alerta("danger", "El usuario $usuario no se encuentra en nuestra base de datos. Por favor, validalo y volve a intentarlo.");
            return null;
        }
    }

    public function logout()
    {
        if (isset($_SESSION['loggedIn'])) {
            unset($_SESSION['loggedIn']);
        }
    }

    public function verify($admin = TRUE): bool
    {
        if (isset($_SESSION['loggedIn'])) {
            if ($admin) {
                if ($_SESSION['loggedIn']['rol'] == "admin" or $_SESSION['loggedIn']['rol'] == "superadmin") {
                    return TRUE;
                } else {
                    header('location: index.php?sec=home');
                }
            } else {
                return TRUE;
            }
        } else {
            header('location: index.php?sec=login');
        }
    }
}
