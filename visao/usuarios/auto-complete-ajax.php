<?php
require_once 'controle/Usuario.php';
$controle = new ControleUsuario();
echo $controle->acaoUsuarios(@$_REQUEST['acao']);

?>