# Aula 12

## Objetivos
- Finalizar processo CRUD para UsuarioModel
- Criar UsuarioController

---
## Estrutura do Projeto
<img width="197" height="244" alt="Estrutura do projeto" src="https://github.com/user-attachments/assets/472599b2-0d6f-4c54-9e72-e23b89c673ee" />

## Classe UsuarioModel
```php
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
```

---
## index.php
```php
<?php
// index.php
/*
 * Index criado para executarmos testes dos metodos
 *   Não deve falar diretamente com classes Model
 */
require_once __DIR__ . '/src/Models/UsuarioModel.php';

$usuario = new UsuarioModel();

// Listar usuários
$data = $usuario->read();
foreach ($data as $user) {
    echo "ID: " . $user['id'] . "\n";
    echo "Nome: " . $user['nome'] . "\n";
    echo "E-mail: " . $user['email'] . "\n\n";
}

// Criando um novo user
// Executa o metodo da classe Usuario para criar um novo user
/*
$ret = $usuario->create("Usuario de Teste 03","user03@biblioteca.com","P@ssw0rd","123.456.789-03","","usuario",1);
if ($ret) {
    echo "Usuario criado com sucesso!";
} else {
    echo "Erro ao criar usuario!";
}
*/

/*
$ret = $usuario->update(6,"Usuario de Teste 03","user03@biblioteca.com","123.456.789-03","+5551899999999","usuario",1);
if ($ret) {
    echo "Usuario atualizado com sucesso!";
} else {
    echo "Erro ao atualizar usuario!";
}
*/
/*
$ret = $usuario->delete(4);
if ($ret) {
    echo "Usuario removido com sucesso!";
} else {
    echo "Erro ao remover usuario!";
}
*/
?>
```
