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

---
## Criando classe UsuarioController
```php
<?php
// src/Controllers/UsuarioController.php
require_once __DIR__ . "/../Models/UsuarioModel.php";

class UsuarioController {
    private $usuarioModel;

    public function __construct(){
        $this->UsuarioModel = new UsuarioModel();
    }

    public function criarUsuario($nome, $email, $senha, $cpf, $telefone, $perfil, $ativo){
        // Processo de validação dos dados recebidos
        $nomeTratado = trim($nome);
        if(empty($nomeTratado)){
            throw new InvalidArgumentException("Nome inválido (não pode ser vazio)!");
        }

        $emailTratado = filter_var($email, FILTER_VALIDATE_EMAIL);
        if($emailTratado === false){
            throw new InvalidArgumentException("Email inválido!");
        }

        if(strlen($senha) < 6){
            throw new InvalidArgumentException("Senha Inválida (deve ter mais de 6 caracteres)!");
        }
        // Devemos escrever as validações para todos os parâmetros informados no método
        $cpfTratado = $cpf;
        $telefoneTratado = $telefone;
        // Estes dois campos não precisariam ser validados pois perfil pode ser informado diretamente no código conforme o perfil do usuário que acessa o sistema. Quanto ao ATIVO, na criação é sempre SIM.
        $perfilTratado = $perfil;
        $ativoTratado = $ativo;

        return $this->UsuarioModel->create($nomeTratado, $emailTratado, $senha, $cpfTratado, $telefoneTratado, $perfilTratado, $ativoTratado);
    }

    /*
     *   Precisam ser criados métodos aqui na controller para receber os dados
     * da VIEW, validar e depois encaminhar de volta para VIEW em caso de erro ou
     * para a Model se tudo Ok.
     */

    public function buscaTodosUsuarios(){
        $data = $this->UsuarioModel->read();
        foreach ($data as $user) {
            $idToView = htmlspecialchars($user['id']);
            $nameToView = htmlspecialchars($user['nome']);
            $emailToView = htmlspecialchars($user['email']);
            $cpfToView = htmlspecialchars($user['cpf']);
            $telefoneToView = htmlspecialchars($user['telefone']);
            $perfilToView = htmlspecialchars($user['perfil']);
            $ativoToView = $user['ativo'];
        }
        // Precisamos recompor o array com todos os dados e ids.
        return ([$idToView, $nameToView, $emailToView, $cpfToView, $telefoneToView, $perfilToView, $ativoToView]);
    }
}

?>
```

### Modificando Index para uso do Controller
```php
<?php
// index.php
require_once __DIR__ . '/src/Controllers/UsuarioController.php';

$usuario = new UsuarioController();

// Listar usuários
$ret = $usuario->buscaTodosUsuarios();
var_dump($ret);
/*
foreach ($data as $user) {
    echo "ID: " . $user['id'] . "\n";
    echo "Nome: " . $user['nome'] . "\n";
    echo "E-mail: " . $user['email'] . "\n\n";
}
*/
// Criando um novo user
// Executa o metodo da classe UsuarioController para criar um novo user
/*
$ret = $usuario->criarUsuario("","user06@biblioteca.com","P@ssw0rd","123.456.789-06","","bibliotecario",1);
if ($ret) {
    echo "Usuario criado com sucesso!";
} else {
    echo "Erro ao criar usuario!";
}
*/
```
