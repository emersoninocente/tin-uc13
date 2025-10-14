<?php
// src/Models/Usuario.php
require_once __DIR__ . '/Database.php';

class Usuario {
    private $db;
    private $table = 'usuarios';

    public $id;
    public $nome;
    public $email;
    public $senha;
    public $cpf;
    public $telefone;
    public $perfil;
    public $ativo;

    public function __construct() {
        $this->db = Database::getInstance()->getConnection();
    }

    public function create() {
        // Implementar criação de usuário
    }

    public function read() {
        // Buscar todos os usuários
        $query = "SELECT id, nome, email, cpf, telefone, perfil, ativo, 
                  data_cadastro, data_atualizacao 
                  FROM " . $this->table . " WHERE 1=1";

        $query .= " ORDER BY nome ASC";

        $stmt = $this->db->prepare($query);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function update() {
        // Implementar atualização de usuário
    }

    public function delete() {
        // Implementar exclusão de usuário
    }
}