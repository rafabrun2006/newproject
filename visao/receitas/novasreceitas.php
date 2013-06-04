<div id="subtitulo">
    <?php echo isset($_REQUEST['cod']) ? 'Editar Receita':'Incluir Nova Receita'; ?>
</div>
<div>
    <form class="formulario" action="index.php" method="get">
        
        Receitas Referente a: <input type="text" name="nome" size="50" value="<?php echo isset($_REQUEST['nome']) ? $_REQUEST['nome']:''; ?>">
        <br>
        Valor da Receitas: <input type="text" name="valor" size="10" value="<?php echo isset($_REQUEST['valor']) ? $_REQUEST['valor']:''; ?>">
        <br>
        Data da Receitas: <input type="text" name="data" size="8" value="<?php echo isset($_REQUEST['data']) ? $_REQUEST['nome']:date('d-m-Y'); ?>">
        <br>
        <br>
        <input type="submit" name="bt_enviar" value="Salvar">
        <input type="reset" value="Limpar Formulario">
        
        <input type="hidden" name="cod" value="<?php echo $_REQUEST['cod'] ?>">
        <input type="hidden" name="url" value="receitas/receitas">
        <input type="hidden" name="acao" value="<?php echo isset($_REQUEST['cod']) ? 'editar':'gravar' ?>">
    </form>
</div>