<div class="submenu">
    <a href="index.php?url=receitas/nova"><font color="green"><img src="visao/img/mais_verd.png">Incluir Novas Receitas</font></a>
</div>
<?php
    require_once 'controle/Receitas.php';
    $receitas = new ControleReceitas();
    $receitas->acaoReceitas(@$_REQUEST['acao']);
?>
<table class="table table-striped">
    <tr>
        <th>Codigo</th>
        <th>Nome</th>
        <th>Data</th>
        <th>Valor</th>
        <th>Editar</th>
        <th>Excluir</th>
    </tr>
    <?php
    foreach ($receitas->receitas ? : array() as $lista) {
        ?>
        <tr>
            <td width="10" id="centro"><?php echo $lista->getId() ?></td>
            <td><?php echo $lista->getDescricao() ?></td>
            <td><?php echo $lista->getData() ?></td>
            <td><?php echo $lista->getValor() ?></td>
            <td width="10"><a class="icon-edit" href="index.php?url=receitas/editar&acao=editar&&id=<?php echo $lista->getId() ?>"></a></td>
            <td width="10"><a class="icon-trash" href="index.php?url=receitas/receitas&acao=excluir&id=<?php echo $lista->getId() ?>"></a></td>
        </tr>
        <?php
    }
    ?>
</table>
