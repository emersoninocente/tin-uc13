<?php
// src/Models/Usuario.php

namespace App\Models;

use PDO;

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

    // Criar novo usuário
    public function criar() {
        $query = "INSERT INTO " . $this->table . " 
                  (nome, email, senha, cpf, telefone, perfil, ativo) 
                  VALUES (:nome, :email, :senha, :cpf, :telefone, :perfil, :ativo)";
        
        $stmt = $this->db->prepare($query);

        // Sanitizar dados
        $this->nome = htmlspecialchars(strip_tags($this->nome));
        $this->email = htmlspecialchars(strip_tags($this->email));
        $this->senha = password_hash($this->senha, PASSWORD_DEFAULT);
        $this->cpf = htmlspecialchars(strip_tags($this->cpf));
        $this->telefone = htmlspecialchars(strip_tags($this->telefone));
        $this->perfil = htmlspecialchars(strip_tags($this->perfil ?? 'usuario'));
        $this->ativo = $this->ativo ?? true;

        // Bind dos parâmetros
        $stmt->bindParam(':nome', $this->nome);
        $stmt->bindParam(':email', $this->email);
        $stmt->bindParam(':senha', $this->senha);
        $stmt->bindParam(':cpf', $this->cpf);
        $stmt->bindParam(':telefone', $this->telefone);
        $stmt->bindParam(':perfil', $this->perfil);
        $stmt->bindParam(':ativo', $this->ativo, PDO::PARAM_BOOL);

        if ($stmt->execute()) {
            return $this->db->lastInsertId();
        }

        return false;
    }

    // Buscar todos os usuários
    public function buscarTodos($filtros = []) {
        $query = "SELECT id, nome, email, cpf, telefone, perfil, ativo, 
                  data_cadastro, data_atualizacao 
                  FROM " . $this->table . " WHERE 1=1";
        
        $params = [];

        if (!empty($filtros['perfil'])) {
            $query .= " AND perfil = :perfil";
            $params[':perfil'] = $filtros['perfil'];
        }

        if (isset($filtros['ativo'])) {
            $query .= " AND ativo = :ativo";
            $params[':ativo'] = $filtros['ativo'];
        }

        if (!empty($filtros['busca'])) {
            $query .= " AND (nome LIKE :busca OR email LIKE :busca OR cpf LIKE :busca)";
            $params[':busca'] = '%' . $filtros['busca'] . '%';
        }

        $query .= " ORDER BY nome ASC";

        $stmt = $this->db->prepare($query);
        $stmt->execute($params);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Buscar por ID
    public function buscarPorId($id) {
        $query = "SELECT id, nome, email, cpf, telefone, perfil, ativo, 
                  data_cadastro, data_atualizacao 
                  FROM " . $this->table . " WHERE id = :id";
        
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Buscar por email
    public function buscarPorEmail($email) {
        $query = "SELECT * FROM " . $this->table . " WHERE email = :email";
        
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':email', $email);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Atualizar usuário
    public function atualizar($id) {
        $query = "UPDATE " . $this->table . " 
                  SET nome = :nome, email = :email, cpf = :cpf, 
                      telefone = :telefone, perfil = :perfil, ativo = :ativo
                  WHERE id = :id";
        
        $stmt = $this->db->prepare($query);

        // Sanitizar dados
        $this->nome = htmlspecialchars(strip_tags($this->nome));
        $this->email = htmlspecialchars(strip_tags($this->email));
        $this->cpf = htmlspecialchars(strip_tags($this->cpf));
        $this->telefone = htmlspecialchars(strip_tags($this->telefone));
        $this->perfil = htmlspecialchars(strip_tags($this->perfil));

        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->bindParam(':nome', $this->nome);
        $stmt->bindParam(':email', $this->email);
        $stmt->bindParam(':cpf', $this->cpf);
        $stmt->bindParam(':telefone', $this->telefone);
        $stmt->bindParam(':perfil', $this->perfil);
        $stmt->bindParam(':ativo', $this->ativo, PDO::PARAM_BOOL);

        return $stmt->execute();
    }

    // Atualizar senha
    public function atualizarSenha($id, $novaSenha) {
        $query = "UPDATE " . $this->table . " SET senha = :senha WHERE id = :id";
        
        $stmt = $this->db->prepare($query);
        $senhaHash = password_hash($novaSenha, PASSWORD_DEFAULT);
        
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->bindParam(':senha', $senhaHash);

        return $stmt->execute();
    }

    // Deletar usuário
    public function deletar($id) {
        $query = "DELETE FROM " . $this->table . " WHERE id = :id";
        
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);

        return $stmt->execute();
    }

    // Verificar login
    public function verificarLogin($email, $senha) {
        $usuario = $this->buscarPorEmail($email);

        if ($usuario && password_verify($senha, $usuario['senha'])) {
            if ($usuario['ativo']) {
                return $usuario;
            }
            return ['erro' => 'Usuário inativo'];
        }

        return false;
    }

    // Contar usuários
    public function contar($filtros = []) {
        $query = "SELECT COUNT(*) as total FROM " . $this->table . " WHERE 1=1";
        
        $params = [];

        if (!empty($filtros['perfil'])) {
            $query .= " AND perfil = :perfil";
            $params[':perfil'] = $filtros['perfil'];
        }

        if (isset($filtros['ativo'])) {
            $query .= " AND ativo = :ativo";
            $params[':ativo'] = $filtros['ativo'];
        }

        $stmt = $this->db->prepare($query);
        $stmt->execute($params);

        $resultado = $stmt->fetch(PDO::FETCH_ASSOC);
        return $resultado['total'];
    }
}