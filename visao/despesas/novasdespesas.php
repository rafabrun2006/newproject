<?php
require_once 'controle/Despesas.php';
$fornecedores = ControleDespesas::fornecedores();
?>
<div id="subtitulo">
    <?php echo isset($_REQUEST['cod']) ? 'Editar Despesa' : 'Incluir Nova Despesa'; ?>
</div>
<div>
    <form class="formulario" action="index.php" method="get">

        Despesa Referente a: <br><input type="text" name="nome" size="50" value="<?php echo isset($_REQUEST['nome']) ? $_REQUEST['nome'] : ''; ?>">
        <br>
        Fornecedor:<br> 
        <select name="fornecedor">
            <option value="0">Selecione</option>    
            <?php
            for ($i = 0; $i < count($fornecedores->fornecedores); $i++) {
                echo "<option value='" . $fornecedores->fornecedores[$i]->cod . "'>" . ControleDespesas::fornecedores()->fornecedores[$i]->nome . "</option>";
            }
            ?>
        </select>
        <br>
        Valor da Despesa: <br><input type="text" name="valor" size="10" value="<?php echo isset($_REQUEST['valor']) ? $_REQUEST['valor'] : ''; ?>">
        <br>
        Data da Despesa: <br><input type="text" name="data" size="8" value="<?php echo isset($_REQUEST['data']) ? $_REQUEST['nome'] : date('d-m-Y'); ?>">
        <p>
            <input type="submit" name="bt_enviar" value="Salvar">
            <input type="reset" value="Limpar Formulario">

            <input type="hidden" name="cod" value="<?php echo $_REQUEST['cod'] ?>">
            <input type="hidden" name="url" value="despesas/despesas">
            <input type="hidden" name="acao" value="<?php echo isset($_REQUEST['cod']) ? 'editar' : 'gravar' ?>">
    </form>
</div>