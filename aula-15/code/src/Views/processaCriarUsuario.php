<?php
require_once __DIR__ . "/../Controllers/UsuarioController.php";

// Valida se método enviado é o que estamos esperando
if ($_SERVER['REQUEST_METHOD'] !== "POST") {
    header('Location: criarUsuario.php');
    exit;
}

// Capturar os dados recebidos
$nome = $_POST['nome'];
$email = $_POST['email'];
$pwd = $_POST['password'];
$cpf = $_POST['cpf'];
$telefone = $_POST['telefone'];
$perfil = $_POST['perfil'];
$ativo = $_POST['ativo'];

// Vamos validar os dados usando a classe ControllerUsuario
try {
    $usuarioController = new UsuarioController();

    $result = $usuarioController->criarUsuario(
        $nome,
        $email,
        $pwd,
        $cpf,
        $telefone,
        $perfil,
        $ativo
    );

    if ($result) {
        header('Location: listarUsuarios.php?sucesso=usuario_criado');
        exit;
    } else {
        header('Location: criarUsuario.php?erro=falha_criar');
        exit;
    }

} catch (InvalidArgumentException $e){
    header('Location: criarUsuario.php?erro=validacao&mensagem=' . urlencode($e->getMessage()));
    exit;
}

?>