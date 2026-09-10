<?php

namespace App\Models;

use App\Core\Database;
use PDO;
use PDOException;

class Usuario
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
    | CREAR USUARIO
    |--------------------------------------------------------------------------
    */

    public function crearUsuario(array $datos): bool
    {
        $sql = "
            INSERT INTO usuarios (
                nombre_completo,
                nombre_usuario,
                rol,
                clave,
                estado,
                email
            )
            VALUES (
                :nombre_completo,
                :nombre_usuario,
                :rol,
                :clave,
                :estado,
                :email
            )
        ";

        $consulta = $this->db->prepare($sql);

        return $consulta->execute([
            ':nombre_completo' =>
                $datos['nombre_completo'],

            ':nombre_usuario' =>
                $datos['nombre_usuario'],

            ':rol' =>
                $datos['rol'],

            ':clave' =>
                $datos['clave'],

            ':estado' =>
                (int) $datos['estado'],

            ':email' =>
                $datos['email'] ?? null
        ]);
    }


    /*
    |--------------------------------------------------------------------------
    | VERIFICAR NOMBRE DE USUARIO
    |--------------------------------------------------------------------------
    */

    public function existeNombreUsuario(
        string $nombreUsuario
    ): bool {

        $sql = "
            SELECT 1
            FROM usuarios
            WHERE nombre_usuario = :nombre_usuario
            LIMIT 1
        ";

        $consulta = $this->db->prepare($sql);

        $consulta->execute([
            ':nombre_usuario' => $nombreUsuario
        ]);

        return (bool) $consulta->fetchColumn();
    }


    /*
    |--------------------------------------------------------------------------
    | VERIFICAR CORREO
    |--------------------------------------------------------------------------
    */

    public function existeCorreo(
        string $email
    ): bool {

        $sql = "
            SELECT 1
            FROM usuarios
            WHERE email = :email
            LIMIT 1
        ";

        $consulta = $this->db->prepare($sql);

        $consulta->execute([
            ':email' => $email
        ]);

        return (bool) $consulta->fetchColumn();
    }


    /*
    |--------------------------------------------------------------------------
    | OBTENER TODOS CON RUTAS
    |--------------------------------------------------------------------------
    */

    public function obtenerTodosConRutas(): array
    {
        $sql = "
            SELECT
                u.id_usuario,
                u.nombre_completo,
                u.nombre_usuario,
                u.rol,
                u.estado,
                u.email,
                COUNT(DISTINCT ur.id_ruta) AS cantidad_rutas

            FROM usuarios u

            LEFT JOIN usuario_ruta ur
                ON ur.id_usuario = u.id_usuario

            GROUP BY
                u.id_usuario,
                u.nombre_completo,
                u.nombre_usuario,
                u.rol,
                u.estado,
                u.email

            ORDER BY
                u.nombre_completo ASC
        ";

        $consulta = $this->db->prepare($sql);

        $consulta->execute();

        return $consulta->fetchAll(
            PDO::FETCH_ASSOC
        );
    }


    /*
    |--------------------------------------------------------------------------
    | CONTAR TODOS
    |--------------------------------------------------------------------------
    */

    public function contarTodos(): int
    {
        $sql = "
            SELECT COUNT(*)
            FROM usuarios
        ";

        $consulta = $this->db->prepare($sql);

        $consulta->execute();

        return (int) $consulta->fetchColumn();
    }


    /*
    |--------------------------------------------------------------------------
    | CONTAR POR ROL
    |--------------------------------------------------------------------------
    */

    public function contarPorRol(
        string $rol
    ): int {

        $sql = "
            SELECT COUNT(*)
            FROM usuarios
            WHERE rol = :rol
        ";

        $consulta = $this->db->prepare($sql);

        $consulta->execute([
            ':rol' => $rol
        ]);

        return (int) $consulta->fetchColumn();
    }


    /*
    |--------------------------------------------------------------------------
    | CONTAR USUARIOS CON RUTAS
    |--------------------------------------------------------------------------
    */

    public function contarUsuariosConRutas(): int
    {
        $sql = "
            SELECT COUNT(DISTINCT id_usuario)
            FROM usuario_ruta
        ";

        $consulta = $this->db->prepare($sql);

        $consulta->execute();

        return (int) $consulta->fetchColumn();
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

        $consulta = $this->db->prepare($sql);

        $consulta->execute();

        return $consulta->fetchAll(
            PDO::FETCH_ASSOC
        );
    }


    /*
    |--------------------------------------------------------------------------
    | OBTENER RUTAS POR USUARIO
    |--------------------------------------------------------------------------
    */

    public function obtenerRutasPorUsuario(
        int $idUsuario
    ): array {

        $sql = "
            SELECT
                r.id_ruta,
                r.nombre_ruta,
                r.activo,
                ur.fecha_asignacion

            FROM usuario_ruta ur

            INNER JOIN rutas r
                ON r.id_ruta = ur.id_ruta

            WHERE ur.id_usuario = :id_usuario

            ORDER BY
                r.nombre_ruta ASC
        ";

        $consulta = $this->db->prepare($sql);

        $consulta->execute([
            ':id_usuario' => $idUsuario
        ]);

        return $consulta->fetchAll(
            PDO::FETCH_ASSOC
        );
    }


    /*
    |--------------------------------------------------------------------------
    | VERIFICAR ASIGNACIÓN DE RUTA
    |--------------------------------------------------------------------------
    */

    public function existeAsignacionRuta(
        int $idUsuario,
        int $idRuta
    ): bool {

        $sql = "
            SELECT 1
            FROM usuario_ruta
            WHERE
                id_usuario = :id_usuario
                AND id_ruta = :id_ruta
            LIMIT 1
        ";

        $consulta = $this->db->prepare($sql);

        $consulta->execute([
            ':id_usuario' => $idUsuario,
            ':id_ruta' => $idRuta
        ]);

        return (bool) $consulta->fetchColumn();
    }


    /*
    |--------------------------------------------------------------------------
    | ASIGNAR RUTA
    |--------------------------------------------------------------------------
    */

    public function asignarRuta(
        int $idUsuario,
        int $idRuta
    ): bool {

        if (
            $idUsuario <= 0 ||
            $idRuta <= 0
        ) {
            return false;
        }

        if (
            $this->existeAsignacionRuta(
                $idUsuario,
                $idRuta
            )
        ) {
            return false;
        }

        $sql = "
            INSERT INTO usuario_ruta (
                id_usuario,
                id_ruta
            )
            VALUES (
                :id_usuario,
                :id_ruta
            )
        ";

        $consulta = $this->db->prepare($sql);

        return $consulta->execute([
            ':id_usuario' => $idUsuario,
            ':id_ruta' => $idRuta
        ]);
    }


    /*
    |--------------------------------------------------------------------------
    | QUITAR RUTA
    |--------------------------------------------------------------------------
    */

    public function quitarRuta(
        int $idUsuario,
        int $idRuta
    ): bool {

        if (
            $idUsuario <= 0 ||
            $idRuta <= 0
        ) {
            return false;
        }

        $sql = "
            DELETE FROM usuario_ruta

            WHERE
                id_usuario = :id_usuario
                AND id_ruta = :id_ruta
        ";

        $consulta = $this->db->prepare($sql);

        $consulta->execute([
            ':id_usuario' => $idUsuario,
            ':id_ruta' => $idRuta
        ]);

        return $consulta->rowCount() > 0;
    }


    /*
    |--------------------------------------------------------------------------
    | OBTENER USUARIO POR ID
    |--------------------------------------------------------------------------
    */

    public function obtenerPorId(
        int $idUsuario
    ): ?array {

        if ($idUsuario <= 0) {
            return null;
        }

        $sql = "
            SELECT
                id_usuario,
                nombre_completo,
                nombre_usuario,
                rol,
                estado,
                email

            FROM usuarios

            WHERE id_usuario = :id_usuario

            LIMIT 1
        ";

        $consulta = $this->db->prepare($sql);

        $consulta->execute([
            ':id_usuario' => $idUsuario
        ]);

        $usuario =
            $consulta->fetch(
                PDO::FETCH_ASSOC
            );

        return $usuario ?: null;
    }


    /*
    |--------------------------------------------------------------------------
    | VERIFICAR NOMBRE DE USUARIO EXCEPTO
    |--------------------------------------------------------------------------
    */

    public function existeNombreUsuarioExcepto(
        string $nombreUsuario,
        int $idUsuario
    ): bool {

        $sql = "
            SELECT 1
            FROM usuarios

            WHERE
                nombre_usuario = :nombre_usuario
                AND id_usuario <> :id_usuario

            LIMIT 1
        ";

        $consulta = $this->db->prepare($sql);

        $consulta->execute([
            ':nombre_usuario' => $nombreUsuario,
            ':id_usuario' => $idUsuario
        ]);

        return (bool) $consulta->fetchColumn();
    }


    /*
    |--------------------------------------------------------------------------
    | VERIFICAR CORREO EXCEPTO
    |--------------------------------------------------------------------------
    */

    public function existeCorreoExcepto(
        string $email,
        int $idUsuario
    ): bool {

        $sql = "
            SELECT 1
            FROM usuarios

            WHERE
                email = :email
                AND id_usuario <> :id_usuario

            LIMIT 1
        ";

        $consulta = $this->db->prepare($sql);

        $consulta->execute([
            ':email' => $email,
            ':id_usuario' => $idUsuario
        ]);

        return (bool) $consulta->fetchColumn();
    }


    /*
    |--------------------------------------------------------------------------
    | ACTUALIZAR USUARIO
    |--------------------------------------------------------------------------
    */

    public function actualizarUsuario(
        array $datos
    ): bool {

        $idUsuario =
            (int) ($datos['id_usuario'] ?? 0);

        if ($idUsuario <= 0) {
            return false;
        }


        /*
         * ------------------------------------------------------
         * ACTUALIZAR SIN CONTRASEÑA
         * ------------------------------------------------------
         */

        if (
            empty($datos['clave'])
        ) {

            $sql = "
                UPDATE usuarios

                SET
                    nombre_completo = :nombre_completo,
                    nombre_usuario = :nombre_usuario,
                    email = :email,
                    rol = :rol,
                    estado = :estado

                WHERE id_usuario = :id_usuario
            ";

            $consulta =
                $this->db->prepare($sql);

            return $consulta->execute([
                ':nombre_completo' =>
                    $datos['nombre_completo'],

                ':nombre_usuario' =>
                    $datos['nombre_usuario'],

                ':email' =>
                    $datos['email'] ?? null,

                ':rol' =>
                    $datos['rol'],

                ':estado' =>
                    (int) $datos['estado'],

                ':id_usuario' =>
                    $idUsuario
            ]);
        }


        /*
         * ------------------------------------------------------
         * ACTUALIZAR CON CONTRASEÑA
         * ------------------------------------------------------
         */

        $sql = "
            UPDATE usuarios

            SET
                nombre_completo = :nombre_completo,
                nombre_usuario = :nombre_usuario,
                email = :email,
                rol = :rol,
                estado = :estado,
                clave = :clave

            WHERE id_usuario = :id_usuario
        ";

        $consulta =
            $this->db->prepare($sql);

        return $consulta->execute([
            ':nombre_completo' =>
                $datos['nombre_completo'],

            ':nombre_usuario' =>
                $datos['nombre_usuario'],

            ':email' =>
                $datos['email'] ?? null,

            ':rol' =>
                $datos['rol'],

            ':estado' =>
                (int) $datos['estado'],

            ':clave' =>
                $datos['clave'],

            ':id_usuario' =>
                $idUsuario
        ]);
    }


    /*
    |--------------------------------------------------------------------------
    | CAMBIAR ESTADO
    |--------------------------------------------------------------------------
    */

    public function cambiarEstado(
        int $idUsuario,
        int $estado
    ): bool {

        if (
            $idUsuario <= 0 ||
            !in_array(
                $estado,
                [0, 1],
                true
            )
        ) {
            return false;
        }

        $sql = "
            UPDATE usuarios

            SET estado = :estado

            WHERE id_usuario = :id_usuario
        ";

        $consulta =
            $this->db->prepare($sql);

        return $consulta->execute([
            ':estado' => $estado,
            ':id_usuario' => $idUsuario
        ]);
    }


    /*
    |--------------------------------------------------------------------------
    | VERIFICAR SI EL USUARIO TIENE REGISTROS
    |--------------------------------------------------------------------------
    |
    | Esta es la protección principal para eliminar usuarios.
    |
    | Busca cualquier FK de cualquier tabla que apunte a:
    |
    | usuarios.id_usuario
    |
    | Si encuentra un registro, devuelve TRUE.
    |
    */

    public function tieneRegistros(
        int $idUsuario
    ): bool {

        if ($idUsuario <= 0) {
            return false;
        }


        /*
         * ------------------------------------------------------
         * OBTENER RELACIONES
         * ------------------------------------------------------
         */

        $sql = "
            SELECT DISTINCT
                TABLE_NAME,
                COLUMN_NAME

            FROM
                INFORMATION_SCHEMA.KEY_COLUMN_USAGE

            WHERE
                REFERENCED_TABLE_SCHEMA = DATABASE()
                AND REFERENCED_TABLE_NAME = 'usuarios'
                AND REFERENCED_COLUMN_NAME = 'id_usuario'
        ";

        $consulta =
            $this->db->prepare($sql);

        $consulta->execute();

        $relaciones =
            $consulta->fetchAll(
                PDO::FETCH_ASSOC
            );


        /*
         * ------------------------------------------------------
         * REVISAR CADA TABLA
         * ------------------------------------------------------
         */

        foreach (
            $relaciones as $relacion
        ) {

            $tabla =
                $relacion['TABLE_NAME'];

            $columna =
                $relacion['COLUMN_NAME'];


            /*
             * Los nombres vienen de INFORMATION_SCHEMA.
             *
             * Aun así validamos antes de incorporarlos
             * a la consulta.
             */

            if (
                !preg_match(
                    '/^[a-zA-Z0-9_]+$/',
                    $tabla
                )
            ) {
                continue;
            }


            if (
                !preg_match(
                    '/^[a-zA-Z0-9_]+$/',
                    $columna
                )
            ) {
                continue;
            }


            /*
             * --------------------------------------------------
             * BUSCAR UN SOLO REGISTRO
             * --------------------------------------------------
             */

            $sqlRegistro = "
                SELECT 1

                FROM `{$tabla}`

                WHERE `{$columna}` = :id_usuario

                LIMIT 1
            ";

            $consultaRegistro =
                $this->db->prepare(
                    $sqlRegistro
                );

            $consultaRegistro->execute([
                ':id_usuario' => $idUsuario
            ]);


            if (
                $consultaRegistro->fetchColumn()
            ) {

                return true;
            }
        }


        return false;
    }


    /*
    |--------------------------------------------------------------------------
    | CONTAR CLIENTES ASIGNADOS
    |--------------------------------------------------------------------------
    |
    | Se conserva este método porque puede ser utilizado
    | por otras partes del sistema.
    |
    */

    public function contarClientesAsignados(
        int $idUsuario
    ): int {

        if ($idUsuario <= 0) {
            return 0;
        }

        $sql = "
            SELECT COUNT(*)

            FROM clientes

            WHERE id_usuario = :id_usuario
        ";

        $consulta =
            $this->db->prepare($sql);

        $consulta->execute([
            ':id_usuario' => $idUsuario
        ]);

        return (int) $consulta->fetchColumn();
    }


    /*
    |--------------------------------------------------------------------------
    | ELIMINAR USUARIO
    |--------------------------------------------------------------------------
    |
    | IMPORTANTE:
    |
    | Este método solamente elimina usuarios que no tengan
    | ningún registro relacionado.
    |
    */

    public function eliminarUsuario(
        int $idUsuario
    ): bool {

        if ($idUsuario <= 0) {
            return false;
        }


        /*
         * ------------------------------------------------------
         * SEGUNDA PROTECCIÓN
         * ------------------------------------------------------
         *
         * Aunque el controlador ya realiza esta comprobación,
         * el modelo también debe protegerse.
         */

        if (
            $this->tieneRegistros(
                $idUsuario
            )
        ) {

            return false;
        }


        try {

            $sql = "
                DELETE FROM usuarios

                WHERE id_usuario = :id_usuario

                LIMIT 1
            ";

            $consulta =
                $this->db->prepare($sql);

            $consulta->execute([
                ':id_usuario' => $idUsuario
            ]);


            return
                $consulta->rowCount() > 0;

        } catch (PDOException $e) {

            /*
             * Nunca permitimos que un intento de eliminación
             * provoque un error 500.
             */

            return false;
        }
    }
}