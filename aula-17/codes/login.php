<!DOCTYPE html>
<html>
    <head>
        <meta charset='UTF-8'>
        <title>Gestão Biblioteca</title>
        <link rel="stylesheet" href="public/style.css">
    </head>
    <body>
      <div class='container'>
        <h2>Bem-vindo ao Sistema de Gestão de Biblioteca</h2>

        <?php
            if (isset($_GET['erro'])) {
                echo '<div class="alert alert-erro">';
                switch ($_GET['erro']){
                    case 'validacao':
                        echo "Erro: Usuario/Senha não confere!<br>";
                        break;
                }
                echo '</div>';
            }
        ?>

        <form action='validaLogin.php' method='POST'>
            <div class='form-group'>
                <label for='e-mail'>Usuário:<span class="required">*</span></label>
                <input type='text' id='e-mail' name='e-mail' required>
            </div>

            <div class='form-group'>
                <label for='pass'>Senha:<span class="required">*</span></label>
                <input type='password' id='pass' name='pass' required>
            </div>
            <div class='form-group'>
                <button type='submit' class="btn-novo">Login</button>
                <button type='button' onclick="window.location.href='login.php'" class="btn-cancelar">Cancelar</button>
            </div>
        </form>
      </div>
    </body>
</html>
