<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Usuario
 *
 * @author Bruno
 */
require_once 'controle/Conexao.php';
require_once 'modelo/Usuario.php';

class ControleUsuario extends ModeloUsuario {

    var $usuarios;

    function __construct() {
        $this->acaoUsuarios($_REQUEST['acao']);
    }

    function acaoUsuarios($acao = null) {
        ControleConexao::conexao();
        $this->usuarios = new ModeloUsuario();

        if (empty($acao)) {
            return $this->usuarios = $this->usuarios->listarUsuario(ControleAcesso::getUser()->usuario);
        }

        if ($acao == 'gravar') {
            if (isset($_REQUEST['cod']) && $_REQUEST['usuario'] == ControleAcesso::getUser()->usuario or $_REQUEST['senha'] != $_REQUEST['nova_senha'] or isset($_REQUEST['nova_senha'])) {
                $array = array('usuario'=>$_REQUEST['usuario'], 'nova_senha'=>$_REQUEST['nova_senha'], 'cod'=>$_REQUEST['cod'], 'senha'=>$_REQUEST['senha']);
            }
            if($this->usuarios->gravarUsuario($array)==true){
                echo "Seu novo Nome de <b>Usuario: $array[usuario]</b> e sua Senha voc&ecirc; sabe!";
            }else{
                echo "Houve um erro na grava&ccedil;&atilde;o dos dados";
            }
            return $this->acaoUsuarios();
        }
    }

}

?>
