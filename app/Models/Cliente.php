<?php

namespace App\Models;

use App\Core\Database;
use PDO;

class Cliente
{
    private PDO $db;

    public function __construct()
    {
        $this->db = Database::getInstance();
    }

    /**
     * Obtener todos los clientes.
     *
     * DataTables se encargará de:
     * - búsqueda
     * - paginación
     * - ordenamiento
     * - cantidad de registros
     */
    public function obtenerTodos(): array
    {
        $sql = "
            SELECT
                c.id_cliente,
                c.documento,
                c.nombres,
                c.apellidos,
                c.alias,
                c.direccion,
                c.telefono,
                c.telefono2,
                c.foto_cliente,
                c.activo
            FROM clientes c

            ORDER BY
                c.nombres ASC,
                c.apellidos ASC
        ";

        $stmt = $this->db->prepare($sql);
        $stmt->execute();

        $clientes = $stmt->fetchAll();

        /*
         * Obtener las rutas de cada cliente.
         */
foreach ($clientes as &$cliente) {
    $cliente['rutas'] = $this->obtenerRutas(
        (int) $cliente['id_cliente']
    );
}

        unset($cliente);

        return $clientes;
    }


    /**
     * Obtener un cliente por ID.
     */
    public function obtenerPorId(int $id): ?array
    {
        $sql = "
            SELECT
                c.id_cliente,
                c.documento,
                c.nombres,
                c.apellidos,
                c.alias,
                c.direccion,
                c.telefono,
                c.telefono2,
                c.foto_cliente,
                c.foto_cedula_frontal,
                c.foto_cedula_atras,
                c.latitud,
                c.longitud,
                c.fecha_ubicacion,
                c.activo,
                c.fecha_registro,
                c.fecha_cancelacion
            FROM clientes c

            WHERE c.id_cliente = :id

            LIMIT 1
        ";

        $stmt = $this->db->prepare($sql);

        $stmt->execute([
            ':id' => $id
        ]);

        $cliente = $stmt->fetch();

        if (!$cliente) {
            return null;
        }

        $cliente['rutas'] = $this->obtenerRutas($id);

        return $cliente;
    }


    /**
     * Obtener las rutas asignadas a un cliente.
     */
    public function obtenerRutas(int $idCliente): array
    {
        $sql = "
            SELECT
                r.id_ruta,
                r.nombre_ruta,
                r.activo
            FROM cliente_ruta cr

            INNER JOIN rutas r
                ON r.id_ruta = cr.id_ruta

            WHERE cr.id_cliente = :id_cliente

            ORDER BY
                r.nombre_ruta ASC
        ";

        $stmt = $this->db->prepare($sql);

        $stmt->execute([
            ':id_cliente' => $idCliente
        ]);

        return $stmt->fetchAll();
    }


    /**
     * Obtener todas las rutas activas.
     */
    public function obtenerRutasDisponibles(): array
    {
        $sql = "
            SELECT
                id_ruta,
                nombre_ruta,
                activo
            FROM rutas

            WHERE activo = 1

            ORDER BY
                nombre_ruta ASC
        ";

        $stmt = $this->db->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll();
    }
}