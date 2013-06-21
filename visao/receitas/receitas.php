<?php
require_once 'controle/Receitas.php';
$receitas = new ControleReceitas();
$receitas->acaoReceitas(@$_REQUEST['acao']);
?>
<br>
<form method="post">
    <div class="control-group span3">
        <div class="btn-group">
            <a class="btn btn-primary btn-small" href="index.php?url=receitas/nova" title="Incluir Novas Receitas">
                <i class="icon-white icon-plus"></i>
                <strong>Incluir</strong>
            </a>
        </div>
    </div>
</form>
<table class="table table-striped">
    <tr>
        <th>Codigo</th>
        <th>Nome</th>
        <th>Data</th>
        <th>Valor</th>
        <th>Opções</th>
    </tr>
    <?php
    foreach ($receitas->receitas ? : array() as $lista) {
        ?>
        <tr>
            <td width="10" id="centro"><?php echo $lista->getId() ?></td>
            <td><?php echo $lista->getDescricao() ?></td>
            <td><?php echo $lista->getData() ?></td>
            <td><?php echo number_format($lista->getValor(), 2, ',', '.') ?></td>
            <td width="80">
                <div class="btn-group">
                    <a class="btn btn-small" href="index.php?url=receitas/editar&acao=editar&&id=<?php echo $lista->getId() ?>"><i class="icon-edit"></i></a>
                    <a class="btn btn-danger btn-small" href="index.php?url=receitas/receitas&acao=excluir&id=<?php echo $lista->getId() ?>"><i class="icon-trash icon-white"></i></a>
                </div>
            </td>
        </tr>
        <?php
    }
    ?>
</table>
