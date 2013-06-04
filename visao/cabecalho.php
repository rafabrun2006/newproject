<?php

echo isset(ControleAcesso::getUser()->usuario) ?
        "Seja bem vindo: <b>" .
        ControleAcesso::getUser()->usuario .
        " - <a href='index.php?url=usuario/usuario'>Meu Perfil</a> - <a href='index.php?acao=sair'>Sair</b></a>" : '';
?>
