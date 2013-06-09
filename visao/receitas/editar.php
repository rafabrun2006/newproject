<?php
require_once 'controle/Receitas.php';
$receitas = new ControleReceitas();
$receita = $receitas->acaoReceitas($_REQUEST['acao']);
?>
<fieldset>
    <legend>
        Incluir Nova Receita
    </legend>
    <form class="form-horizontal" action="index.php" method="post">
        <div class="control-group">
            <label class="control-label">Receitas Referente a:</label>
            <div class="controls">
                <input type="text" name="descricao" value="<?php echo $receita->getDescricao() ?>" size="50">
            </div>
        </div>
        <div class="control-group">
            <label class="control-label">Valor da Receitas:</label> 
            <div class="controls">
                <input type="text" name="valor" value="<?php echo $receita->getValor() ?>" size="10">
            </div>
        </div>
        <div class="control-group">
            <label class="control-label">Data da Receitas:</label> 
            <div class="controls">
                <input type="text" name="data" size="8" value="<?php echo $receita->getData() ?>">
            </div>
        </div>
        <div class="form-actions">
            <button class="btn btn-primary" type="submit" name="bt_enviar">Salvar</button>
            <button class="btn" type="reset">Limpar</button>
        </div>
        <input type="hidden" name="usuario_id" value="<?php echo $receita->getUsuario_id() ?>">
        <input type="hidden" name="id" value="<?php echo $receita->getId() ?>">
        <input type="hidden" name="url" value="receitas/editar">
        <input type="hidden" name="acao" value="editar">
        <input type="hidden" name="tipo_lancamento_id" value="1">
    </form>
</fieldset>