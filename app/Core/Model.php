<?php

namespace App\Core;

use PDO;
use PDOStatement;
use App\Core\Database;

/**
 * Clase base de todos los Models de NOVA.
 */
abstract class Model
{
    /**
     * Conexión PDO.
     */
    protected PDO $db;

    /**
     * Constructor.
     */
    public function __construct()
    {
        $this->db = Database::getInstance();
    }

    /**
     * Ejecuta una consulta preparada.
     */
    protected function query(
        string $sql,
        array $params = []
    ): PDOStatement {

        $stmt = $this->db->prepare($sql);

        $stmt->execute($params);

        return $stmt;
    }

    /**
     * Devuelve un solo registro.
     */
    protected function first(
        string $sql,
        array $params = []
    ): ?array {

        $stmt = $this->query($sql, $params);

        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        return $result !== false
            ? $result
            : null;
    }

    /**
     * Devuelve múltiples registros.
     */
    protected function all(
        string $sql,
        array $params = []
    ): array {

        $stmt = $this->query($sql, $params);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Inserta un registro.
     *
     * Devuelve el ID generado.
     */
    protected function insert(
        string $sql,
        array $params = []
    ): int {

        $this->query($sql, $params);

        return (int) $this->db->lastInsertId();
    }

    /**
     * Ejecuta INSERT, UPDATE o DELETE.
     *
     * Devuelve la cantidad de filas afectadas.
     */
    protected function execute(
        string $sql,
        array $params = []
    ): int {

        $stmt = $this->query($sql, $params);

        return $stmt->rowCount();
    }

    /**
     * Inicia una transacción.
     */
    protected function beginTransaction(): void
    {
        $this->db->beginTransaction();
    }

    /**
     * Confirma una transacción.
     */
    protected function commit(): void
    {
        $this->db->commit();
    }

    /**
     * Revierte una transacción.
     */
    protected function rollback(): void
    {
        $this->db->rollBack();
    }

    /**
     * Obtiene la conexión PDO.
     */
    protected function getConnection(): PDO
    {
        return $this->db;
    }
}