<?PHP

class Conexion
{
    private const DB_SERVER = 'localhost';
    private const DB_USER = 'gorra';
    private const DB_PASS = 'gorra';
    private const DB_NAME = 'prog2_tienda_gorras';

    private const DB_DSN = 'mysql:host=' . self::DB_SERVER . ';dbname=' . self::DB_NAME . ';charset=utf8mb4';

    /**
     * Propiedad de tipo PDO
     */
    private static ?PDO $db = null;

    private static function conectar()
    {
        try {
            //se hace referencia la definición de la clase y no a la instancia
            self::$db = new PDO(self::DB_DSN, self::DB_USER, self::DB_PASS, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

        } catch (Exception $e) {
            die('Error al conectar con MySQL.');
        }
    }

    /**
     * Método que devuelve una conexión PDO lista para usar
     * @return PDO
     */
    public static function getConexion(): PDO
    {
        if (self::$db === null) {
            self::conectar();
        }
        
        return self::$db;
    }
}

?>

