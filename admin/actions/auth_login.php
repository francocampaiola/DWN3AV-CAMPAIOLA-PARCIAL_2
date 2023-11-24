<?PHP
require_once "../../functions/autoload.php";

$postData = $_POST;

$login = (new Autenticacion())->login($postData['username'], $postData['password']);

if ($login) {
    if ($login == "usuario") {
        header('location: ../../index.php?sec=panel_usuario');
    } else {
        header('location: ../index.php?sec=dashboard');
    }
} else {
    header('location: ../index.php?sec=login');
}
