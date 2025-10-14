<?php
// src/Models/Livro.php

namespace App\Models;

use PDO;

class Livro {
    private $db;
    private $table = 'livros';

    public $id;
    public $titulo;
    public $autor;
    public $isbn;
    public $genero;
    public $editora;
    public $resumo;
    public $ano_publicacao;
    public $edicao;
    public $quantidade_paginas;
    public $quantidade_total;
    public $quantidade_disponivel;
    public $capa_url;
    public $ativo;

    public function __construct() {
        $this->db = Database::getInstance()->getConnection();
    }

    // Criar novo livro
    public function criar() {
        $query = "INSERT INTO " . $this->table . " 
                  (titulo, autor, isbn, genero, editora, resumo, ano_publicacao, 
                   edicao, quantidade_paginas, quantidade_total, quantidade_disponivel, 
                   capa_url, ativo) 
                  VALUES (:titulo, :autor, :isbn, :genero, :editora, :resumo, 
                          :ano_publicacao, :edicao, :quantidade_paginas, :quantidade_total, 
                          :quantidade_disponivel, :capa_url, :ativo)";
        
        $stmt = $this->db->prepare($query);

        // Sanitizar dados
        $this->titulo = htmlspecialchars(strip_tags($this->titulo));
        $this->autor = htmlspecialchars(strip_tags($this->autor));
        $this->isbn = htmlspecialchars(strip_tags($this->isbn));
        $this->genero = htmlspecialchars(strip_tags($this->genero));
        $this->editora = htmlspecialchars(strip_tags($this->editora));
        $this->resumo = htmlspecialchars(strip_tags($this->resumo));
        $this->edicao = htmlspecialchars(strip_tags($this->edicao));
        $this->quantidade_disponivel = $this->quantidade_disponivel ?? $this->quantidade_total;
        $this->ativo = $this->ativo ?? true;

        // Bind dos parâmetros
        $stmt->bindParam(':titulo', $this->titulo);
        $stmt->bindParam(':autor', $this->autor);
        $stmt->bindParam(':isbn', $this->isbn);
        $stmt->bindParam(':genero', $this->genero);
        $stmt->bindParam(':editora', $this->editora);
        $stmt->bindParam(':resumo', $this->resumo);
        $stmt->bindParam(':ano_publicacao', $this->ano_publicacao);
        $stmt->bindParam(':edicao', $this->edicao);
        $stmt->bindParam(':quantidade_paginas', $this->quantidade_paginas, PDO::PARAM_INT);
        $stmt->bindParam(':quantidade_total', $this->quantidade_total, PDO::PARAM_INT);
        $stmt->bindParam(':quantidade_disponivel', $this->quantidade_disponivel, PDO::PARAM_INT);
        $stmt->bindParam(':capa_url', $this->capa_url);
        $stmt->bindParam(':ativo', $this->ativo, PDO::PARAM_BOOL);

        if ($stmt->execute()) {
            return $this->db->lastInsertId();
        }

        return false;
    }

    // Buscar todos os livros
    public function buscarTodos($filtros = []) {
        $query = "SELECT * FROM " . $this->table . " WHERE 1=1";
        
        $params = [];

        if (!empty($filtros['titulo'])) {
            $query .= " AND titulo LIKE :titulo";
            $params[':titulo'] = '%' . $filtros['titulo'] . '%';
        }

        if (!empty($filtros['autor'])) {
            $query .= " AND autor LIKE :autor";
            $params[':autor'] = '%' . $filtros['autor'] . '%';
        }

        if (!empty($filtros['isbn'])) {
            $query .= " AND isbn = :isbn";
            $params[':isbn'] = $filtros['isbn'];
        }

        if (!empty($filtros['genero'])) {
            $query .= " AND genero = :genero";
            $params[':genero'] = $filtros['genero'];
        }

        if (!empty($filtros['editora'])) {
            $query .= " AND editora LIKE :editora";
            $params[':editora'] = '%' . $filtros['editora'] . '%';
        }

        if (isset($filtros['ativo'])) {
            $query .= " AND ativo = :ativo";
            $params[':ativo'] = $filtros['ativo'];
        }

        if (!empty($filtros['disponiveis'])) {
            $query .= " AND quantidade_disponivel > 0";
        }

        if (!empty($filtros['busca'])) {
            $query .= " AND (titulo LIKE :busca OR autor LIKE :busca OR isbn LIKE :busca)";
            $params[':busca'] = '%' . $filtros['busca'] . '%';
        }

        $query .= " ORDER BY titulo ASC";

        $stmt = $this->db->prepare($query);
        $stmt->execute($params);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Buscar por ID
    public function buscarPorId($id) {
        $query = "SELECT * FROM " . $this->table . " WHERE id = :id";
        
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Buscar por ISBN
    public function buscarPorIsbn($isbn) {
        $query = "SELECT * FROM " . $this->table . " WHERE isbn = :isbn";
        
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':isbn', $isbn);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Atualizar livro
    public function atualizar($id) {
        $query = "UPDATE " . $this->table . " 
                  SET titulo = :titulo, autor = :autor, isbn = :isbn, 
                      genero = :genero, editora = :editora, resumo = :resumo,
                      ano_publicacao = :ano_publicacao, edicao = :edicao,
                      quantidade_paginas = :quantidade_paginas, quantidade_total = :quantidade_total,
                      quantidade_disponivel = :quantidade_disponivel, capa_url = :capa_url,
                      ativo = :ativo
                  WHERE id = :id";
        
        $stmt = $this->db->prepare($query);

        // Sanitizar dados
        $this->titulo = htmlspecialchars(strip_tags($this->titulo));
        $this->autor = htmlspecialchars(strip_tags($this->autor));
        $this->isbn = htmlspecialchars(strip_tags($this->isbn));
        $this->genero = htmlspecialchars(strip_tags($this->genero));
        $this->editora = htmlspecialchars(strip_tags($this->editora));
        $this->resumo = htmlspecialchars(strip_tags($this->resumo));
        $this->edicao = htmlspecialchars(strip_tags($this->edicao));

        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->bindParam(':titulo', $this->titulo);
        $stmt->bindParam(':autor', $this->autor);
        $stmt->bindParam(':isbn', $this->isbn);
        $stmt->bindParam(':genero', $this->genero);
        $stmt->bindParam(':editora', $this->editora);
        $stmt->bindParam(':resumo', $this->resumo);
        $stmt->bindParam(':ano_publicacao', $this->ano_publicacao);
        $stmt->bindParam(':edicao', $this->edicao);
        $stmt->bindParam(':quantidade_paginas', $this->quantidade_paginas, PDO::PARAM_INT);
        $stmt->bindParam(':quantidade_total', $this->quantidade_total, PDO::PARAM_INT);
        $stmt->bindParam(':quantidade_disponivel', $this->quantidade_disponivel, PDO::PARAM_INT);
        $stmt->bindParam(':capa_url', $this->capa_url);
        $stmt->bindParam(':ativo', $this->ativo, PDO::PARAM_BOOL);

        return $stmt->execute();
    }

    // Atualizar disponibilidade
    public function atualizarDisponibilidade($id, $quantidade) {
        $query = "UPDATE " . $this->table . " 
                  SET quantidade_disponivel = :quantidade 
                  WHERE id = :id";
        
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->bindParam(':quantidade', $quantidade, PDO::PARAM_INT);

        return $stmt->execute();
    }

    // Deletar livro
    public function deletar($id) {
        $query = "DELETE FROM " . $this->table . " WHERE id = :id";
        
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);

        return $stmt->execute();
    }

    // Verificar disponibilidade
    public function verificarDisponibilidade($id) {
        $livro = $this->buscarPorId($id);
        return $livro && $livro['quantidade_disponivel'] > 0;
    }

    // Contar livros
    public function contar($filtros = []) {
        $query = "SELECT COUNT(*) as total FROM " . $this->table . " WHERE 1=1";
        
        $params = [];

        if (!empty($filtros['genero'])) {
            $query .= " AND genero = :genero";
            $params[':genero'] = $filtros['genero'];
        }

        if (isset($filtros['ativo'])) {
            $query .= " AND ativo = :ativo";
            $params[':ativo'] = $filtros['ativo'];
        }

        if (!empty($filtros['disponiveis'])) {
            $query .= " AND quantidade_disponivel > 0";
        }

        $stmt = $this->db->prepare($query);
        $stmt->execute($params);

        $resultado = $stmt->fetch(PDO::FETCH_ASSOC);
        return $resultado['total'];
    }

    // Buscar gêneros únicos
    public function buscarGeneros() {
        $query = "SELECT DISTINCT genero FROM " . $this->table . " 
                  WHERE genero IS NOT NULL AND genero != '' 
                  ORDER BY genero";
        
        $stmt = $this->db->prepare($query);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_COLUMN);
    }
}