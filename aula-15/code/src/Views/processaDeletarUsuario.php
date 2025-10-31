<?php
// src/Views/processaDeletarUsuario.php
require_once __DIR__ . '/../Controllers/UsuarioController.php';

$id = isset($_GET['id']) ? $_GET['id'] : null;

if (!$id) {
    header('Location: listarUsuarios.php?erro=id_invalido');
    exit;
}

try {
    $usuarioController = new UsuarioController();
    $result = $usuarioController->deletaUsuario($id);

    if ($result) {
        header('Location: listarUsuarios.php?sucesso=usuario_deletado');
        exit;
    } else {
        header('Location: listarUsuario.php?erro=falha_deletar');
        exit;
    }
} catch (Exception $e){
    header('Location: listarUsuarios.php?erro=excessao');
    exit;
}

?>