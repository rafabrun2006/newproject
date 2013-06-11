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
            <input type="text" id="cpf" name="cpf">
        </div>
    </div>
    <div class="control-group">
        <label class="control-label">Email:</label>
        <div class="controls">
            <input type="email" name="email">
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
    <div class="control-group">
        <label class="control-label">Tipo de Usuário:</label>
        <div class="controls">
            <select name="tipo_usuario">
                <option value="1">Administrador</option>
                <option value="2">Funcionário</option>
            </select>
        </div>
    </div>
    <div class="form-actions">
        <input type="hidden" name="url" value="usuarios/editar">
        <input type="hidden" name="acao" value="gravar">
        
        <button class="btn btn-primary" type="submit">Gravar</button>
        <a class="btn btn" href="index.php">Cancelar</a>
    </div>
</form>
