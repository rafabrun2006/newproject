<?php
require_once '/controle/Relatorios.php';
$relatorios = new ControleRelatorios();
?>
<fieldset>
    <legend>Relatório de Despesas</legend>
    <table class="table table-bordered table-striped">
        <thead>
        <th colspan="5">Dados Despesa</th>
        <th>Dados Fornecedor</th>
        </thead>
        <thead>
        <th>Id</th>
        <th>Descrição</th>
        <th>Valor</th>
        <th>Data</th>
        <th>Data Pagamento</th>
        <th>Nome</th>
        <th>CNPJ</th>
        <th>Endereço</th>
        <th>Cidade</th>
        </thead>
        <tbody>
            <?php foreach ($relatorios->relatorioDespesa() as $despesa): ?>
                <tr>
                    <td><?php echo $despesa->id ?></td>
                    <td><?php echo $despesa->descricao ?></td>
                    <td><?php echo number_format($despesa->valor, 2, ',', '.') ?></td>
                    <td><?php echo $despesa->data_despesa ?></td>
                    <td><?php echo $despesa->data_pagamento ?></td>
                    <td><?php echo $despesa->nome ?></td>
                    <td><?php echo $despesa->cnpj ?></td>
                    <td><?php echo $despesa->endereco ?></td>
                    <td><?php echo $despesa->cidade ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</fieldset>