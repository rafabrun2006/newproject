<div class="submenu">
    <a href="index.php?url=despesas/novasdespesas"><font color="chocolate"><img src="visao/img/mais_verd.png">Incluir Novas Despesas</font></a>
</div>
<?php
require_once 'controle/Despesas.php';
$receitas = new ControleDespesas();
$receitas->acaoDespesas($_REQUEST['acao']);
?>
<table class="tabela">
    <tr>
        <th>Codigo</th>
        <th>Nome</th>
        <th>Data</th>
        <th>Fornecedor</th>
        <th>Valor</th>
        <th>Editar</th>
        <th>Excluir</th>
    </tr>
    <?php
    for ($i = 0; $i < count($receitas->despesas); $i++) {
        if($i % 2 == 0){
            $bg = 'white';
        }else{
            $bg = 'LightGray';
        }
        $lista = $receitas->despesas[$i];
        ?>
        <tr bgcolor='<?php echo $bg ?>'>
            <td width="5" id="centro"><?php echo $lista->cod ?></td>
            <td><?php echo $lista->nome ?></td>
            <td width="15"><?php echo $lista->data ?></td>
            <td width="15" id="centro"><a href="index.php?url=fornecedores/fornecedores"><?php echo $lista->fornecedor ?></a></td>
            <td width="15"><?php echo $lista->valor ?></td>
            <td width="10" id="centro"><a id="editar" href="index.php?url=despesas/novasdespesas&acao=editar&cod=<?php echo $lista->cod ?>&nome=<?php echo $lista->nome ?>&data<?php echo $lista->data ?>&valor=<?php echo $lista->valor ?>"><img src="visao/img/editar.png"></a></td>
            <td width="10" id="centro"><a id="excluir" href="index.php?url=despesas/despesas&acao=excluir&cod[]=<?php echo $lista->cod ?>"><img src="visao/img/lixeira.png"></a></td>
        </tr>
        <?php
    }
    ?>
</table>
