<?PHP

class Color
{
    protected $id;
    protected $nombre;
    protected $codigo_hexadecimal;

    /**
     * Devuelve un array con los alias y IDS de todos los colores existentes en nuestro catalogo
     */
    public function get_colores_por_id_gorra($idGorra): array
    {
        $conexion = (new Conexion())->getConexion();
        $query = "SELECT colores.id, colores.nombre, colores.codigo_hexadecimal
        FROM colores
        LEFT JOIN colores_x_gorra ON colores_x_gorra.color_id = colores.id
        WHERE colores_x_gorra.gorra_id = :idGorra;";

        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->bindParam(':idGorra', $idGorra, PDO::PARAM_INT);
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
     * Devuelve un array con todos los colores existentes en nuestro catalogo
     */
    public function listar(): array
    {
        $conexion = (new Conexion())->getConexion();
        $query = "SELECT * FROM colores";

        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->setFetchMode(PDO::FETCH_CLASS, self::class);
        $PDOStatement->execute();

        $lista = $PDOStatement->fetchAll();

        return $lista;
    }


    /**
     * Get the value of nombre
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Get the value of id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get the value of codigo hexadecimal
     */
    public function getCodigoHexadecimal()
    {
        return $this->codigo_hexadecimal;
    }
}
