<?php

// Definição de rotas usando um array associativo
$routes = array(
    '/' => 'HomeController@index', // Rota padrão (página inicial)
    '/about' => 'AboutController@index', // Rota para a página "Sobre nós"
    '/contact' => 'ContactController@index', // Rota para a página de contato
);

// Lógica para mapear a URL da solicitação atual para um controlador e ação correspondentes
$request_uri = $_SERVER['REQUEST_URI'];

if (array_key_exists($request_uri, $routes)) {
    $route = $routes[$request_uri];
    list($controller, $action) = explode('@', $route);
    // Aqui, você pode chamar o controlador e a ação apropriados
    // para lidar com a solicitação.
} else {
    // Rota não encontrada
    http_response_code(404);
    echo 'Página não encontrada';
}
