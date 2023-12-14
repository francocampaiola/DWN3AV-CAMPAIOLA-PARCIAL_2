<?php

class Carrito
{
    /**
     * Método que agrega una nueva gorra al carrito
     * @param int $idGorra El ID de la gorra a agregar al carrito
     * @param int $cantidad La cantidad de gorras a agregar al carrito
     */
    public function agregar_gorra(int $idGorra, int $cantidad)
    {
        $gorraData = (new Gorra())->gorra_x_id($idGorra);

        if ($gorraData) {
            $_SESSION['carrito'][$idGorra] = [
                "id" => $gorraData->getId(),
                "imagen" => $gorraData->getImagen(),
                "marca" => $gorraData->getMarca(),
                "modelo" => $gorraData->getModelo(),
                "stock" => $gorraData->getStock(),
                "precio" => $gorraData->getPrecio(),
                "cantidad" => $cantidad
            ];
        }
    }

    /**
     * Método que lista todas las gorras que se encuentran en el carrito en ese momento.
     * @return array Devuelve un array con todos las gorras que hay en el carrito, o si está vacío, devuelve un array vacío.
     */
    public function listar_gorras(): array
    {
        if (!empty($_SESSION['carrito'])) {
            return $_SESSION['carrito'];
        } else {
            return [];
        }
    }

    /**
     * Método que elimina una gorra del carrito
     * @param int $idGorra El ID de la gorra a eliminar del carrito
     */
    public function borrar_gorra(int $idGorra)
    {
        if (isset($_SESSION['carrito'][$idGorra])) {
            unset($_SESSION['carrito'][$idGorra]);
        }
    }

    /**
     * Método que vacía el carrito.
     */
    public function vaciar_carrito()
    {
        $_SESSION['carrito'] = [];
    }

    /**
     * Método que actualiza el carrito a medida que se requiere.
     * @param array $cantidades Array asociativo que cuenta con los ID de cada gorra y las cantidades en cada caso.
     */
    public function actualizar_carrito(array $cantidades)
    {
        foreach ($cantidades as $key => $value) {
            if (isset($_SESSION['carrito'][$key])) {
                $_SESSION['carrito'][$key]['cantidad'] = $value;
            }
        }
    }

    /**
     * Método que devuelve el precio total actual del carrito.
     */
    public function precio_carrito()
    {
        $total = 0;
        if (!empty($_SESSION['carrito'])) {
            foreach ($_SESSION['carrito'] as $producto) {
                $total += $producto['precio'] * $producto['cantidad'];
            }
            return $total;
        }
    }

    /**
     * Método que devuelve la cantidad de gorras que hay en el carrito.
     */
    public function cantidad_total_gorras()
    {
        $totalGorras = 0;
        if (!empty($_SESSION['carrito'])) {
            foreach ($_SESSION['carrito'] as $gorra) {
                $totalGorras += $gorra['cantidad'];
            }
            return $totalGorras;
        }
    }

    /**
     * Método que inserta las compras en una tabla de la base de datos, junto a los detalles de cada gorra adquirida.
     * @param array $datosCompra Array con los datos de cada compra.
     * @param array $productosComprados Array con los productos comprados.
     */
    public function insertar_compra_database(array $datosCompra, array $productosComprados)
    {
        $conexion = (new Conexion())->getConexion();
        $query = 'INSERT INTO compras VALUES (NULL, :id_usuario, :fecha, :total)';

        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->execute([
            'id_usuario' => $datosCompra['id_usuario'],
            'fecha' => $datosCompra['fecha'],
            'total' => $datosCompra['total']
        ]);

        $idCompra = $conexion->lastInsertId();

        foreach ($productosComprados as $key => $value) {
            $query = "INSERT INTO productos_x_compra VALUES (NULL, :id_compra, :id_producto, :cantidad)";

            $PDOStatement = $conexion->prepare($query);
            $PDOStatement->execute([
                "id_compra" => $idCompra,
                "id_producto" => $key,
                "cantidad" => $value
            ]);
        }
    }
}
