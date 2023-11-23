<?PHP 

class Material {
    protected $id;
    protected $nombre;

    /**
     * Devuelve los datos de un material en particular
     * @param int $id El ID único del material 
     */
    public function get_x_id(int $id): ?Material
    {
        $conexion = (new Conexion())->getConexion();
        $query = "SELECT * FROM materiales WHERE id = $id";

        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->setFetchMode(PDO::FETCH_CLASS, self::class);
        $PDOStatement->execute();

        $result = $PDOStatement->fetch();
        
        return $result ?? null;
    }

    /**
     * Inserta un nuevo material en la base de datos
     * @param string $nombre El nombre del material
     */
    public function insert(string $nombre)
    {
        $conexion = (new Conexion())->getConexion();
        $query = "INSERT INTO materiales (nombre) VALUES (:nombre)";

        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->execute([
            ':nombre' => $nombre
        ]);
    }

    /**
     * Edita los datos de un material en particular
     * @param string $nombre El nombre del material
     */
    public function edit(string $nombre)
    {
        $conexion = (new Conexion())->getConexion();
        $query = "UPDATE materiales SET nombre = :nombre WHERE id = :id";

        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->execute([
            ':nombre' => $nombre,
            ':id' => $this->id
        ]);
    }

    /**
     * Elimina un material en particular
     */
    public function delete()
    {
        $conexion = (new Conexion())->getConexion();
        $query = "DELETE FROM materiales WHERE id = :id";

        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->execute([
            ':id' => $this->id
        ]);
    }

    /**
     * Devuelve un array con todos los materiales existentes en nuestro catalogo
     */
    public function listar(): array
    {
        $conexion = (new Conexion())->getConexion();
        $query = "SELECT * FROM materiales";

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
}

?>