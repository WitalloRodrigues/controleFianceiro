<?php

class database{
    
    public function getConection(){
        // Configurações de conexão
        $host = "localhost"; // Host do banco de dados
        $usuario = "root"; // Nome de usuário
        $senha = ""; // Senha
        $banco = "controle_financeiro"; // Nome do banco de dados

        // Cria uma conexão com o banco de dados
        $mysqli = new mysqli($host, $usuario, $senha, $banco);



        // Verifica se houve algum erro na conexão
        if ($mysqli->connect_error) {
            die("Erro de conexão: " . $mysqli->connect_error);
        }

        return $mysqli;
    }


}
