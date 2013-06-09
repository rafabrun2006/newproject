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
            <input type="text" name="nome" value="<?php echo $usuario->getNome() ?>">
        </div>
    </div>
    <div class="control-group">
        <label class="control-label">CPF:</label>
        <div class="controls">
            <input type="text" name="cpf" value="<?php echo $usuario->getCpf() ?>">
        </div>
    </div>
    <div class="control-group">
        <label class="control-label">Email:</label>
        <div class="controls">
            <input type="text" name="email" value="<?php echo $usuario->getEmail() ?>">
        </div>
    </div>
    <div class="control-group">
        <label class="control-label">Senha:</label>
        <div class="controls">
            <input type="password" name="senha" value="<?php echo $usuario->getSenha() ?>">
        </div>
    </div>
    <div class="control-group">
        <label class="control-label">Nova Senha:</label>
        <div class="controls">
            <input type="password" name="nova_senha" value="<?php echo $usuario->getSenha() ?>">
        </div>
    </div>
    <div class="form-actions">
        <input type="hidden" name="id" value="<?php echo $usuario->getId() ?>">
        <input type="hidden" name="url" value="usuarios/editar">
        <input type="hidden" name="acao" value="editar">
        
        <button class="btn btn-primary" type="submit">Gravar</button>
        <a class="btn btn" href="index.php">Cancelar</a>
    </div>
</form>
