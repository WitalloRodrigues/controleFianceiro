<?php

// Inclua o arquivo de configuração para obter configurações, como as configurações de banco de dados
require_once('config/database.php');

// Inclua o arquivo de rotas para definir as rotas da aplicação
require_once('config/routes.php');

// Recupere a URL da requisição
$url = $_SERVER['REQUEST_URI'];

// Defina rotas e ações com base na URL
switch ($url) {
    case '/':
        // Rota para a página inicial
        $controller = new HomeController();
        $controller->index();
        break;
    case '/contas_pagar':
        // Rota para gerenciar contas a pagar
        $controller = new ContaPagarController();
        $controller->listarContas();
        break;
    case '/contas_pagar/adicionar':
        // Rota para adicionar uma nova conta a pagar
        $controller = new ContaPagarController();
        $controller->exibirFormularioAdicao();
        break;
    case '/contas_pagar/editar':
        // Rota para editar uma conta a pagar
        // Pode incluir lógica para extrair o ID da conta da URL e chamar o método apropriado no controlador
        break;
    case '/contas_pagar/excluir':
        // Rota para excluir uma conta a pagar
        // Pode incluir lógica para extrair o ID da conta da URL e chamar o método apropriado no controlador
        break;
    default:
        // Rota para lidar com URLs desconhecidas (página de erro 404, por exemplo)
        break;
}
