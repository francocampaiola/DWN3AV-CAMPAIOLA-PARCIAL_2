<?PHP

class Color
{
    protected $id;
    protected $nombre;
    protected $codigo_hexadecimal;

    /**
     * Devuelve un array con los alias y IDS de todos los colores existentes en nuestro catalogo
     */
    public function listar_colores_x_gorra(): array
    {
        $conexion = (new Conexion())->getConexion();
        $query = "SELECT DISTINCT
                    colores.id,
                    colores.nombre
                    FROM colores
                    JOIN gorras ON gorras.color_id = colores.id;";

        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->setFetchMode(PDO::FETCH_CLASS, self::class);
        $PDOStatement->execute();

        $lista = $PDOStatement->fetchAll();

        return $lista;
    }

    /**
     * Devuelve los datos de un color en particular
     * @param int $id El ID único del color 
     */
    public function get_x_id(int $id): ?Color
    {
        $conexion = (new Conexion())->getConexion();
        $query = "SELECT * FROM colores WHERE id = ?";

        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->setFetchMode(PDO::FETCH_CLASS, self::class);

        $PDOStatement->execute([$id]);

        $result = $PDOStatement->fetch();

        return $result ?? null;
    }


    /**
     * Get the value of nombre
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Get the value of codigo hexadecimal
     */
    public function getCodigoHexadecimal()
    {
        return $this->codigo_hexadecimal;
    }
}
