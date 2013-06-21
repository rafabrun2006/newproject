<?php
require_once 'controle/Despesas.php';
$despesa = new ControleDespesas();
$despesa->acaoDespesas(@$_REQUEST['acao']);
?>

<form class="form-horizontal" action="index.php" method="post">
    <fieldset>
        <legend>Incluir Despesa</legend>
    </fieldset>
    <div class="control-group">
        <label class="control-label">Despesa Referente a:</label>
        <div class="controls">
            <input type="text" name="descricao" size="50">
        </div>
    </div>
    <div class="control-group">
        <label class="control-label">Fornecedor:</label>
        <div class="controls">
            <select name="fornecedor_id">
                <option value="">Selecione</option>
                <?php foreach ($despesa->fornecedores() as $value): ?>
                    <option value="<?php echo $value->getId() ?>"><?php echo $value->getNome() ?></option>
                <?php endforeach; ?>
            </select>
        </div>
    </div>
    <div class="control-group">
        <label class="control-label">Valor da Despesa:</label>
        <div class="controls">
            <input type="text" id="moeda" name="valor" size="10">
        </div>
    </div>
    <div class="control-group">
        <label class="control-label">Data da Despesa:</label>
        <div class="controls">
            <input type="text" readonly="" name="data_despesa" class="date-utils" size="8">
        </div>
    </div>
    <div class="control-group">
        <label class="control-label">Data do Pagamento:</label>
        <div class="controls">
            <input type="text" readonly="" name="data_pagamento" class="date-utils" size="8">
        </div>
    </div>
    <div class="form-actions">
        <button class="btn btn-primary" type="submit">Gravar</button>
        <button class="btn" type="reset">Limpar Formulario</button>

        <input type="hidden" name="url" value="despesas/despesas">
        <input type="hidden" name="acao" value="gravar">
        <input type="hidden" name="usuario_id" value="<?php echo ControleAcesso::getUsuario()->id ?>">
        <input type="hidden" name="tipo_lancamento_id" value="2">
    </div>
</form>