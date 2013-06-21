<?php
require_once 'controle/Fornecedores.php';
$fornecedores = new ControleFornecedores();
$fornecedor = $fornecedores->acaoFornecedor(@$_REQUEST['acao']);
?>
<br>
<form class="form-inline">
    <input type="hidden" name="url" value="receitas\receitas">
    <div class="control-group span3">
        <div class="btn-group">
            <a class="btn btn-primary btn-small" href="index.php?url=fornecedores/novo" title="Cadastrar Novos Fornecedores">
                <i class="icon-white icon-plus"></i>
                <strong>Incluir</strong>
            </a>
        </div>
    </div>
</form>
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
        <th>Opções</th>
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
            <td>
                <div class="btn-group">
                    <a class="btn" href='index.php?url=fornecedores/editar&acao=editar&id=<?php echo $lista->getId() ?>'><i class="icon-edit"></i></a>
                    <a class="btn btn-danger" href='index.php?url=fornecedores/fornecedores&acao=excluir&id=<?php echo $lista->getId() ?>'><i class="icon-trash icon-white"></i></a>
                </div>
            </td>
        </tr>
    <?php endforeach; ?>
</table>
