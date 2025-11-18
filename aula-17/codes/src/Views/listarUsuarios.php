<?php
// Trecho que impede acesso direto a pagina sem estar logado no sistema
// deve ser colocado em todas as paginas!
session_start();
if (empty($_SESSION['user'])) {
    header('Location: ../../login.php');
}
// src/Views/listarUsuarios.php
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

        <?php
            if (isset($_GET['sucesso'])) {
                echo '<div class="alert alert-sucesso">';
                switch($_GET['sucesso']) {
                    case 'usuario_criado':
                        echo "Usuário Criado com Sucesso!";
                        break;
                    case 'usuario_atualizado':
                        echo "Usuário Atualizado com Sucesso!";
                        break;
                    case 'usuario_deletado':
                        echo "Usuário Deletado com Sucesso!";
                        break;
                    case 'usuario_atualizar':
                        echo "Usuário Atualizado com Sucesso!";
                        break;
                    case 'troca_senhaOk':
                        echo "Troca de Senha com Sucesso!";
                        break;
                }
                echo '</div>';
            }

            if (isset($_GET['erro'])) {
                echo '<div class="alert alert-error">';
                switch($_GET['erro']) {
                    case 'falha_atualizar':
                        echo "Erro ao Atualizar Usuário!";
                        break;
                    case 'troca_senhaNOk':
                        echo "Erro ao Trocar a Senha do Usuário!";
                        break;
                }
                echo '</div>';
            }
        ?>

        <a href="criarUsuario.php" class="btn-novo">+ Novo Usuário</a>
        <a href="../../logout.php" class="btn-deletar">Sair do Sistema</a>
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
                    <td><?php echo $usuario['ativo'] ? 'Ativo': 'Inativo'; ?></td>
                    <td>
                        <a href="editarUsuario.php?id=<?php echo $usuario['id'];?>" class="btn-editar">Editar</a>
                        <a href="processaDeletarUsuario.php?id=<?php echo $usuario['id'];?>" class="btn-deletar">Deletar</a>
                        <a href="trocarSenhaUsuario.php?id=<?php echo $usuario['id'];?>" class="btn-trocaSenha">Trocar Senha</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
      </div>
    </body>
</html>
