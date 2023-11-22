<?PHP 

class Marca {
    protected $id;
    protected $nombre;

    /**
     * Devuelve los datos de una serie en particular
     * @param int $id El ID único de la serie 
     */
    public function get_x_id(int $id): ?Marca
    {
        $conexion = (new Conexion())->getConexion();
        $query = "SELECT * FROM marcas WHERE id = :id";

        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->setFetchMode(PDO::FETCH_CLASS, self::class);
        $PDOStatement->execute([':id' => $id]);

        $marca = $PDOStatement->fetch();

        return $marca;
    }

    /**
     * Inserta una nueva marca en la base de datos
     */
    public function insert(string $nombre)
    {
        $conexion = (new Conexion())->getConexion();
        $query = "INSERT INTO marcas (nombre) VALUES (:nombre)";

        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->execute([
            ':nombre' => $nombre
        ]);
    }

    /**
     * Edita los datos de una marca en particular
     */
    public function edit(
        string $nombre
    ) {
        $conexion = (new Conexion())->getConexion();
        $query = "UPDATE marcas SET nombre = :nombre WHERE id = :id";

        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->execute([
            ':nombre' => $nombre,
            ':id' => $this->id
        ]);
    }

    /**
     * Elimina una marca en particular
     */
    public function delete()
    {
        $conexion = (new Conexion())->getConexion();
        $query = "DELETE FROM marcas WHERE id = :id";

        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->execute([
            ':id' => $this->id
        ]);
    }

    /**
     * Devuelve un array con todas las marcas existentes en nuestro catalogo
     */
    public function listar(): array
    {
        $conexion = (new Conexion())->getConexion();
        $query = "SELECT * FROM marcas";

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

    public function getId()
    {
        return $this->id;
    }
}

?>