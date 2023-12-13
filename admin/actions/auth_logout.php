<?PHP
require_once "../../functions/autoload.php";

(new Autenticacion())->logout();
(new Alerta())->registrar_alerta("success", "Sesión cerrada exitosamente.");
header('location: ../../index.php?sec=login');
