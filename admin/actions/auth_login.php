<?PHP
require_once "../../functions/autoload.php";

$postData = $_POST;
var_dump($postData);

$login = (new Autenticacion())->login($postData['username'], $postData['password']);

if ($login) {
    header('location: ../index.php?sec=dashboard');
} else {
    header('location: ../index.php?sec=login');
}
