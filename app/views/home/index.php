<style>
    .dashboard-header {
        background: linear-gradient(135deg, #3498db, #2c3e50);
        padding: 2rem;
        border-radius: 15px;
        margin-bottom: 2rem;
        color: white;
        position: relative;
    }

    .dashboard-header h1 {
        font-size: 2.5rem;
        font-weight: 700;
        margin-bottom: 0.5rem;
        color: white;
    }

    .dashboard-header .lead {
        color: rgba(255, 255, 255, 0.9);
        font-size: 1.1rem;
    }

    .logout-btn {
        position: absolute;
        top: 1rem;
        right: 1rem;
        background: rgba(255, 255, 255, 0.1);
        border: 1px solid rgba(255, 255, 255, 0.2);
        color: white;
        padding: 0.5rem 1rem;
        border-radius: 8px;
        transition: all 0.3s ease;
        text-decoration: none;
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }

    .logout-btn:hover {
        background: rgba(255, 255, 255, 0.2);
        color: white;
        transform: translateY(-2px);
    }

    .card {
        transition: all 0.3s ease;
        border: none;
        border-radius: 15px;
        box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        overflow: hidden;
        background: white;
        height: 100%;
    }
    
    .card:hover {
        transform: translateY(-10px);
        box-shadow: 0 8px 25px rgba(0,0,0,0.15);
    }
    
    .card-body {
        padding: 1.5rem;
        display: flex;
        flex-direction: column;
        height: 100%;
    }

    .card-title {
        color: #2c3e50;
        font-weight: 600;
        font-size: 1.25rem;
        margin-bottom: 1rem;
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }

    .card-title i {
        color: #3498db;
    }
    
    .card-text {
        color: #7f8c8d;
        margin-bottom: 1.5rem;
        line-height: 1.6;
        flex-grow: 1;
    }
    
    .btn-primary {
        background: linear-gradient(135deg, #3498db, #2980b9);
        border: none;
        padding: 10px 25px;
        border-radius: 8px;
        font-weight: 500;
        transition: all 0.3s ease;
        width: 100%;
        text-align: center;
    }
    
    .btn-primary:hover {
        background: linear-gradient(135deg, #2980b9, #2c3e50);
        transform: translateY(-2px);
        box-shadow: 0 4px 15px rgba(52, 152, 219, 0.3);
    }

    .feature-icon {
        font-size: 2.5rem;
        margin-bottom: 1rem;
        color: #3498db;
        text-align: center;
    }

    .welcome-message {
        display: flex;
        align-items: center;
        gap: 1rem;
        margin-bottom: 1rem;
    }

    .welcome-message .user-avatar {
        width: 50px;
        height: 50px;
        background: rgba(255, 255, 255, 0.2);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.5rem;
    }
</style>

<div class="container mt-4">
    <div class="dashboard-header">
        <div class="welcome-message">
            <div class="user-avatar">👤</div>
            <div>
                <h1>Bem-vindo, <?php echo htmlspecialchars($_SESSION['user_name']); ?>! 👋</h1>
                <p class="lead">Seu centro de controle pessoal para máxima produtividade</p>
            </div>
        </div>
        <a href="index.php?page=logout" class="logout-btn">
            <i class="fas fa-sign-out-alt"></i> Sair
        </a>
    </div>

    <div class="row mt-4">
        <!-- Card Pomodoro -->
        <div class="col-md-4 mb-4">
            <div class="card">
                <div class="card-body">
                    <div class="feature-icon">⏱️</div>
                    <h5 class="card-title">Pomodoro</h5>
                    <p class="card-text">Aumente sua produtividade com a técnica Pomodoro. Gerencie seu tempo de forma eficiente e mantenha o foco nas suas tarefas.</p>
                    <a href="index.php?page=pomodoro" class="btn btn-primary">Iniciar Pomodoro</a>
                </div>
            </div>
        </div>

        <!-- Card Lembretes -->
        <div class="col-md-4 mb-4">
            <div class="card">
                <div class="card-body">
                    <div class="feature-icon">🔔</div>
                    <h5 class="card-title">Lembretes</h5>
                    <p class="card-text">Nunca mais perca um compromisso importante. Crie lembretes personalizados e receba notificações no momento certo.</p>
                    <a href="index.php?page=lembrete" class="btn btn-primary">Ver Lembretes</a>
                </div>
            </div>
        </div>

        <!-- Card Calendário -->
        <div class="col-md-4 mb-4">
            <div class="card">
                <div class="card-body">
                    <div class="feature-icon">📅</div>
                    <h5 class="card-title">Calendário</h5>
                    <p class="card-text">Organize sua agenda de forma visual e intuitiva. Visualize todos os seus compromissos em um só lugar.</p>
                    <a href="index.php?page=calendario" class="btn btn-primary">Abrir Calendário</a>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-4">
        <!-- Card Configurações -->
        <div class="col-md-6 mb-4">
            <div class="card">
                <div class="card-body">
                    <div class="feature-icon">⚙️</div>
                    <h5 class="card-title">Configurações</h5>
                    <p class="card-text">Personalize sua experiência de acordo com suas preferências. Ajuste notificações, temas e outras configurações do sistema.</p>
                    <a href="index.php?page=configuracoes" class="btn btn-primary">Configurar</a>
                </div>
            </div>
        </div>

        <!-- Card Perfil -->
        <div class="col-md-6 mb-4">
            <div class="card">
                <div class="card-body">
                    <div class="feature-icon">👤</div>
                    <h5 class="card-title">Perfil</h5>
                    <p class="card-text">Gerencie suas informações pessoais e mantenha seu perfil sempre atualizado. Visualize seu histórico de atividades.</p>
                    <a href="index.php?page=perfil" class="btn btn-primary">Editar Perfil</a>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Adicione o Font Awesome para os ícones -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
