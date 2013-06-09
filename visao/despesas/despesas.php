<?php
require_once 'controle/Despesas.php';
$despesa = new ControleDespesas();
$despesa->acaoDespesas(@$_REQUEST['acao']);
?>
<div class="submenu">
    <a href="index.php?url=despesas/nova"><font color="chocolate"><img src="visao/img/mais_verd.png">Incluir Novas Despesas</font></a>
</div>
<table class="table table-striped">
    <tr>
        <th>Codigo</th>
        <th>Nome</th>
        <th>Data</th>
        <th>Fornecedor</th>
        <th>Valor</th>
        <th>Editar</th>
        <th>Excluir</th>
    </tr>
    <?php foreach ($despesa->despesas as $lista): ?>
        <tr>
            <td width="20"><?php echo $lista->getId() ?></td>
            <td><?php echo $lista->getDescricao() ?></td>
            <td><?php echo $lista->getData_despesa() ?></td>
            <td><a href="index.php?url=fornecedores/fornecedores"><?php echo $lista->getFornecedor_id() ?></a></td>
            <td><?php echo $lista->getValor() ?></td>
            <td width="10"><a class="icon-edit" href='index.php?url=despesas/editar&acao=editar&id=<?php echo $lista->getId() ?>'></a></td>
            <td width="10"><a class="icon-trash" href='index.php?url=despesas/despesas&acao=excluir&id=<?php echo $lista->getId() ?>'></a></td>
        </tr>
    <?php endforeach; ?>
</table>
