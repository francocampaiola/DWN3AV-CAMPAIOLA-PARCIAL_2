<?PHP 

class Material {
    protected $id;
    protected $nombre;

    /**
     * Devuelve los datos de una marca en particular
     * @param int $id El ID único de la marca 
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
     * Get the value of nombre
     */ 
    public function getNombre()
    {
        return $this->nombre;
    }
}

?>