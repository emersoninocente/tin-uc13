<?php
// src/Models/Database.php

// Carregar configurações
require_once __DIR__ . '/../../config/database.php';

/*
 * Classe Database para gerenciar a conexão com o banco de dados usando PDO.
 * Implementa o padrão Singleton para garantir uma única instância de conexão.
 */
class Database {
    private static $instance = null;
    private $connection;

    private function __construct() {
        try {
            $dsn = "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";port=" . DB_PORT . ";charset=" . DB_CHARSET;
            
            $options = [
                PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES   => false,
                PDO::ATTR_PERSISTENT         => false
            ];

            $this->connection = new PDO($dsn, DB_USER, DB_PASS, $options);
        } catch (PDOException $e) {
            throw new PDOException("Erro na conexão: " . $e->getMessage());
        }
    }

    // Singleton pattern para garantir uma única instância
    public static function getInstance() {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    // Retorna a conexão PDO
    public function getConnection() {
        return $this->connection;
    }

    // Prevenir clonagem do objeto
    private function __clone() {}

    // Prevenir deserialização
    public function __wakeup() {
        throw new \Exception("Cannot unserialize singleton");
    }
}
?>