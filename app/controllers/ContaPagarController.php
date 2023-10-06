<?php

// Inclua o arquivo do modelo
require_once('../Models/ContaPagarModel.php');

class ContaPagarController {

    // Método para exibir a lista de contas a pagar
    public function index() {
        // Coloque aqui a lógica para buscar a lista de contas a pagar do modelo

        $contaPagarModel = new ContaPagarModel();
        $empresas = $contaPagarModel->listarEmpresas();
        // Chame um método do modelo para obter dados das contas a pagar
        $contasPagar = $contaPagarModel->listarContasPagar();

        // Inclua a view de listagem de contas a pagar
        include('../views/contas/list.php');
    }

    

    // Método para exibir a lista de contas a pagar
    public function listarContas() {
        // Coloque aqui a lógica para buscar a lista de contas a pagar do modelo

        // Inclua a view de listagem de contas a pagar
        include('app/views/contas/list.php');
    }

    // Método para exibir o formulário de adição de conta a pagar
    public function exibirFormularioAdicao() {
        // Inclua a view do formulário de adição de conta a pagar
        include('app/views/contas/add.php');
    }

    // Método para processar a adição de uma conta a pagar
    public function adicionarConta() {
        // Coloque aqui a lógica para adicionar uma conta a pagar no modelo
        $contaPagarModel = new ContaPagarModel();
        $empresas = $contaPagarModel->listarEmpresas();
        // Redirecione de volta para a lista de contas a pagar após a adição
        include('../views/contas/add.php');
        exit;
    }

    // Método para processar a adição de uma conta a pagar
    public function gravar() {
        
        // Coloque aqui a lógica para adicionar uma conta a pagar no modelo
        $contaPagarModel = new ContaPagarModel();
       

        // Chame um método do modelo para obter dados das contas a pagar
        $contasPagar = $contaPagarModel->adicionarConta();
        // Redirecione de volta para a lista de contas a pagar após a adição
        header('Location: ../financeiro/lista');
        exit;
    }

    // Método para exibir o formulário de edição de conta a pagar
    public function exibirFormularioEdicao($id) {
        // Coloque aqui a lógica para buscar os dados da conta a pagar pelo ID
        $contaPagarModel = new ContaPagarModel();

        // Chame um método do modelo para obter dados das contas a pagar
        $conta = $contaPagarModel->buscarContaPorID($id);
        if(count($conta)> 0){
            $conta = $conta[0];
        }
        $empresas = $contaPagarModel->listarEmpresas();
        
        // Inclua a view do formulário de edição de conta a pagar
        include('../views/contas/edit.php');
    }

    // Método para processar a edição de uma conta a pagar
    public function editarConta($id) {

        
        // Coloque aqui a lógica para atualizar os dados da conta a pagar no modelo
        $contaPagarModel = new ContaPagarModel();
        

        // Chame um método do modelo para obter dados das contas a pagar
        $contasPagar = $contaPagarModel->atualizarConta($id);
        // Redirecione de volta para a lista de contas a pagar após a edição
        header('Location: ../lista');
        exit;
    }

    // Método para processar a exclusão de uma conta a pagar
    public function excluirConta($id) {
        // Coloque aqui a lógica para excluir uma conta a pagar do modelo
        $contaPagarModel = new ContaPagarModel();
       

        // Chame um método do modelo para obter dados das contas a pagar
        $contasPagar = $contaPagarModel->excluirConta($id);
        // Redirecione de volta para a lista de contas a pagar após a exclusão
        header('Location: ../lista');
        exit;
    }

    public function pagamento($id) {
        // Coloque aqui a lógica para excluir uma conta a pagar do modelo
        $contaPagarModel = new ContaPagarModel();
       

        // Chame um método do modelo para obter dados das contas a pagar
        $contasPagar = $contaPagarModel->pagamento($id);
        // Redirecione de volta para a lista de contas a pagar após a exclusão
        header('Location: ../lista');
        exit;
    }

    public function removePagamento($id) {
        // Coloque aqui a lógica para excluir uma conta a pagar do modelo
        $contaPagarModel = new ContaPagarModel();
       

        // Chame um método do modelo para obter dados das contas a pagar
        $contasPagar = $contaPagarModel->removePagamento($id);
        // Redirecione de volta para a lista de contas a pagar após a exclusão
        header('Location: ../lista');
        exit;
    }

    public function add() {
        // Coloque aqui a lógica para a página add.php
        include 'views/add.php';
    }
    
    

    // Outros métodos do controlador, se necessário

}
