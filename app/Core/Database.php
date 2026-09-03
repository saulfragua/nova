<?php

namespace App\Core;

use PDO;
use PDOException;

class Database
{
    /**
     * Instancia única de PDO.
     */
    private static ?PDO $instance = null;

    /**
     * Constructor privado.
     */
    private function __construct()
    {
    }

    /**
     * Evita clonar la conexión.
     */
    private function __clone()
    {
    }

    /**
     * Obtiene la conexión PDO.
     */
    public static function getInstance(): PDO
    {
        if (self::$instance === null) {
            self::connect();
        }

        return self::$instance;
    }

    /**
     * Crea la conexión con MySQL.
     */
    private static function connect(): void
    {
        $host = $_ENV['DB_HOST'] ?? '127.0.0.1';
        $port = $_ENV['DB_PORT'] ?? '3306';
        $database = $_ENV['DB_DATABASE'] ?? '';
        $username = $_ENV['DB_USERNAME'] ?? '';
        $password = $_ENV['DB_PASSWORD'] ?? '';
        $charset = $_ENV['DB_CHARSET'] ?? 'utf8mb4';

        /*
         * Verificar que exista el nombre
         * de la base de datos.
         */
        if (empty($database)) {
            throw new \RuntimeException(
                'La variable DB_DATABASE no está configurada.'
            );
        }

        /*
         * DSN de conexión.
         */
        $dsn = sprintf(
            'mysql:host=%s;port=%s;dbname=%s;charset=%s',
            $host,
            $port,
            $database,
            $charset
        );

        /*
         * Configuración PDO.
         */
        $options = [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES   => false,
        ];

        try {

            self::$instance = new PDO(
                $dsn,
                $username,
                $password,
                $options
            );

        } catch (PDOException $e) {

            /*
             * APP_DEBUG viene del archivo .env.
             *
             * Ejemplo:
             *
             * APP_DEBUG=true
             */
            $debug = filter_var(
                $_ENV['APP_DEBUG'] ?? false,
                FILTER_VALIDATE_BOOLEAN
            );

            /*
             * Si estamos en desarrollo,
             * mostramos el error detallado.
             */
            if ($debug) {

                throw new PDOException(
                    'Error de conexión a la base de datos: '
                    . $e->getMessage(),
                    (int) $e->getCode()
                );
            }

            /*
             * En producción ocultamos
             * información sensible.
             */
            throw new PDOException(
                'No fue posible conectar con la base de datos.'
            );
        }
    }

    /**
     * Permite cerrar la conexión.
     */
    public static function disconnect(): void
    {
        self::$instance = null;
    }
}