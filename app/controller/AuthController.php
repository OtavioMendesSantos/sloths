<?php
require_once __DIR__ . '/../model/Usuario.php';

class AuthController
{
    public static function login()
    {
        // Se for uma requisição POST, processa o login
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['email'] ?? '';
            $senha = $_POST['senha'] ?? '';
            
            $userModel = new UserModel();
            $usuario = $userModel->autenticar($email, $senha);

            if ($usuario) {
                // Login bem sucedido
                $_SESSION['user_id'] = $usuario['id'];
                $_SESSION['user_name'] = $usuario['nome'];
                $_SESSION['user_email'] = $usuario['email'];
                $_SESSION['logged_in'] = true;
                
                header('Location: index.php?page=home');
                exit;
            } else {
                // Login falhou
                $_SESSION['erro_login'] = 'Email ou senha inválidos';
                header('Location: index.php?page=login');
                exit;
            }
        }

        // Se for GET, apenas mostra a view de login
        require_once __DIR__ . '/../views/auth/login.php';
    }

    public static function logout()
    {
        session_destroy();
        header('Location: index.php?page=login');
        exit;
    }

    public static function register()
    {
        // lógica de cadastro
    }

    public static function recuperarSenha()
    {
        // lógica de recuperação de senha
    }
}
