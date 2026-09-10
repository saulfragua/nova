<?php

namespace App\Models;

use App\Core\Database;
use PDO;

class Cliente
{
    /*
    |--------------------------------------------------------------------------
    | CONEXIÓN
    |--------------------------------------------------------------------------
    */

    private PDO $db;


    /*
    |--------------------------------------------------------------------------
    | CONSTRUCTOR
    |--------------------------------------------------------------------------
    */

    public function __construct()
    {
        $this->db = Database::getInstance();
    }


    /*
    |--------------------------------------------------------------------------
    | OBTENER TODOS LOS CLIENTES
    |--------------------------------------------------------------------------
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

        $clientes = $stmt->fetchAll(
            PDO::FETCH_ASSOC
        );


        /*
        |--------------------------------------------------------------------------
        | RUTAS
        |--------------------------------------------------------------------------
        */

        foreach ($clientes as &$cliente) {

            $cliente['rutas'] =
                $this->obtenerRutas(
                    (int) $cliente['id_cliente']
                );
        }

        unset($cliente);


        return $clientes;
    }


    /*
    |--------------------------------------------------------------------------
    | OBTENER CLIENTE POR ID
    |--------------------------------------------------------------------------
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

            WHERE c.id_cliente = :cliente_id

            LIMIT 1
        ";

        $stmt = $this->db->prepare($sql);

        $stmt->bindValue(
            ':cliente_id',
            $id,
            PDO::PARAM_INT
        );

        $stmt->execute();

        $cliente = $stmt->fetch(
            PDO::FETCH_ASSOC
        );


        if (!$cliente) {
            return null;
        }


        /*
        |--------------------------------------------------------------------------
        | RUTAS
        |--------------------------------------------------------------------------
        */

        $cliente['rutas'] =
            $this->obtenerRutas($id);


        return $cliente;
    }


    /*
    |--------------------------------------------------------------------------
    | OBTENER RUTAS DE UN CLIENTE
    |--------------------------------------------------------------------------
    */

    public function obtenerRutas(
        int $idCliente
    ): array {

        $sql = "
            SELECT
                r.id_ruta,
                r.nombre_ruta,
                r.activo

            FROM cliente_ruta cr

            INNER JOIN rutas r
                ON r.id_ruta = cr.id_ruta

            WHERE cr.id_cliente = :cliente_id

            ORDER BY
                r.nombre_ruta ASC
        ";

        $stmt = $this->db->prepare($sql);

        $stmt->bindValue(
            ':cliente_id',
            $idCliente,
            PDO::PARAM_INT
        );

        $stmt->execute();

        return $stmt->fetchAll(
            PDO::FETCH_ASSOC
        );
    }


    /*
    |--------------------------------------------------------------------------
    | OBTENER RUTAS DISPONIBLES
    |--------------------------------------------------------------------------
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

        return $stmt->fetchAll(
            PDO::FETCH_ASSOC
        );
    }


    /*
    |--------------------------------------------------------------------------
    | CONTAR CLIENTES
    |--------------------------------------------------------------------------
    |
    | Esta función cuenta los clientes DESPUÉS de aplicar:
    |
    | - búsqueda
    | - estado
    | - ruta
    |
    */

/**
 * =========================================================================
 * CONTAR CLIENTES SEGÚN FILTROS
 * =========================================================================
 *
 * Aplica:
 *
 * - búsqueda
 * - estado
 * - ruta
 *
 * El resultado se utiliza para calcular
 * la cantidad total de páginas.
 */
public function contar(
    string $busqueda = '',
    ?int $activo = null,
    ?int $idRuta = null
): int {

    /*
    |--------------------------------------------------------------------------
    | CONSULTA BASE
    |--------------------------------------------------------------------------
    */

    $sql = "
        SELECT
            COUNT(DISTINCT c.id_cliente)

        FROM clientes c
    ";


    /*
    |--------------------------------------------------------------------------
    | JOIN DE RUTA
    |--------------------------------------------------------------------------
    */

    if ($idRuta !== null) {

        $sql .= "
            INNER JOIN cliente_ruta cr
                ON cr.id_cliente = c.id_cliente
        ";
    }


    /*
    |--------------------------------------------------------------------------
    | CONDICIONES
    |--------------------------------------------------------------------------
    */

    $where = [];

    $params = [];


    /*
    |--------------------------------------------------------------------------
    | FILTRO POR RUTA
    |--------------------------------------------------------------------------
    */

    if ($idRuta !== null) {

        $where[] = "
            cr.id_ruta = ?
        ";

        $params[] = $idRuta;
    }


    /*
    |--------------------------------------------------------------------------
    | BÚSQUEDA
    |--------------------------------------------------------------------------
    */

    if ($busqueda !== '') {

        $where[] = "
            (
                c.nombres LIKE ?
                OR c.apellidos LIKE ?
                OR c.alias LIKE ?
                OR c.documento LIKE ?
                OR c.direccion LIKE ?
                OR c.telefono LIKE ?
                OR c.telefono2 LIKE ?
            )
        ";

        $valorBusqueda =
            '%' . $busqueda . '%';


        /*
        |--------------------------------------------------------------------------
        | IMPORTANTE
        |--------------------------------------------------------------------------
        |
        | Cada ? recibe su propio valor.
        |
        */

        $params[] = $valorBusqueda;
        $params[] = $valorBusqueda;
        $params[] = $valorBusqueda;
        $params[] = $valorBusqueda;
        $params[] = $valorBusqueda;
        $params[] = $valorBusqueda;
        $params[] = $valorBusqueda;
    }


    /*
    |--------------------------------------------------------------------------
    | FILTRO POR ESTADO
    |--------------------------------------------------------------------------
    */

    if ($activo !== null) {

        $where[] = "
            c.activo = ?
        ";

        $params[] = $activo;
    }


    /*
    |--------------------------------------------------------------------------
    | AGREGAR WHERE
    |--------------------------------------------------------------------------
    */

    if (!empty($where)) {

        $sql .= "
            WHERE
                " .
            implode(
                ' AND ',
                $where
            );
    }


    /*
    |--------------------------------------------------------------------------
    | PREPARAR
    |--------------------------------------------------------------------------
    */

    $stmt =
        $this->db->prepare($sql);


    /*
    |--------------------------------------------------------------------------
    | EJECUTAR
    |--------------------------------------------------------------------------
    */

    $stmt->execute($params);


    /*
    |--------------------------------------------------------------------------
    | RESULTADO
    |--------------------------------------------------------------------------
    */

    return (int) $stmt->fetchColumn();
}

    /*
    |--------------------------------------------------------------------------
    | OBTENER CLIENTES PAGINADOS
    |--------------------------------------------------------------------------
    */

    /**
 * =========================================================================
 * OBTENER CLIENTES PAGINADOS
 * =========================================================================
 *
 * Devuelve únicamente los clientes correspondientes
 * a la página solicitada.
 */
public function obtenerPaginados(
    int $limite,
    int $offset,
    string $busqueda = '',
    ?int $activo = null,
    ?int $idRuta = null
): array {

    /*
    |--------------------------------------------------------------------------
    | SEGURIDAD
    |--------------------------------------------------------------------------
    */

    $limite =
        max(1, $limite);

    $offset =
        max(0, $offset);


    /*
    |--------------------------------------------------------------------------
    | CONSULTA BASE
    |--------------------------------------------------------------------------
    */

    $sql = "
        SELECT DISTINCT

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
    ";


    /*
    |--------------------------------------------------------------------------
    | JOIN RUTA
    |--------------------------------------------------------------------------
    */

    if ($idRuta !== null) {

        $sql .= "
            INNER JOIN cliente_ruta cr
                ON cr.id_cliente = c.id_cliente
        ";
    }


    /*
    |--------------------------------------------------------------------------
    | CONDICIONES
    |--------------------------------------------------------------------------
    */

    $where = [];

    $params = [];


    /*
    |--------------------------------------------------------------------------
    | FILTRO RUTA
    |--------------------------------------------------------------------------
    */

    if ($idRuta !== null) {

        $where[] = "
            cr.id_ruta = ?
        ";

        $params[] = $idRuta;
    }


    /*
    |--------------------------------------------------------------------------
    | BÚSQUEDA
    |--------------------------------------------------------------------------
    */

    if ($busqueda !== '') {

        $where[] = "
            (
                c.nombres LIKE ?
                OR c.apellidos LIKE ?
                OR c.alias LIKE ?
                OR c.documento LIKE ?
                OR c.direccion LIKE ?
                OR c.telefono LIKE ?
                OR c.telefono2 LIKE ?
            )
        ";

        $valorBusqueda =
            '%' . $busqueda . '%';


        /*
        |--------------------------------------------------------------------------
        | UN VALOR POR CADA ?
        |--------------------------------------------------------------------------
        */

        $params[] = $valorBusqueda;
        $params[] = $valorBusqueda;
        $params[] = $valorBusqueda;
        $params[] = $valorBusqueda;
        $params[] = $valorBusqueda;
        $params[] = $valorBusqueda;
        $params[] = $valorBusqueda;
    }


    /*
    |--------------------------------------------------------------------------
    | FILTRO ESTADO
    |--------------------------------------------------------------------------
    */

    if ($activo !== null) {

        $where[] = "
            c.activo = ?
        ";

        $params[] = $activo;
    }


    /*
    |--------------------------------------------------------------------------
    | WHERE
    |--------------------------------------------------------------------------
    */

    if (!empty($where)) {

        $sql .= "
            WHERE
                " .
            implode(
                ' AND ',
                $where
            );
    }


    /*
    |--------------------------------------------------------------------------
    | ORDEN
    |--------------------------------------------------------------------------
    */

    $sql .= "
        ORDER BY
            c.nombres ASC,
            c.apellidos ASC
    ";


    /*
    |--------------------------------------------------------------------------
    | PAGINACIÓN
    |--------------------------------------------------------------------------
    |
    | LIMIT y OFFSET también los manejamos como
    | parámetros posicionales.
    |
    */

    $sql .= "
        LIMIT ?
        OFFSET ?
    ";


    /*
    |--------------------------------------------------------------------------
    | AGREGAR LIMIT Y OFFSET
    |--------------------------------------------------------------------------
    */

    $params[] = $limite;
    $params[] = $offset;


    /*
    |--------------------------------------------------------------------------
    | PREPARAR
    |--------------------------------------------------------------------------
    */

    $stmt =
        $this->db->prepare($sql);


    /*
    |--------------------------------------------------------------------------
    | EJECUTAR
    |--------------------------------------------------------------------------
    */

    /*
     * Los parámetros LIMIT/OFFSET son enteros.
     * Para evitar problemas con MySQL/PDO los
     * enlazamos explícitamente.
     */

    foreach (
        $params
        as $indice => $valor
    ) {

        if (
            $indice ===
            count($params) - 1
        ) {

            $stmt->bindValue(
                $indice + 1,
                $valor,
                PDO::PARAM_INT
            );

            continue;
        }


        if (
            $indice ===
            count($params) - 2
            &&
            $idRuta === null
            &&
            $activo === null
            &&
            $busqueda === ''
        ) {

            $stmt->bindValue(
                $indice + 1,
                $valor,
                PDO::PARAM_INT
            );

            continue;
        }


        /*
        |--------------------------------------------------------------------------
        | PARÁMETROS NORMALES
        |--------------------------------------------------------------------------
        */

        if (
            is_int($valor)
        ) {

            $stmt->bindValue(
                $indice + 1,
                $valor,
                PDO::PARAM_INT
            );

        } else {

            $stmt->bindValue(
                $indice + 1,
                $valor,
                PDO::PARAM_STR
            );
        }
    }


    /*
    |--------------------------------------------------------------------------
    | EJECUTAR
    |--------------------------------------------------------------------------
    */

    $stmt->execute();


    /*
    |--------------------------------------------------------------------------
    | OBTENER CLIENTES
    |--------------------------------------------------------------------------
    */

    $clientes =
        $stmt->fetchAll(
            PDO::FETCH_ASSOC
        );


    /*
    |--------------------------------------------------------------------------
    | CARGAR RUTAS
    |--------------------------------------------------------------------------
    */

    foreach (
        $clientes
        as &$cliente
    ) {

        $cliente['rutas'] =
            $this->obtenerRutas(
                (int) $cliente['id_cliente']
            );
    }

    unset($cliente);


    /*
    |--------------------------------------------------------------------------
    | RETORNAR
    |--------------------------------------------------------------------------
    */

    return $clientes;
}
}