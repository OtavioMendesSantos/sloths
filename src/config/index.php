<?php
// Função para carregar variáveis de ambiente do arquivo .env
function loadEnv($path) {
    if (!file_exists($path)) {
        throw new Exception(".env file not found at $path");
    }
    
    $lines = file($path, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    foreach ($lines as $line) {
        // Ignora comentários
        if (strpos(trim($line), '#') === 0) { 
            continue;
        }
        
        list($name, $value) = explode('=', $line, 2);
        $name = trim($name);
        $value = trim($value);
        
        // Remove aspas se existirem
        if (strpos($value, '"') === 0 || strpos($value, "'") === 0) {
            $value = substr($value, 1, -1);
        }
        
        // Define a variável de ambiente
        putenv("$name=$value");
        $_ENV[$name] = $value;
        $_SERVER[$name] = $value;
    }
}

// Carrega as variáveis do .env (ajuste o caminho conforme a estrutura do seu projeto)
loadEnv(__DIR__ . '/../../.env');

// Obtém as variáveis do ambiente
$host = $_ENV['HOST'];
$port = $_ENV['PORT'];
$user = $_ENV['USER'];
$password = $_ENV['PASSWORD'];
$database = $_ENV['DATABASE'];

// Cria conexão
$conn = mysqli_connect($host, $user, $password, $database, $port);

// Verifica conexão
if (!$conn) {
    die("Falha na conexão: " . mysqli_connect_error());
}

echo "Conexão bem-sucedida!";
?>