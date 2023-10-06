<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Controle Financeiro de Contas a Pagar</title>
    <style>
        /* Estilos CSS aqui */
    </style>
</head>
<body>
<?php

// Configurações
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASSWORD', '');

// Autoloading de Classes
spl_autoload_register(function ($class) {
    require_once('../classes/Router.php');
    require_once('../controllers/ContaPagarController.php');
});


// Configuração de Sessão
session_name('minha_sessao');
session_start();

// Configuração de Timezone
date_default_timezone_set('America/Sao_Paulo');


// Configurações de conexão
$banco = "controle_financeiro"; // Nome do banco de dados

// Cria uma conexão com o banco de dados
$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, $banco);



// Verifica se houve algum erro na conexão
if ($mysqli->connect_error) {
    die("Erro de conexão: " . $mysqli->connect_error);
}


// Definição de Rotas (simplificado)
if ($_SERVER['REQUEST_URI'] === '/contas_pagar') {
    // Lógica para listar contas a pagar
} elseif ($_SERVER['REQUEST_URI'] === '/contas_pagar/adicionar') {
    // Lógica para adicionar uma conta a pagar
} elseif ($_SERVER['REQUEST_URI'] === '/contas_pagar/editar') {
    // Lógica para editar uma conta a pagar
}

// Lógica de Controlador (simplificado)
if (isset($_POST['acao'])) {
    if ($_POST['acao'] === 'adicionar_conta') {
        // Lógica para adicionar uma conta a pagar
    } elseif ($_POST['acao'] === 'editar_conta') {
        // Lógica para editar uma conta a pagar
    }
}

// Visualizações (simplificado)
if ($_SERVER['REQUEST_URI'] === '/contas_pagar') {
    // Exibir a lista de contas a pagar
    echo '<h1>Lista de Contas a Pagar</h1>';
    // ... Código HTML para exibir a lista ...
} elseif ($_SERVER['REQUEST_URI'] === '/contas_pagar/adicionar') {
    // Exibir o formulário de adição
    echo '<h1>Adicionar Conta a Pagar</h1>';
    // ... Código HTML para exibir o formulário de adição ...
} elseif ($_SERVER['REQUEST_URI'] === '/contas_pagar/editar') {
    // Exibir o formulário de edição
    echo '<h1>Editar Conta a Pagar</h1>';
    // ... Código HTML para exibir o formulário de edição ...
}

?>
</body>
</html>
