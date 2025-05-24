<?php
require_once __DIR__ . '/../utils/logConsole.php';

// Função para carregar variáveis do .env
function loadEnv($path)
{
    if (!file_exists($path)) {
        throw new Exception(".env file not found at $path");
    }

    $lines = file($path, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    foreach ($lines as $line) {
        if (strpos(trim($line), '#') === 0) continue;
        if (!strpos($line, '=')) continue;

        list($name, $value) = explode('=', $line, 2);
        $name = trim($name);
        $value = trim($value);

        if ((substr($value, 0, 1) === '"' && substr($value, -1) === '"') ||
            (substr($value, 0, 1) === "'" && substr($value, -1) === "'")
        ) {
            $value = substr($value, 1, -1);
        }

        putenv("$name=$value");
        $_ENV[$name] = $value;
        $_SERVER[$name] = $value;
    }
}

// Carrega o .env a partir da raiz
loadEnv(__DIR__ . '/../../.env');

// Usa as variáveis de ambiente
logConsole("Carregando variáveis de ambiente...");
$host = $_ENV['DB_HOST'];
$port = $_ENV['DB_PORT'];
$user = $_ENV['DB_USER'];
$password = $_ENV['DB_PASSWORD'];
$database = $_ENV['DB_DATABASE'];

$conn = mysqli_connect($host, $user, $password, $database, $port);

if (!$conn) {
    logConsole("Falha na conexão: " . mysqli_connect_error());
    die("Falha na conexão: " . mysqli_connect_error());
}

logConsole("Conexão bem-sucedida!");
