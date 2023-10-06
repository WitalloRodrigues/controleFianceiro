<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Adicionar Conta a Pagar</title>
    <link rel="stylesheet" href="public/css/style.css">
</head>
<body>
    <h1>Adicionar Conta a Pagar</h1>

    <form action="" method="post">
        <label for="empresa">Empresa:</label>
        <select name="id_empresa" id="empresa" required>
            <!-- Opções de empresas obtidas do banco de dados ou de um array -->
            <?php foreach($empresas as $item){?>
                <option value="<?php echo $item['id_empresa'];?>"><?php echo $item['nome'];?></option>
            <?php }?>
            <!-- ... -->
        </select>
        <br>
        
        <label for="data_pagar">Data de Pagamento:</label>
        <input type="date" name="data_pagar" id="data_pagar" required>
        <br>

        <label for="valor">Valor:</label>
        <input type="text" name="valor" id="valor" value='R$ 0,00' required>
        <br>

        <input type="submit" value="Adicionar">
    </form>
</body>
</html>
<script>
    // Script para adicionar interatividade

// Exemplo de código para confirmar a exclusão de uma conta a pagar
function confirmarExclusao() {
    return confirm("Tem certeza de que deseja excluir esta conta a pagar?");
}

// Evento para formatar campos de valor monetário
document.addEventListener("input", function(e) {
    if (e.target && e.target.matches("input[type='text']")) {
        e.target.value = formatarValor(e.target.value);
    }
});

// Função para formatar um valor monetário
function formatarValor(valor) {
    valor = valor.replace(/\D/g, "");
    valor = (valor / 100).toFixed(2);
    return "R$ " + valor.replace(".", ",");
}

// Adicione aqui outros scripts interativos conforme necessário

</script>
