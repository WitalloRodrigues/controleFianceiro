<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Editar Conta a Pagar</title>
    <link rel="stylesheet" href="public/css/style.css">
</head>
<body>
    <h1>Editar Conta a Pagar</h1>

    <form action="" method="post">
        <label for="empresa">Empresa:</label>
        <select name="id_empresa" id="empresa" required>
            <!-- Opções de empresas obtidas do banco de dados ou de um array -->
            <?php foreach($empresas as $item){?>
                <option value="<?php echo $item['id_empresa'];?>" <?= @$conta['id_empresa'] == $item['id_empresa'] ? 'selected' : '' ?>><?php echo $item['nome'];?></option>
            <?php }?>
        </select>
        <br>
        
        <label for="data_pagar">Data de Pagamento:</label>
        <input type="date" name="data_pagar" id="data_pagar" value="<?= @$conta['data_pagar'] ?>" required>
        <br>

        <label for="valor">Valor:</label>
        <input type="text" name="valor" id="valor" value="<?='R$ '. @number_format($conta['valor'], 2, ',', '.') ?>" required>
        <br>

        <input type="submit" value="Salvar">
    </form>
</body>
</html>
