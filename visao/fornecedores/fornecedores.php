<?php
require_once 'controle/Fornecedores.php';
$controle = new ControleFornecedores();
?>
<div class="submenu">
    <a href="index.php?url=fornecedores/novosfornecedores"><img src="visao/img/mais_verd.png">Cadastrar Novos Fornecedores</a>
</div>
<table class="tabela">
    <tr>
        <th>Cod</th>
        <th>Nome</th>
        <th>Descricao</th>
        <th>Data Cadastro</th>
        <th>CNPJ</th>
        <th>Telefone</th>
        <th>Email</th>
        <th>UF</th>
        <th>Editar</th>
        <th>Excluir</th>
    </tr>
    <?php
    for ($i = 0; $i < count($controle->fornecedores); $i++) {
        $lista = $controle->fornecedores[$i];
        if ($i % 2 == 0) {
            $bg = 'white';
        } else {
            $bg = 'LightGray';
        }
        ?>
        <tr bgcolor='<?php echo $bg ?>'>
            <td id='centro'><?php echo $lista->cod ?></td>
            <td><?php echo $lista->nome ?></td>
            <td><?php echo $lista->descricao ?></td>
            <td><?php echo $lista->data_cadastro ?></td>
            <td><?php echo $lista->cnpj ?></td>
            <td><?php echo $lista->telefone ?></td>
            <td><?php echo $lista->email ?></td>
            <td><?php echo $lista->uf ?></td>
            <td id='centro'><a href='index.php?url=fornecedores/novosfornecedores&acao=editar&<?php echo "cod=$lista->cod&nome=$lista->nome&descricao=$lista->descricao&data_cadastro=$lista->data_cadastro&cnpj=$lista->cnpj&telefone=$lista->telefone&email=$lista->email&uf=$lista->uf" ?>'><img src='visao/img/editar.png'></a></td>
            <td id='centro'><a href='index.php?url=fornecedores/fornecedores&acao=excluir&<?php echo "cod=$lista->cod" ?>'><img src='visao/img/lixeira.png'></a></td>
        </tr>
        <?php
    }
    ?>
</table>
