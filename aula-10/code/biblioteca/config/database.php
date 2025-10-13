<?php
// config/database.php

define('DB_HOST', 'localhost');
define('DB_NAME', 'biblioteca');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_CHARSET', 'utf8mb4');

// Configurações da aplicação
define('BASE_URL', 'http://localhost/biblioteca/public/');
define('APP_NAME', 'Sistema de Biblioteca');
define('PRAZO_DEVOLUCAO_DIAS', 14); // Prazo padrão para devolução

// Configurações de sessão
ini_set('session.cookie_httponly', 1);
ini_set('session.use_only_cookies', 1);
ini_set('session.cookie_secure', 0); // Alterar para 1 em produção com HTTPS

session_start();