<?php

/**
 * Description of Acesso
 *
 * @author Bruno
 */
require_once 'controle/Conexao.php';
require_once 'modelo/Acesso.php';

class ControleAcesso extends ModeloAcesso {

    public static function getUsuario() {
        $modelo = new ModeloAcesso();
        return $modelo->getSessionUsuario();
    }

    public function acessar() {
        ControleConexao::conexao();

        if (!empty($_REQUEST['usuario']) && !empty($_REQUEST['senha']) && ($_REQUEST['acao'] == 'acessar')) {
            if ($_REQUEST['acao'] == 'acessar') {
                parent::acessar($_REQUEST['usuario'], $_REQUEST['senha']);
            }
        } else if (@$_REQUEST['acao'] == 'sair') {
            parent::sair();
        }
    }

}

?>
