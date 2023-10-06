<style>
    <?php require_once(__DIR__ . '/../public/css/style.css'); ?>
</style>
<?php

// Inclua o arquivo de inicialização da aplicação (normalmente contém configurações e autoloading de classes)
require_once(__DIR__ . '/../config/bootstrap.php');

// Roteador (ou controlador frontal) que direciona a requisição para o controlador apropriado
$router = new Router();
$router->get('/financeiro/', 'ContaPagarController@index');
$router->get('/financeiro/lista', 'ContaPagarController@index');
$router->get('/financeiro/adicionar', 'ContaPagarController@adicionarConta');
$router->post('/financeiro/adicionar', 'ContaPagarController@gravar');
$router->get('/financeiro/editar/(\d+)', 'ContaPagarController@exibirFormularioEdicao');
$router->post('/financeiro/editar/(\d+)', 'ContaPagarController@editarConta');
$router->get('/financeiro/excluir/(\d+)', 'ContaPagarController@excluirConta');
$router->get('/financeiro/pagamento/(\d+)', 'ContaPagarController@pagamento');
$router->get('/financeiro/removePagamento/(\d+)', 'ContaPagarController@removePagamento');
$router->dispatch();

?>
<script>
    <?php require_once(__DIR__ . '/../public/js/script.js'); ?>
</script>
