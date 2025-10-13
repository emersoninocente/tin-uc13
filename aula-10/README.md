# 📦 Aula 09 – PHP + MariaDB com PDO

## 🎯 Objetivos

- Usar namespace
- Conectar PHP ao banco de dados usando PDO
- Realizar operações CRUD básicas

## 🗃️ Namespace

> Namespaces no PHP são usados para organizar o código e evitar conflitos de nomes entre classes, funções ou constantes. Eles foram introduzidos no PHP 5.3 e são especialmente úteis em projetos grandes ou ao usar bibliotecas de terceiros. Um namespace é declarado no início de um arquivo PHP usando a palavra-chave `namespace`. Ele deve ser a primeira instrução do arquivo, antes de qualquer outro código.

### ✏️ Exemplo

```php
// ./MeuProjeto/MinhaClasse.php
<?php
namespace MeuProjeto;

class MinhaClasse {
    public function dizerOla() {
        return "Olá do MeuProjeto!\n";
    }
}
?>
```

```php
// ./MeuProjeto/index.php
<?php
require 'MinhaClasse.php';

use MeuProjeto\MinhaClasse;

$obj = new MinhaClasse();
echo $obj->dizerOla();
?>
```

---

## 📚 Conectando com banco de dados

- Conexão com SGBD usando PDO
- Inserção, leitura, atualização e exclusão
- Tratamento de erros

### 💻 Exemplo de Código

```php
<?php
// conexao.php
// Teste de conexao simples
try {
   $dsn = 'mysql:host=localhost;dbname=biblioteca_db;charset=utf8';
   $username = 'biblio_user';
   $password = 'securepasswordbiblio';
   $options = [
       PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, // Enable exceptions for errors
       PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, // Fetch results as associative arrays
   ];
   $pdo = new PDO($dsn, $username, $password, $options);

   if ($pdo) {
       echo "Connected to the database successfully!";
   }
} catch (PDOException $e) {
   echo 'Connection failed: ' . $e->getMessage();
}
?>
```

> No exemplo acima criamos um teste de conexão com banco de dados usando PDO. O PDO (PHP Data Objects) é uma interface leve e consistente para acessar bancos de dados em PHP. Ele suporta múltiplos drivers de banco de dados, como MySQL, PostgreSQL, SQLite, entre outros, permitindo que o mesmo código funcione em diferentes sistemas de banco de dados. Além disso, o PDO oferece suporte a **Prepared Statements**, que ajudam a prevenir ataques de SQL Injection.

### Métodos Úteis do PDO

- **query():** Executa uma consulta SQL diretamente, mas não é recomendado para dados fornecidos pelo usuário.
- **prepare():** Prepara uma consulta SQL para execução.
- **execute():** Executa uma consulta preparada.
- **fetch():** Retorna uma única linha do resultado.
- **fetchAll():** Retorna todas as linhas do resultado.

### Tratamento de Erros

O PDO oferece três modos de tratamento de erros:

- **PDO::ERRMODE_SILENT:** Silencioso, não exibe erros.
- **PDO::ERRMODE_WARNING:** Emite avisos.
- **PDO::ERRMODE_EXCEPTION:** Lança exceções (recomendado).

### Fechando a Conexão

A conexão com o banco de dados é fechada automaticamente ao final do script. No entanto, você pode fechá-la manualmente atribuindo `null` à variável de conexão:

`$conn = null;`

O PDO é uma ferramenta poderosa e flexível para trabalhar com bancos de dados em PHP, oferecendo segurança, portabilidade e facilidade de uso.

---

## 🧪 Exercícios

1. Criar script para inserir novo livro.
2. Criar script para listar todos os usuários.