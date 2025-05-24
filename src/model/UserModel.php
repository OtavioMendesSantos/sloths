<?php


class UserModel
{
    private $pdo;

    public function __construct()
    {
        $host = 'gondola.proxy.rlwy.net';
        $db   = 'railway'; // Altere para o nome do seu banco
        $user = 'root';   // Altere se necessário
        $pass = 'PuxykywjJoxUgnxqrMJgWhhWpgOeALwq'; // Altere se necessário
        $charset = 'utf8mb4';

        $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
        $options = [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES   => false,
        ];

        try {
            $this->pdo = new PDO($dsn, $user, $pass, $options);
        } catch (\PDOException $e) {
            throw new \PDOException($e->getMessage(), (int)$e->getCode());
        }
    }

    public function autenticar($email, $senha)
    {
        $sql = "SELECT id, nome, email, senha FROM usuarios WHERE email = :email LIMIT 1";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['email' => $email]);
        $usuario = $stmt->fetch();

        if ($usuario && password_verify($senha, $usuario['senha'])) {
            // Retorna os dados do usuário autenticado
            return $usuario;
        }
        // Retorna false se não autenticou
        return false;
    }
}