<?php
require_once 'controle/Fornecedores.php';
$fornecedores = new ControleFornecedores();
$fornecedor = $fornecedores->acaoFornecedor(@$_REQUEST['acao']);
?>
<div class="submenu">
    <a href="index.php?url=fornecedores/novo"><img src="visao/img/mais_verd.png">Cadastrar Novos Fornecedores</a>
</div>
<table class="table table-striped">
    <tr>
        <th>Cod</th>
        <th>Nome</th>
        <th>Descricao</th>
        <th>Data Cadastro</th>
        <th>CNPJ</th>
        <th>Telefone</th>
        <th>Email</th>
        <th>Cidade</th>
        <th>Endereço</th>
        <th>Editar</th>
        <th>Excluir</th>
    </tr>
    <?php foreach ($fornecedor as $lista): ?>
        <tr>
            <td><?php echo $lista->getId() ?></td>
            <td><?php echo $lista->getNome() ?></td>
            <td><?php echo $lista->getDescricao() ?></td>
            <td><?php echo $lista->getData_cadastro() ?></td>
            <td><?php echo $lista->getCnpj() ?></td>
            <td><?php echo $lista->getTelefone() ?></td>
            <td><?php echo $lista->getEmail() ?></td>
            <td><?php echo $lista->getCidade() ?></td>
            <td><?php echo $lista->getEndereco() ?></td>
            <td><a class="icon-edit" href='index.php?url=fornecedores/editar&acao=editar&id=<?php echo $lista->getId() ?>'></a></td>
            <td><a class="icon-trash" href='index.php?url=fornecedores/fornecedores&acao=excluir&id=<?php echo $lista->getId() ?>'></a></td>
        </tr>
    <?php endforeach; ?>
</table>
