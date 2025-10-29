<?php
// src/Models/UsuarioModel.php
require_once __DIR__ . '/Database.php';

// Classe que "fala" com a tabela usuarios
class UsuarioModel {
    private $db;
    private $table = 'usuarios';

    public function __construct() {
        $this->db = Database::getInstance()->getConnection();
    }

    public function create($nome, $email, $senha, $cpf, $telefone, $perfil, $ativo) {
        $query = "INSERT INTO $this->table (nome, email, senha, cpf, telefone, perfil, ativo) VALUES (?,?,?,?,?,?,?)";
        $stmt = $this->db->prepare($query);

        try{
            return $stmt->execute([$nome,$email,$senha,$cpf,$telefone,$perfil,$ativo]);
        } catch (Exception $e) {
            throw new Exception("Error Processing Request", 1);
        }
    }

    public function read() {
        // Buscar todos os usuários
        $query = "SELECT id, nome, email, cpf, telefone, perfil, ativo 
                  FROM " . $this->table . " WHERE 1=1";

        $query .= " ORDER BY nome ASC";

        $stmt = $this->db->prepare($query);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function update($id, $nome, $email, $cpf, $telefone, $perfil, $ativo) {
        // Implementar atualização de usuário
        $query = "UPDATE $this->table SET nome=?, email=?, cpf=?, telefone=?, perfil=?, ativo=? WHERE id=?";
        $stmt = $this->db->prepare($query);

        try {
            return $stmt->execute([$nome, $email, $cpf, $telefone, $perfil, $ativo, $id]);
        } catch (Exception $e) {
            throw new Exception("Error Processing Request", 1);
            
        }
    }

    public function updateSenha($id, $senha){
        // Montar processo para update da senha do usuario
    }

    public function delete($id) {
        // Implementar exclusão de usuário
        $query = "DELETE FROM $this->table WHERE id = ?";
        $stmt = $this->db->prepare($query);

        try {
            return $stmt->execute([$id]);
        } catch(Exception $e) {
            throw new Exception("Error Processing Request", 1);
        }
    }
}