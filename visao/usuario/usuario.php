<p id="subtitulo">Meu Perfil</p>
<?php
require_once 'controle/Usuario.php';
$controle = new ControleUsuario();

?>
<form action="index.php" method="post">
    <br>
    Usuario: <input type="text" name="usuario" value="<?php echo $controle->usuarios[0]->usuario ?>">
    <br>
    Senha: <input type="password" name="senha" value="<?php echo $controle->usuarios[0]->senha ?>">
    <br>
    Nova Senha: <input type="password" name="nova_senha" value="<?php echo $controle->usuarios[0]->senha ?>">
    <br>
    <input type="hidden" name="cod" value="<?php echo $controle->usuarios[0]->cod ?>">
    <input type="hidden" name="url" value="usuario/usuario">
    <input type="hidden" name="acao" value="gravar">
    <input type="submit" value="Salvar Altera&ccedil;&otilde;es">
</form>
