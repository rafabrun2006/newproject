<?php
require_once 'controle/Despesas.php';
$despesa = new ControleDespesas();
$despesa->acaoDespesas(@$_REQUEST['acao']);
?>
<legend>Despesas</legend>
<table class="table table-striped">
    <tr>
        <th>Codigo</th>
        <th>Nome</th>
        <th>Data</th>
        <th>Fornecedor</th>
        <th>Valor</th>
        <th>Opções</th>
    </tr>
    <?php foreach ($despesa->despesas as $lista): ?>
        <tr>
            <td width="20"><?php echo $lista->getId() ?></td>
            <td><?php echo $lista->getDescricao() ?></td>
            <td><?php echo $lista->getData_despesa() ?></td>
            <td><a href="index.php?url=fornecedores/fornecedores"><?php echo $lista->getFornecedor_id() ?></a></td>
            <td><?php echo number_format($lista->getValor(), 2, ',', '.') ?></td>
            <td width="80">
                <div class="btn-group">
                    <a class="btn btn-small" href='index.php?url=despesas/editar&acao=editar&id=<?php echo $lista->getId() ?>'><i class="icon-edit"></i></a>
                    <a class="btn btn-danger btn-small" href='index.php?url=despesas/despesas&acao=excluir&id=<?php echo $lista->getId() ?>'><i class="icon-trash icon-white"></i></a>
                </div>
            </td>
        </tr>
    <?php endforeach; ?>
</table>
