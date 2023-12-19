<?PHP
require_once('../functions/autoload.php');

$idGorra = $_GET['id'] ?? FALSE;

if ($idGorra) {
    (new Carrito())->borrar_gorra($idGorra);
    header('Location: ../index.php?sec=carrito');
}
