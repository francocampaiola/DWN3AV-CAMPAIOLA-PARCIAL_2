<?PHP
require_once "../../functions/autoload.php";

(new Autenticacion())->logout();
header('location: ../index.php?sec=login');
