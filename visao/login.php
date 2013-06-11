<?php echo ControleMensagem::getMensagem() ?>
<div id="login" align="center">
    Por favor, informe usuario e senha para que possa ter acesso ao sistema.
    <br>
    <br>
    <form class="form form-horizontal" action="index.php" method="post">
        <div class="control-group">
            <label class="control-label"><strong>Usuario:</strong></label> 
            <div class="controls">
                <input onfocus autofocus type="text" name="usuario">
            </div>
        </div>
        <div class="control-group">
            <label class="control-label"><strong>Senha:</strong></label> 
            <div class="control">
                <input type="password" name="senha">
            </div>
        </div>
        <div class="form-actions">
            <button class="btn btn-primary" type="submit" name="bt">Entrar</button>
            <button class="btn" type="reset" name="bt">Limpar</button>
            <input type="hidden" value="acessar" name="acao">
        </div>
    </form>
</div>
