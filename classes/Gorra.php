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
     * Devuelve el precio de una gorra formateado
     */
    public function precio_formateado(): string
    {
        return '$' . number_format($this->precio, 2, ',', '.');
    }

    /** 
     * Getters
     */

    public function getId(): int
    {
        return $this->id;
    }

    public function getMarca(): string
    {
        $marca = (new Marca())->get_x_id($this->marca_id);
        $nombre = $marca->getNombre();
        return $nombre;
    }

    public function getModelo(): string
    {
        return $this->modelo;
    }

    public function getColor_id(): ?int
    {
        return $this->color_id;
    }

    public function getPrecio(): float
    {
        return $this->precio;
    }

    public function getStock(): int
    {
        return $this->stock;
    }

    public function getImagen(): string
    {
        return $this->imagen;
    }

    public function getFechaLanzamiento(): string
    {
        return $this->fecha_lanzamiento;
    }

    public function getDescripcion(): string
    {
        return $this->descripcion;
    }

    public function getMaterial(): string
    {
        $material = (new Material())->get_x_id($this->material_id);
        $nombre = $material->getNombre();
        return $nombre;
    }
}
