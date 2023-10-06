<!DOCTYPE html>
<html>
<head>
    <title>Lista de Contas a Pagar</title>
    
</head>
<body>

    <a href="adicionar">Adicionar conta</a>
    <h1>Lista de Contas a Pagar</h1>
    <form action="" method="GET">
        <table >
            <tr>
                <td style='border:none'>Empresa</td><td style='border:none'>Valor da Parcela - Condições</td><td style='border:none'>Data Pagamento</td>
            </tr>
            <tr >
                <td style='border:none'>
                    <select name="id_empresa" id="empresa" >
                        <!-- Opções de empresas obtidas do banco de dados ou de um array -->
                        <option value="0">Todas</option>
                        <?php foreach($empresas as $item){?>
                            <option value="<?php echo $item['id_empresa'];?>"><?php echo $item['nome'];?></option>
                        <?php }?>
                        <!-- ... -->
                    </select>
                </td>
                <td style="    display: flex;    gap: 3px; border:none">
                    <input type="text" name="valor" id="valor" value="<?php echo (isset($_GET['valor']))?$_GET['valor']:'R$ 0,00'?>" >
                    <select name="condicoes" id="condicoes" style="    width: 20%;">
                        <option value=">" <?php echo (@$_GET['condicoes'] == '>')?'selected':''?>>(>) maior</option>
                        <option value="=" <?php echo (@$_GET['condicoes'] == '=')?'selected':''?>>(=) igual</option>
                        <option value="<" <?php echo (@$_GET['condicoes'] == '<')?'selected':''?>>(<) menor</option>
                    </select>
                </td>
                <td style='border:none'>
                    <input type="date" name="data_pagamento" id="data_pagamento" value="">
                     <!-- echo date('Y-m-d')?> -->
                </td>
            </tr>
        </table>
        <br>
        <button>pesquisar</button>
    </form>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Empresa</th>
                <th>Valor Bruto</th>
                <th>Valor Apagar</th>
                <th>Data de Pagamento</th>
                <th>Pago</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($contasPagar as $conta): ?>
                <?php 
                //regra de negocio

                $valor_bruto = $conta['valor'];   
                $data_vencimento = $conta['data_pagar']; 
                $valor_5 = $valor_bruto * 0.5;
                $valor_a_pagar = $valor_bruto;
                $bg = '#f2fd0026;;';
                if($data_vencimento > date('Y-m-d')){
                    $bg = '#00d8fd26;';
                    $valor_a_pagar = $valor_bruto - $valor_5; //desconto de 5%
                }else if($data_vencimento < date('Y-m-d')){
                    $bg = '#fd000026';
                    $valor_a_pagar = $valor_bruto + $valor_5; //acrecimo de 5% (parcela em atraso)
                }//se for igual nada acontece

                if( $conta['pago']){
                    $bg = '#00fd7a26';
                }

                
                ?>
                <tr style='background: <?php echo $bg;?>;'>
                    <td><?php echo $conta['id_conta_pagar']; ?></td>
                    <td><?php echo $conta['nome']; ?></td>
                    <td>R$ <?php echo number_format($valor_bruto, 2, ',', '.'); ?></td>
                    <td>R$ <?php echo number_format($valor_a_pagar, 2, ',', '.'); ?></td>
                    <td><?php echo date("d/m/Y", strtotime($data_vencimento)); ?></td>
                    <td><?php echo $conta['pago'] ? 'Sim' : 'Não'; ?></td>
                    <td style="    display: flex;    justify-content: space-evenly;">
                        <a href="editar/<?php echo $conta['id_conta_pagar']; ?>">Editar</a>
                        <a href="excluir/<?php echo $conta['id_conta_pagar']; ?>">Excluir</a>
                        <?php if(!$conta['pago']){?>
                            <a href="pagamento/<?php echo $conta['id_conta_pagar']; ?>">Marcar como Pago</a>
                        <?php }else{?>
                            <a href="removePagamento/<?php echo $conta['id_conta_pagar']; ?>">Remover Pagamento</a>
                        <?php }?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
