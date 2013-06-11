<?php
require_once '/controle/Fornecedores.php';
$fornecedor = new ControleFornecedores();
$fornecedor->acaoFornecedor(@$_REQUEST['acao']);
?>
<form class="form-horizontal" method="post">
    <fieldset>
        <legend>Cadastro de Fornecedores</legend>
    </fieldset>
    <div class="control-group">
        <label class="control-label" for="nome">Nome do Fornecedor:</label>
        <div class="controls">
            <input id="nome" type="text" name="nome" placeholder="Ex: Brasil Alimentos">
        </div>
    </div>
    <div class="control-group">
        <label class="control-label">Descri&ccedil;&atilde;o:</label>
        <div class="controls">
            <input type="text" name="descricao" size="50" placeholder="Ex: Venda de Alimentos">
        </div>
    </div>
    <div class="control-group">
        <label class="control-label">Data do Cadastro:</label>
        <div class="controls">
            <input type="text" class="date-utils" name="data_cadastro" value="<?php echo date('d/m/Y') ?>">
        </div>
    </div>
    <div class="control-group">
        <label class="control-label">CNPJ:</label>
        <div class="controls">
            <input type="text" id="cnpj" name="cnpj" placeholder="Ex: 99999999999">
        </div>
    </div>
    <div class="control-group">
        <label class="control-label">Telefone:</label>
        <div class="controls">
            <input type="text" id="fone" name="telefone" placeholder="Ex: 99999999">
        </div>
    </div>
    <div class="control-group">
        <label class="control-label">E-mail:</label>
        <div class="controls">
            <input type="text" name="email" size="30" placeholder="Ex: braali@email.com"> 
        </div>
    </div>
    <div class="control-group">
        <label class="control-label">Endereco:</label>
        <div class="controls">
            <input type="text" name="endereco" placeholder="Quadra 10 lote 5">
        </div>
    </div>
    <div class="control-group">
        <label class="control-label">Cidade:</label>
        <div class="controls">
            <input type="text" name="cidade" placeholder="Gama">
        </div>
    </div>
    <div class="form-actions">
        <input type="hidden" name="acao" value="gravar">
        <input type="hidden" name="url" value="fornecedores/novo">

        <button class="btn btn-primary" type="submit">Gravar</button>
        <button class="btn" type="reset">Limpar Formulario</button>
    </div>
</form>