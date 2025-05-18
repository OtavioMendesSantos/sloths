<h1 align="center">:file_cabinet: sloths</h1>

## 📜 Descrição

Repositório dedicado ao desenvolvimento do Sloths. Um aplicativo de gerenciamento e progressão de estudos acadêmicos</a>

## :dart: Objetivo

Documentar e salvar todos os arquivos e versionamentos do projeto afim de acompanhar o progresso e servir de documentação prática.

## :wrench: Tecnologias utilizadas
<div>
   
   [![My Skills](https://skillicons.dev/icons?i=vscode,github,html,css,js,mysql,php)](https://skillicons.dev)  <img src="https://cdn.jsdelivr.net/gh/devicons/devicon@latest/icons/railway/railway-original.svg" width="48px;"/>
</div>

## 📝 Documentação

A formação em ADS tem 2 anos de duração, sendo assim, 4 semestres. Logo, a estrutura dos diretórios será feita assim:
<div align="center">
 
   ![Captura de tela 2024-03-16 172506](https://github.com/judah-lopes/fac_senac-ads/assets/134812191/eeff1b46-ddcc-421c-8be2-c9759f9f072d)
   ###### Pasta principal > semestre > materias > atividades/aulas etc.
</div>


#### PADRÃO DE COMMITS
<table>
  <tr>
    <td align="center">doc:</td>
    <td>Documentação</td>
  </tr>
  <tr>
    <td align="center">atv:</td>
    <td>Atividades</td>
  </tr>
  <tr>
    <td align="center">avl:</td>
    <td>Provas</td>
  </tr>
</table>
<br>

## 🗂️ Estrutura do projeto
Estrutura de Pastas MVC Atualizada para SLOTHS
bash
```bash
/sloths                   ← pasta raiz do projeto
├── /app
│   ├── /config           ← config de banco, ambiente etc
│   │   └── database.php
│   ├── /controller       ← lógica que responde às requisições
│   │   ├── AdminController.php
│   │   ├── AuthController.php       ← login, logout, recuperar senha
│   │   ├── CadastroController.php  ← cadastro de usuário
│   │   ├── CalendarioController.php  ←
│   │   ├── ConfigController.php  ←
│   │   ├── HomeController.php  ← página principal do usuário com painel
│   │   ├── LembreteController.php
│   │   ├── LoginController.php
│   │   ├── PerfilController.php
│   │   └── PomodoroController.php
│   ├── /model            ← classes que acessam o banco
│   │   ├── Evento.php← eventos do calendário
│   │   ├── Lembrete.php
│   │   ├── Pomodoro.php
│   │   └── Usuario.php                  ← eventos do calendário
│   └── /views            ← arquivos que geram a interface (HTML + PHP)
│       ├── /admin
│       │   ├── lista_usuarios.php
│       │   └── editar_usuario.php
│       ├── /auth
│       │   ├── cadastro.php
│       │   ├── login.php
│       │   └── recuperar_senha.php
│       ├── /dashboard
│       │   └── home.php              ← página principal do usuário (painel)
│       ├── /pomodoro
│       │   └── pomodoro.php
│       ├── /lembrete
│       │   └── lembrete.php
│       ├── /calendario
│       │   ├── calendario.php
│       │   └── modal_editar.php       ← modal para editar eventos
│       ├── /perfil
│       │   └── perfil.php
│       └── /configuracoes
│           └── configuracoes.php
├── /assets               ← arquivos estáticos: imagens, css, js frontend
│   ├── /css
│   ├── /js
│   └── /images
└── index.php               ← roteador principal
```

#### ☁️ Fundamentos de Computação em Nuvem 
-> <a href="https://github.com/judah-lopes/aws_academy-cloud_foundations/tree/main">AWS Academy Cloud Foundations<a>

## :handshake: Colaboradores

<table>
  <tr>
    <td align="center">
      <a href="https://github.com/otaviomendessantos">
        <img src="https://avatars.githubusercontent.com/u/145459372?v=4" width="100px;" alt="Foto de Otávio Mendes no GitHub"/><br>
        <sub>
          <b>otaviomendessantos</b>
        </sub>
      </a>
    </td>
    <td align="center">
      <a href="https://github.com/judah-lopes">
        <img src="https://avatars.githubusercontent.com/u/134812191?s=400&u=00a571215f2ea321a8738af235cea655e1e36ec6&v=4" width="100px;" alt="Foto de Judah Lopes no GitHub"/><br>
        <sub>
          <b>judah-lopes</b>
        </sub>
      </a>
    </td>
    <td align="center">
      <a href="https://github.com/Matheuspsm12">
        <img src="https://avatars.githubusercontent.com/u/136357212?v=4" width="100px;" alt="Foto de Matheus Peixoto no GitHub"/><br>
        <sub>
          <b>Matheuspsm12</b>
        </sub>
      </a>
    </td>
    <td align="center">
      <a href="https://github.com/Du-santana">
        <img src="https://avatars.githubusercontent.com/u/165734323?v=4" width="100px;" alt="Foto de Eduardo Santana no GitHub"/><br>
        <sub>
          <b>Du-santana</b>
        </sub>
      </a>
    </td>
    <td align="center">
      <a href="https://github.com/notsireh">
        <img src="https://avatars.githubusercontent.com/u/183026024?v=4" width="100px;" alt="Foto de Heriston Davi no GitHub"/><br>
        <sub>
          <b>notsireh</b>
        </sub>
      </a>
    </td>
    <td align="center">
      <a href="https://github.com/caslusant">
        <img src="https://avatars.githubusercontent.com/u/125915251?v=4" width="100px;" alt="Foto de Lucas Santos no GitHub"/><br>
        <sub>
          <b>caslusant</b>
        </sub>
      </a>
    </td>
  </tr>
</table>
