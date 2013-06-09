<?php

echo isset(ControleAcesso::getUsuario()->id) ?
        "Seja bem vindo: <b>" .
        ControleAcesso::getUsuario()->nome .
        " - <a href='index.php?url=usuarios/editar&acao=editar&id=" . ControleAcesso::getUsuario()->id . "'>
            Meu Perfil</a> - <a href='index.php?acao=sair'>Sair</b></a>" : '';
?>
