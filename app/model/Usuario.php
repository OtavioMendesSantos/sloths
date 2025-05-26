<?php

require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../utils/logConsole.php';

class UserModel
{
    private $conn;

    public function __construct()
    {
        global $conn;
        $this->conn = $conn;
    }

    public function buscarPorEmail($email)
    {
        $sql = "SELECT id, nome, email FROM usuarios WHERE email = ? LIMIT 1";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }

    public function autenticar($email, $senha)
    {
        if (empty($email) || empty($senha)) {
            logConsole("Email ou senha não informados");
            return false;
        }

        logConsole("Autenticando usuário com email: $email");
        $senhaHash = password_hash($senha, PASSWORD_DEFAULT);
        logConsole("Senha hash: $senhaHash");

        $sql = "SELECT id, nome, email, senha FROM usuarios WHERE email = ? LIMIT 1";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();
        $usuario = $result->fetch_assoc();

        if ($usuario && password_verify($senha, $usuario['senha'])) {
            logConsole("Usuário autenticado com sucesso");
            return $usuario;
        }

        logConsole("Falha na autenticação");
        return false;
    }

    public function registrar($nome, $email, $senha)
    {
        if (empty($nome) || empty($email) || empty($senha)) {
            logConsole("Dados incompletos para criação de usuário");
            return false;
        }

        // Verifica se email já existe
        if ($this->buscarPorEmail($email)) {
            logConsole("Email já cadastrado");
            return false;
        }

        $senhaHash = password_hash($senha, PASSWORD_DEFAULT);

        $sql = "INSERT INTO usuarios (nome, email, senha) VALUES (?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("sss", $nome, $email, $senhaHash);

        if ($stmt->execute()) {
            logConsole("Usuário criado com sucesso");
            return $this->conn->insert_id;
        }

        logConsole("Erro ao criar usuário: " . $stmt->error);
        return false;
    }
}
