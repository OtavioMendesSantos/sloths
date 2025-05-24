<?php
$userModel = new UserModel();
$usuario = $userModel->autenticar($email, $senha);

if ($usuario) {
    // Login OK, pode criar as variáveis de sessão
    $_SESSION['usuario_id'] = $usuario['id'];
    $_SESSION['usuario_nome'] = $usuario['nome'];
    $_SESSION['usuario_email'] = $usuario['email'];
    $_SESSION['logado'] = true;
    // Redirecionar para dashboard ou página inicial
} else {
    // Login inválido
}
    $_SESSION['erro_login'] = 'Usuário ou senha inválidos';
    header('Location: /git-hub/sloths/src/views/UserModel.php');
    exit;
