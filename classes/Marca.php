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
        $query = "SELECT * FROM marcas WHERE id = $id";

        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->setFetchMode(PDO::FETCH_CLASS, self::class);
        $PDOStatement->execute();

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
}

?>