<?php

require_once __DIR__ . '/../config/database.php'; // Define $pdo

class UserModel {
    private $conn;

    public function __construct() {
        global $pdo;
        $this->conn = $pdo;
    }

    public function emailExiste($email) {
        return $this->buscarPorEmail($email) !== false;
    }

    public function buscarPorEmail($email) {
        $sql = "SELECT id, nome, email, senha FROM usuarios WHERE email = :email LIMIT 1";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([':email' => $email]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
        // var_dump($resultado);
        // exit;
    }

    public function autenticar($email, $senha) {
        if (empty($email) || empty($senha)) {
            return false;
        }

        $usuario = $this->buscarPorEmail($email);

        if ($usuario && password_verify($senha, $usuario['senha'])) {
            return $usuario;
        }

        return false;
    }

    public function registrar($nome, $email, $senha, $genero) {
        if (empty($nome) || empty($email) || empty($senha) || empty($genero)) {
            return false;
        }

        if ($this->buscarPorEmail($email)) {
            return false;
        }

        $senhaHash = password_hash($senha, PASSWORD_DEFAULT);

        $sql = "INSERT INTO usuarios (nome, email, senha, genero) VALUES (:nome, :email, :senha, :genero)";
        $stmt = $this->conn->prepare($sql);

        $success = $stmt->execute([
            ':nome' => $nome,
            ':email' => $email,
            ':senha' => $senhaHash,
            ':genero' => $genero
        ]);

        if ($success) {
            return $this->conn->lastInsertId();
        }

        return false;
    }

}
