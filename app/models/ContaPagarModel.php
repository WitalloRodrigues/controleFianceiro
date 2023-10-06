<?php

require_once('../config/database.php');

class ContaPagarModel {

    private $conexao;

    public function __construct() {
        
        $conexao = new database();
        $this->conexao = $conexao->getConection();

    }


    public function listarContasPagar() {
        // Consulta SQL para selecionar todas as contas a pagar

        $wheresql = '';

        if(isset($_GET['id_empresa']) && @$_GET['id_empresa'] > 0){
            $wheresql .= ' and e.id_empresa ='.$_GET['id_empresa'];
        }
        if(isset($_GET['valor'])){
            $valor = str_replace(',','.',str_replace('R$','',$_GET['valor']));
            $wheresql .= ' and cp.valor '. $_GET['condicoes'].' '. $valor;
        }

        if(isset($_GET['data_pagamento'])){
            $wheresql .= " and data_pagar = '". $_GET['data_pagamento']."'";
        }
        // else{
        //     $wheresql .= " and data_pagar = '". date('Y-m-d')."'"; 
        // }
        
        
        $sql = "SELECT e.nome,cp.* FROM tbl_conta_pagar cp  JOIN tbl_empresa e ON cp.id_empresa = e.id_empresa WHERE cp.ativo = '1' $wheresql ";
        
        

        // Executa a consulta
        $resultado = mysqli_query($this->conexao, $sql);

        // Verifica se a consulta foi bem-sucedida
        if (!$resultado) {
            // Tratar erros de consulta, lançar exceções, etc.
            return [];
        }

        // Inicializa um array para armazenar as contas a pagar
        $contasPagar = [];

        // Transforma os resultados em um array associativo
        while ($row = mysqli_fetch_assoc($resultado)) {
            $contasPagar[] = $row;
        }

        // Retorna o array de contas a pagar
        return $contasPagar;
    }

    // Método para buscar todas as contas a pagar
    public static function buscarTodasContas() {
        // Coloque aqui a lógica para buscar todas as contas a pagar no banco de dados
        
        // Retorne um array de contas a pagar ou uma lista vazia se não houver contas
    }

    // Método para buscar uma conta a pagar pelo ID
    public function buscarContaPorID($id) {

        // Consulta SQL para selecionar todas as contas a pagar
        $sql = "SELECT * FROM tbl_conta_pagar WHERE id_conta_pagar = $id";

        

        // Executa a consulta
        $resultado = mysqli_query($this->conexao, $sql);

        // Verifica se a consulta foi bem-sucedida
        if (!$resultado) {
            // Tratar erros de consulta, lançar exceções, etc.
            return [];
        }

        // Inicializa um array para armazenar as contas a pagar
        $contasPagar = [];

        // Transforma os resultados em um array associativo
        while ($row = mysqli_fetch_assoc($resultado)) {
            $contasPagar[] = $row;
        }

        // Retorna o array de contas a pagar
        return $contasPagar;

        // Retorne os dados da conta a pagar ou null se a conta não for encontrada
    }

    // Método para adicionar uma nova conta a pagar
    public static function adicionarConta() {
        // Coloque aqui a lógica para adicionar uma nova conta a pagar ao banco de dados
        $data_pagar = $_POST['data_pagar'];
        $valor = str_replace(',','.',str_replace('R$','',$_POST['valor']));
        $id_empresa = $_POST['id_empresa'];

        // Atualize os dados na tabela tbl_conta_pagar
        $sql = "INSERT INTO tbl_conta_pagar (data_pagar, valor, id_empresa ) VALUES ('$data_pagar','$valor','$id_empresa')";
        

        

        $host = "localhost"; // Host do banco de dados
        $usuario = "root"; // Nome de usuário
        $senha = ""; // Senha
        $banco = "controle_financeiro"; // Nome do banco de dados

        // Cria uma conexão com o banco de dados
        $mysqli = new mysqli($host, $usuario, $senha, $banco);
        $mysqli->query($sql);
        // Retorne true se a adição for bem-sucedida ou false se houver um erro
    }

    // Método para atualizar os dados de uma conta a pagar
    public static function atualizarConta($id) {
        // Coloque aqui a lógica para atualizar os dados de uma conta a pagar no banco de dados
        $data_pagar = $_POST['data_pagar'];
        $valor = str_replace(',','.',str_replace('R$','',$_POST['valor']));
        $id_empresa = $_POST['id_empresa'];

        // Atualize os dados na tabela tbl_conta_pagar
        $sql = "UPDATE tbl_conta_pagar SET data_pagar = '$data_pagar', valor = '$valor', id_empresa = '$id_empresa' WHERE id_conta_pagar = $id";
        // print_r($sql);
        // die;
        $host = "localhost"; // Host do banco de dados
        $usuario = "root"; // Nome de usuário
        $senha = ""; // Senha
        $banco = "controle_financeiro"; // Nome do banco de dados

        // Cria uma conexão com o banco de dados
        $mysqli = new mysqli($host, $usuario, $senha, $banco);
        $mysqli->query($sql);
        
        // Retorne true se a atualização for bem-sucedida ou false se houver um erro
    }

    // Método para excluir uma conta a pagar pelo ID
    public static function excluirConta($id) {
        // Coloque aqui a lógica para excluir uma conta a pagar pelo ID no banco de dados
        $sql = "UPDATE tbl_conta_pagar SET ativo = '0' WHERE id_conta_pagar = $id";

        $host = "localhost"; // Host do banco de dados
        $usuario = "root"; // Nome de usuário
        $senha = ""; // Senha
        $banco = "controle_financeiro"; // Nome do banco de dados

        // Cria uma conexão com o banco de dados
        $mysqli = new mysqli($host, $usuario, $senha, $banco);
        $mysqli->query($sql);
        // Retorne true se a exclusão for bem-sucedida ou false se houver um erro
    }


    public static function pagamento($id) {
        // Coloque aqui a lógica para excluir uma conta a pagar pelo ID no banco de dados
        $sql = "UPDATE tbl_conta_pagar SET pago = '1' WHERE id_conta_pagar = $id";

        $host = "localhost"; // Host do banco de dados
        $usuario = "root"; // Nome de usuário
        $senha = ""; // Senha
        $banco = "controle_financeiro"; // Nome do banco de dados

        // Cria uma conexão com o banco de dados
        $mysqli = new mysqli($host, $usuario, $senha, $banco);
        $mysqli->query($sql);
        // Retorne true se a exclusão for bem-sucedida ou false se houver um erro
    }

    public static function removePagamento($id) {
        // Coloque aqui a lógica para excluir uma conta a pagar pelo ID no banco de dados
        $sql = "UPDATE tbl_conta_pagar SET pago = '0' WHERE id_conta_pagar = $id";

        $host = "localhost"; // Host do banco de dados
        $usuario = "root"; // Nome de usuário
        $senha = ""; // Senha
        $banco = "controle_financeiro"; // Nome do banco de dados

        // Cria uma conexão com o banco de dados
        $mysqli = new mysqli($host, $usuario, $senha, $banco);
        $mysqli->query($sql);
        // Retorne true se a exclusão for bem-sucedida ou false se houver um erro
    }

    public function listarEmpresas() {
        // Consulta SQL para selecionar todas as contas a pagar
        $sql = "SELECT * FROM tbl_empresa" ;

        

        // Executa a consulta
        $resultado = mysqli_query($this->conexao, $sql);

        // Verifica se a consulta foi bem-sucedida
        if (!$resultado) {
            // Tratar erros de consulta, lançar exceções, etc.
            return [];
        }

        // Inicializa um array para armazenar as contas a pagar
        $empresas = [];

        // Transforma os resultados em um array associativo
        while ($row = mysqli_fetch_assoc($resultado)) {
            $empresas[] = $row;
        }

        // Retorna o array de contas a pagar
        return $empresas;
    }

    // Outros métodos do modelo, se necessário

}
