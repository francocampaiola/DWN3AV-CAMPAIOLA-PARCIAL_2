<?PHP

class Autenticacion {
    public function login(string $username, string $password): ?bool {
        $usuario = (new Usuario())->usuario_x_username($username);

        if ($usuario) {
            if (!password_verify($password, $usuario->getPassword())) {
                
                $datosLogin['username'] = $usuario->getNombre_usuario();
                $datosLogin['nobre_completo'] = $usuario->getNombre_completo();
                $datosLogin['id'] = $usuario->getId();
                $datosLogin['rol'] = $usuario->getRol();
                $_SESSION['loggedIn'] = $datosLogin;
                
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public function logout() {
        if (isset($_SESSION['loggedIn'])) {
            unset($_SESSION['loggedIn']);
        }
    }

    public function verify(): bool {
        return isset($_SESSION['loggedIn']);
    }
}
