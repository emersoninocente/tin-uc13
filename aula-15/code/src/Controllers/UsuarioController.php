<?php
// src/Controllers/UsuarioController.php
require_once __DIR__ . "/../Models/UsuarioModel.php";

class UsuarioController {
    private $usuarioModel;
    private $users = [];

    public function __construct(){
        $this->usuarioModel = new UsuarioModel();
    }

    public function criarUsuario($nome, $email, $senha, $cpf, $telefone, $perfil, $ativo){
        // Processo de validação dos dados recebidos
        if(empty($nome) || !$this->validarNome($nome)){
            throw new InvalidArgumentException("Campo NOME inválido!");
        }

        $emailTratado = filter_var($email, FILTER_VALIDATE_EMAIL);
        if($emailTratado === false){
            throw new InvalidArgumentException("Campo EMAIL inválido!");
        }

        // Senha deve ter mínimo 6 caracteres, uma letra maiúscula, uma letra minúscula, um número (sem sequencias) e um caracter especial, não permite o uso de "<" ou ">".
        if($this->validarSenha($senha)){
            throw new InvalidArgumentException("Campo SENHA Inválida!");
        }
        
        // XXX.XXX.XXX-XX ou XXXXXXXXXXX
        if(!$this->validarCPF($cpf)){
            throw new InvalidArgumentException("Campo CPF inválido!");
        }
        
        // +XX XX XXXXX XXXX
        if($this->validarTelefone(!$telefone)) {
            throw new InvalidArgumentException("Campo TELEFONE inválido!");
        }
        // Estes dois campos não precisariam ser validados pois perfil pode ser informado diretamente no código conforme o perfil do usuário que acessa o sistema. Quanto ao ATIVO, na criação é sempre SIM.

        return $this->usuarioModel->create($nome, $email, $senha, $cpf, $telefone, $perfil, $ativo);
    }

    public function buscaTodosUsuarios(){
        $this->users = [];
        $data = $this->usuarioModel->read();
        foreach ($data as $user) {
            $idToView = htmlspecialchars($user['id']);
            $nameToView = htmlspecialchars($user['nome']);
            $emailToView = htmlspecialchars($user['email']);
            $cpfToView = htmlspecialchars($user['cpf']);
            $telefoneToView = htmlspecialchars($user['telefone']);
            $perfilToView = htmlspecialchars($user['perfil']);
            $ativoToView = $user['ativo'];

            $users[] = [
                'id' => $idToView,
                'nome' => $nameToView,
                'email' => $emailToView,
                'cpf' => $cpfToView,
                'telefone' => $telefoneToView,
                'perfil' => $perfilToView,
                'ativo' => $ativoToView
            ];
        }
        // Precisamos recompor o array com todos os dados e ids.
        return $users;
    }

    public function atualizaUsuario($id, $nome, $email, $senha, $cpf, $telefone, $perfil, $ativo){
        // Processo de validação dos dados recebidos
        if(empty($nome) || !$this->validarNome($nome)){
            throw new InvalidArgumentException("Campo NOME inválido!");
        }

        $emailTratado = filter_var($email, FILTER_VALIDATE_EMAIL);
        if($emailTratado === false){
            throw new InvalidArgumentException("Campo EMAIL inválido!");
        }

        if($this->validarSenha($senha)){
            throw new InvalidArgumentException("Campo SENHA Inválida!");
        }
        
        if(!$this->validarCPF($cpf)){
            throw new InvalidArgumentException("Campo CPF inválido!");
        }
        
        if($this->validarTelefone(!$telefone)) {
            throw new InvalidArgumentException("Campo TELEFONE inválido!");
        }

        return $this->usuarioModel->update($id, $nome, $email, $senha, $cpf, $telefone, $perfil, $ativo);
    }

    public function deletaUsuario($id){
        return $this->usuarioModel->delete($id);
    }

    // Métodos privados para validar os dados
    private function validarNome(string $nome): bool {
        // Normaliza espaços e remove espaços nas extremidades
        $nome = trim(preg_replace('/\s+/', ' ', $nome));
        // Regex para nomes com letras, acentos, hífens e pontos
        $regex = '/^([A-ZÀ-Úa-zà-ú\.-]+(?:\s[A-ZÀ-Úa-zà-ù\.-]+)*)$/u';

        // Verifica caracteres perigosos
        if (preg_match('/[<>\"\']/', $nome)) {
            return false;
        }
        // Verifica palavras-chave perigosas (case-insensitive)
        $palavrasProibidas = ['script', 'onload', 'onclick', 'onerror', 'iframe', 'img', 'src', 'eval'];
        foreach ($palavrasProibidas as $proibida) {
            if (stripos($nome, $proibida) !== false) {
                return false;
            }
        }
        // Aplica regex final
        return preg_match($regex, $nome) === 1;
    }

    private function validarSenha(string $senha): bool {
        $regex = '/^' .
                 '(?=.*[A-Z])' .                                        // Critério 1: Pelo menos uma maiúscula
                 '(?=.*[a-z])' .                                        // Critério 2: Pelo menos uma minúscula
                 '(?=.*[0-9])' .                                        // Critério 3: Pelo menos um número
                 '(?=.*[!@#%&*()-_\.])' .                               // Critério 4: Pelo menos um caractere especial
                 '(?!.*(.)\1\1)' .                                      // Proibição 1: Sem 3 caracteres repetidos em sequência (ex: aaa, 111)
                 '.{6,}$/';                                             // Requisito final: Mínimo de 8 caracteres de comprimento

        return preg_match($regex, $senha) !== 1;
    }

    private function validarCPF(string $cpf): bool {
        // 1. Limpa o CPF, removendo qualquer caractere que não seja um número.
        // Isso lida com todos os formatos que você pediu (XXX.XXX.XXX-XX, XXXXXXXXXXX, etc).
        $cpf = preg_replace('/[^0-9]/', '', $cpf);

        // 2. Verifica se o CPF tem 11 dígitos. Se não, é inválido.
        if (strlen($cpf) != 11) {
            return false;
        }

        // 3. Verifica se todos os dígitos são iguais (ex: 111.111.111-11).
        // Esses CPFs são considerados inválidos pela Receita Federal, embora passem no cálculo.
        if (preg_match('/(\d)\1{10}/', $cpf)) {
            return false;
        }

        // 4. Inicia o cálculo para validar os dígitos verificadores.
        // O CPF é dividido em corpo (9 primeiros dígitos) e dígitos verificadores (2 últimos).
        
        // --- Cálculo do primeiro dígito verificador ---
        $soma = 0;
        for ($i = 0; $i < 9; $i++) {
            // A soma é feita multiplicando cada dígito por um peso (de 10 a 2)
            $soma += $cpf[$i] * (10 - $i);
        }
        $resto = $soma % 11;
        $digitoVerificador1 = ($resto < 2) ? 0 : 11 - $resto;

        // Verifica se o primeiro dígito calculado bate com o do CPF
        if ($cpf[9] != $digitoVerificador1) {
            return false;
        }

        // --- Cálculo do segundo dígito verificador ---
        $soma = 0;
        for ($i = 0; $i < 10; $i++) {
            // A soma agora inclui o primeiro dígito verificador, com pesos de 11 a 2
            $soma += $cpf[$i] * (11 - $i);
        }
        $resto = $soma % 11;
        $digitoVerificador2 = ($resto < 2) ? 0 : 11 - $resto;

        // Verifica se o segundo dígito calculado bate com o do CPF
        if ($cpf[10] != $digitoVerificador2) {
            return false;
        }

        // 5. Se passou por todas as verificações, o CPF é válido.
        return true;
    }
    
    private function validarTelefone(string $telefone): bool {
        return preg_match('/^\+\d{1,3}\s\d{2,3}\s\d{4,5}-?\d{4}$/', $telefone) === 1;
    }
}

?>