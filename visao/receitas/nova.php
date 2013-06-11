<?php
require_once 'controle/Receitas.php';
$receitas = new ControleReceitas();
$receitas->acaoReceitas(@$_REQUEST['acao']);
?>
<fieldset>
    <legend>
        Incluir Nova Receita
    </legend>
    <form class="form-horizontal" action="index.php" method="post">
        <div class="control-group">
            <label class="control-label">Receitas Referente a:</label>
            <div class="controls">
                <input type="text" name="descricao" size="50">
            </div>
        </div>
        <div class="control-group">
            <label class="control-label">Valor da Receitas:</label> 
            <div class="controls">
                <input type="text" id="moeda" name="valor" size="10">
            </div>
        </div>
        <div class="control-group">
            <label class="control-label">Data da Receitas:</label> 
            <div class="controls">
                <input type="text" class="date-utils" name="data" size="8" value="<?php echo date('d/m/Y') ?>">
            </div>
        </div>
        <div class="form-actions">
            <button class="btn btn-primary" type="submit" name="bt_enviar">Salvar</button>
            <button class="btn" type="reset">Limpar</button>
        </div>
        <input type="hidden" name="usuario_id" value="<?php echo ControleAcesso::getUsuario()->id ?>">
        <input type="hidden" name="url" value="receitas/nova">
        <input type="hidden" name="acao" value="gravar">
        <input type="hidden" name="tipo_lancamento_id" value="1">
    </form>
</fieldset>