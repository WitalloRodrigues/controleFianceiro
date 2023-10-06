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
