<?php

class Gorra
{
    private $id;
    private $marca_id;
    private $material_id;
    private $color_id;
    private $modelo;
    private $precio;
    private $stock;
    private $imagen;
    private $fecha_lanzamiento;
    private $descripcion;

    /**
     * Devuelve el catálogo de gorras completo
     */
    public function catalogo_completo(): array
    {
        $conexion = (new Conexion())->getConexion();
        $query = "SELECT * FROM gorras";

        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->setFetchMode(PDO::FETCH_CLASS, self::class);
        $PDOStatement->execute();

        $catalogo = $PDOStatement->fetchAll();

        return $catalogo;
    }

    /** 
     * Devuelve el catálogo de gorras filtrado por id
     * @param int $id Un int con el id a buscar
     * @return Gorra Un objeto Gorra.
     */
    public function catalogo_x_id(int $id): ?Gorra
    {
        $catalogo = $this->catalogo_completo();
        foreach ($catalogo as $gorra) {
            if ($gorra->id == $id) {
                return $gorra;
            }
        }

        return null;
    }

    /** 
     * Devuelve una gorra filtrada por id
     * @param int $id Un int con el id a buscar
     * @return Gorra Un objeto Gorra.
     */
    public function gorra_x_id(int $id): ?Gorra
    {
        $conexion = (new Conexion())->getConexion();
        $query = "SELECT * FROM gorras WHERE id = :id";

        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->setFetchMode(PDO::FETCH_CLASS, self::class);
        $PDOStatement->execute([':id' => $id]);

        $gorra = $PDOStatement->fetch();

        return $gorra;
    }

    /** 
     * Devuelve el catálogo de gorras filtrado por modelo
     * @param string $modelo Un string con el nombre del modelo a buscar
     * @return Gorra[] Un Array lleno de instancias de objeto Gorra.
     */
    public function catalogo_x_modelo(string $modelo): array
    {
        $resultado = [];
        $catalogo = $this->catalogo_completo();

        foreach ($catalogo as $gorra) {
            if ($gorra->modelo == $modelo) {
                $resultado[] = $gorra;
            }
        }

        return $resultado;
    }

    /**
     * Inserta una gorra en la base de datos
     * @param int $marca_id Un int con el id de la marca
     * @param string $modelo Un string con el nombre del modelo
     * @param string $fecha_lanzamiento Un string con la fecha de lanzamiento
     * @param int $material_id Un int con el id del material
     * @param array $color_id Un array con los ids de los colores
     * @param int $stock Un int con el stock
     * @param float $precio Un float con el precio
     * @param string $descripcion Un string con la descripción
     * @param string $imagen Un string con el nombre de la imagen
     */
    public function insert(
        int $marca_id,
        string $modelo,
        string $fecha_lanzamiento,
        int $material_id,
        array $color_id,
        int $stock,
        float $precio,
        string $descripcion,
        string $imagen
    ) {
        $conexion = (new Conexion())->getConexion();
        $query = "INSERT INTO gorras (marca_id, material_id, color_id, modelo, imagen, fecha_lanzamiento, descripcion, stock, precio) VALUES (:marca_id, :material_id, :color_id, :modelo, :imagen, :fecha_lanzamiento, :descripcion, :stock, :precio)";

        $color_id_str = implode(',', $color_id);

        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->execute(
            [
                ':marca_id' => $marca_id,
                ':material_id' => $material_id,
                ':color_id' => $color_id_str,
                ':modelo' => $modelo,
                ':imagen' => $imagen,
                ':fecha_lanzamiento' => $fecha_lanzamiento,
                ':descripcion' => $descripcion,
                ':stock' => $stock,
                ':precio' => $precio
            ]
        );

        $gorra_id = $conexion->lastInsertId();

        $queryColores = "INSERT INTO colores_x_gorra (gorra_id, color_id) VALUES (:gorra_id, :color_id)";
        $PDOStatementColores = $conexion->prepare($queryColores);

        foreach ($color_id as $color) {
            $PDOStatementColores->execute([
                ':gorra_id' => $gorra_id,
                ':color_id' => $color
            ]);
        }
    }

    /**
     * Edita una gorra en la base de datos
     * @param int $marca_id Un int con el id de la marca
     * @param string $modelo Un string con el nombre del modelo
     * @param string $fecha_lanzamiento Un string con la fecha de lanzamiento
     * @param int $material_id Un int con el id del material
     * @param array $color_id Un array con los ids de los colores
     * @param int $stock Un int con el stock
     * @param float $precio Un float con el precio
     * @param string $descripcion Un string con la descripción
     * @param string $imagen Un string con el nombre de la imagen
     * @param int $id Un int con el id de la gorra
     */
    public function edit(
        int $marca_id,
        string $modelo,
        string $fecha_lanzamiento,
        int $material_id,
        array $color_id,
        int $stock,
        float $precio,
        string $descripcion,
        string $imagen,
        int $id
    ) {
        $conexion = (new Conexion())->getConexion();

        // Actualizar información de la gorra
        $query = "UPDATE gorras SET marca_id = :marca_id, material_id = :material_id, modelo = :modelo, imagen = :imagen, fecha_lanzamiento = :fecha_lanzamiento, descripcion = :descripcion, stock = :stock, precio = :precio WHERE id = :id";

        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->execute(
            [
                ':marca_id' => $marca_id,
                ':material_id' => $material_id,
                ':modelo' => $modelo,
                ':imagen' => $imagen,
                ':fecha_lanzamiento' => $fecha_lanzamiento,
                ':descripcion' => $descripcion,
                ':stock' => $stock,
                ':precio' => $precio,
                ':id' => $id
            ]
        );

        $queryDelete = "DELETE FROM colores_x_gorra WHERE gorra_id = :gorra_id";
        $PDOStatementDelete = $conexion->prepare($queryDelete);
        $PDOStatementDelete->execute([':gorra_id' => $id]);

        $queryColores = "INSERT INTO colores_x_gorra (gorra_id, color_id) VALUES (:gorra_id, :color_id)";
        $PDOStatementColores = $conexion->prepare($queryColores);

        foreach ($color_id as $color) {
            $PDOStatementColores->execute([
                ':gorra_id' => $id,
                ':color_id' => $color
            ]);
        }
    }

    /**
     * Elimina una gorra de la base de datos
     */
    public function delete()
    {
        $conexion = (new Conexion())->getConexion();
        $query = "DELETE FROM gorras WHERE id = :id"; // Modificar aquí

        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->execute([':id' => $this->id]); // Modificar aquí
    }

    /** 
     * Devuelve el precio de una gorra formateado
     */
    public function precio_formateado(): string
    {
        return '$' . number_format($this->precio, 2, ',', '.');
    }

    /**
     * Devuelve un array con los ids de los colores de una gorra
     */
    public function getColores(): array
    {
        $conexion = (new Conexion())->getConexion();
        $colores = [];

        // Obtener el color directamente de la tabla gorras
        if ($this->color_id !== null) {
            $colores[] = $this->color_id;
        }

        // Obtener colores adicionales de la tabla colores_x_gorra
        $query = "SELECT color_id FROM colores_x_gorra WHERE gorra_id = :gorra_id";
        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->execute([':gorra_id' => $this->getId()]);

        $coloresAdicionales = $PDOStatement->fetchAll(PDO::FETCH_COLUMN);

        // Combinar los colores obtenidos de ambas fuentes
        $colores = array_merge($colores, $coloresAdicionales);

        return $colores;
    }

    /** 
     * Getters
     */

    /**
     * Devuelve el id de una gorra
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * Devuelve el id de la marca de una gorra
     */
    public function getMarca(): string
    {
        $marca = (new Marca())->get_x_id($this->marca_id);
        $nombre = $marca->getNombre();
        return $nombre;
    }

    /**
     * Devuelve el id del material de una gorra
     */
    public function getMaterial_id(): int
    {
        return $this->material_id;
    }

    /**
     * Devuelve el nombre del modelo de una gorra
     */
    public function getModelo(): string
    {
        return $this->modelo;
    }

    /**
     * Devuelve el id del color de una gorra
     */
    public function getColor_id(): ?int
    {
        return $this->color_id;
    }

    /**
     * Devuelve el precio de una gorra
     */
    public function getPrecio(): float
    {
        return $this->precio;
    }

    /**
     * Devuelve el stock de una gorra
     */
    public function getStock(): int
    {
        return $this->stock;
    }

    /**
     * Devuelve el nombre de la imagen de una gorra
     */
    public function getImagen(): string
    {
        return $this->imagen;
    }

    /**
     * Devuelve la fecha de lanzamiento de una gorra
     */
    public function getFechaLanzamiento(): string
    {
        return $this->fecha_lanzamiento;
    }

    /**
     * Devuelve la descripción de una gorra
     */
    public function getDescripcion(): string
    {
        return $this->descripcion;
    }

    /**
     * Devuelve el nombre del material de una gorra
     */
    public function getMaterial(): string
    {
        $material = (new Material())->get_x_id($this->material_id);
        $nombre = $material->getNombre();
        return $nombre;
    }
}
