<?php
// index.php

// Carrega configurações e dependências
require_once 'app/config/database.php';

// Pega o parâmetro "page" da URL, padrão "dashboard"
$page = $_GET['page'] ?? 'home';

// Simulação de verificação de autenticação (você pode aprimorar depois)
session_start();
$loggedIn = isset($_SESSION['user_id']); 
$isAdmin = $_SESSION['role'] ?? false;

switch ($page) {
    // Páginas públicas para autenticação
    case 'login':
        require 'app/controller/AuthController.php';
        AuthController::login();
        break;
    case 'logout':
        require 'app/controller/AuthController.php';
        AuthController::logout();
        break;
    case 'recuperar-senha':
        require 'app/controller/AuthController.php';
        AuthController::recuperarSenha();
        break;
    case 'cadastro':
        require 'app/controller/CadastroController.php';
        CadastroController::cadastrar();
        break;

    // Requer usuário logado
    case 'home':
    case 'pomodoro':
    case 'lembrete':
    case 'calendario':
    case 'configuracoes':
    case 'perfil':
        if (!$loggedIn) {
            header('Location: index.php?page=login');
            exit;
        }
        // Controllers e views para cada página:
        switch ($page) {
            case 'home':
                require 'app/controller/HomeController.php';
                DashboardController::mostrarPainel();
                break;
            case 'pomodoro':
                require 'app/controller/PomodoroController.php';
                PomodoroController::mostrarPomodoro();
                break;
            case 'lembrete':
                require 'app/controller/LembreteController.php';
                LembreteController::mostrarLembretes();
                break;
            case 'calendario':
                require 'app/controller/CalendarioController.php';
                CalendarioController::mostrarCalendario();
                break;
            case 'configuracoes':
                require 'app/controller/ConfigController.php';
                ConfigController::mostrarConfig();
                break;
            case 'perfil':
                require 'app/controller/PerfilController.php';
                PerfilController::editarPerfil();
                break;
        }
        break;

    // Área admin
    case 'admin-lista-usuarios':
    case 'admin-editar-usuario':
        if (!$loggedIn || !$isAdmin) {
            header('Location: index.php?page=login');
            exit;
        }
        require 'app/controller/AdminController.php';
        if ($page === 'admin-lista-usuarios') {
            AdminController::listarUsuarios();
        } else {
            AdminController::editarUsuario();
        }
        break;

    // Página padrão / home / 404
    default:
        if ($loggedIn) {
            header('Location: index.php?page=home');
        } else {
            header('Location: index.php?page=login');
        }
        exit;
}
