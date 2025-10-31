<!DOCTYPE html>
<html>
    <head>
        <meta charset='UTF-8'>
        <title>Cria usuário no sistema</title>
        <link rel="stylesheet" href="../../public/style.css">
    </head>
    <body>
      <div class='container'>
        <h2>Criar Usários Novos</h2>

        <?php
            if (isset($_GET['erro'])) {
                echo '<div class="alert alert-erro">';
                switch ($_GET['erro']){
                    case 'validacao':
                        echo "Erro na validação dos dados informados!<br>";
                        echo $_GET['mensagem'];
                        break;
                }
                echo '</div>';
            }
        ?>

        <form action='processaCriarUsuario.php' method='POST'>
            <div class='form-group'>
                <label for='nome'>Nome:<span class="required">*</span></label>
                <input type='text' id='nome' name='nome' require>
            </div>

            <div class='form-group'>
                <label for='email'>E-mail:<span class="required">*</span></label>
                <input type='text' id='email' name='email' require>
            </div>
            
            <div class='form-group'>
                <label for='password'>Senha:<span class="required">*</span></label>
                <input type='password' id='password' name='password' require>
            </div>

            <div class='form-group'>
                <label for='cpf'>CPF:<span class="required">*</span></label>
                <input type='text' id='cpf' name='cpf' require>
            </div>

            <div class='form-group'>
                <label for='telefone'>Telefone:<span class="required">*</span></label>
                <input type='text' id='telefone' name='telefone' require>
            </div>

            <div class='form-group'>
                <label for='perfil'>Perfil:<span class="required">*</span></label>
                <select id='perfil' name='perfil' require>
                    <option value='usuario' selected>Usuário</option>
                    <option value='bibliotecario'>Bibliotecário</option>
                    <option value='administrador'>Administrador</option>
                </select>
            </div>
            
            <div class='form-group'>
                <label for='ativo'>Status:<span class="required">*</span></label>
                <select id='ativo' name='ativo' require>
                    <option value='1' selected>Ativo</option>
                    <option value='0'>Inativo</option>
                </select>
            </div>

            <div class='form-group'>
                <button type='submit' class="btn-novo">Executar</button>
                <button type='button' onclick="window.location.href='listarUsuarios.php'" class="btn-cancelar">Cancelar</button>
            </div>
        </form>
      </div>
    </body>
</html>