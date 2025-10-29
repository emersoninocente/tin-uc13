<?php
// src/View/listarUsuarios.php
require_once __DIR__ . '/../Controllers/UsuarioController.php';
$usuarioController = new UsuarioController();
$usuarios = $usuarioController->buscaTodosUsuarios();
?>
<!DOCTYPE html>
<html lang='pt-br'>
    <head>
        <meta charset='UTF-8'>
        <title>Lista usuários do sistema</title>
        <link rel="stylesheet" href="../../public/style.css">
    </head>
    <body>
      <div class='container'>
        <h2>Lista de usuários</h2>
        <a href="criarUsuario.php" class="btn-novo">+ Novo Usuário</a>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>e-mail</th>
                    <th>CPF</th>
                    <th>Telefone</th>
                    <th>Perfil</th>
                    <th>Status</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($usuarios as $usuario): ?>
                <tr>
                    <td><?php echo $usuario['id']; ?></td>
                    <td><?php echo $usuario['nome']; ?></td>
                    <td><?php echo $usuario['email']; ?></td>
                    <td><?php echo $usuario['cpf']; ?></td>
                    <td><?php echo $usuario['telefone']; ?></td>
                    <td><?php echo $usuario['perfil']; ?></td>
                    <td><?php echo $usuario['ativo']; ?></td>
                    <td>
                        <a href="editarUsuario.php?id=<?php echo $usuario['id'];?>" class="btn-editar">Editar</a>
                        <a href="processaDeletarUsuario.php?id=<?php echo $usuario['id'];?>" class="btn-deletar">Deletar</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
      </div>
    </body>
</html>