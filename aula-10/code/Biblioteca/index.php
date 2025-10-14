<?php
// index.php
require_once __DIR__ . '/src/Models/Usuario.php';

$usuario = new Usuario();

// Listar usuários
$usuarios = $usuario->read();
foreach ($usuarios as $user) {
    echo "Nome: " . $user['nome'] . "<br>";
}
?>