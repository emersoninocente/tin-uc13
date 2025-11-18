<?php
if (empty($_POST['e-mail'])) {
    header('Location: login.php?erro=validacao');
    exit();
}

if (empty($_POST['pass'])) {
    header('Location: login.php?erro=validacao');
    exit();
}

// Falta validar user e pass no banco já visto em aula
session_start();
$_SESSION['user'] = $_POST['e-mail'];
header('Location: src/Views/listarUsuarios.php');
?>
