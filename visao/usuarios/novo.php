<?php
require_once 'controle/Usuario.php';
$controle = new ControleUsuario();
$usuario = $controle->acaoUsuarios(@$_REQUEST['acao']);
?>
<form class="form-horizontal" action="index.php" method="post">
    <fieldset>
        <legend>Editar Usuário</legend>
    </fieldset>
    <div class="control-group">
        <label class="control-label">Nome:</label>
        <div class="controls">
            <input type="text" name="nome">
        </div>
    </div>
    <div class="control-group">
        <label class="control-label">CPF:</label>
        <div class="controls">
            <input type="text" name="cpf">
        </div>
    </div>
    <div class="control-group">
        <label class="control-label">Email:</label>
        <div class="controls">
            <input type="text" name="email">
        </div>
    </div>
    <div class="control-group">
        <label class="control-label">Senha:</label>
        <div class="controls">
            <input type="password" name="senha">
        </div>
    </div>
    <div class="control-group">
        <label class="control-label">Repetir Senha:</label>
        <div class="controls">
            <input type="password" name="nova_senha">
        </div>
    </div>
    <div class="form-actions">
        <input type="hidden" name="url" value="usuarios/editar">
        <input type="hidden" name="acao" value="gravar">
        
        <button class="btn btn-primary" type="submit">Gravar</button>
        <a class="btn btn" href="index.php">Cancelar</a>
    </div>
</form>
