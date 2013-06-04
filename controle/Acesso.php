<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Acesso
 *
 * @author Bruno
 */
require_once 'controle/Conexao.php';
require_once 'modelo/Acesso.php';

class ControleAcesso extends ModeloAcesso {

    var $usuario;
    var $codigo;

    function getUsuario() {
        return parent::getUsuario();
    }
    function getCodigo(){
        return parent::getCodigo();
    }
    function setCodigo($codigo) {
        $this->codigo = $codigo;
    }
    function setUsuario($usuario) {
        $this->usuario = $usuario;
    }

    function getUser() {
        $acesso = new ControleAcesso();
        $acesso->setUsuario(parent::getUsuario());
        $acesso->setCodigo(parent::getCodigo());
        return $acesso;
    }

    function acessar() {
            ControleConexao::conexao();
            
            if (!empty($_REQUEST['usuario']) && !empty($_REQUEST['senha']) && ($_REQUEST['acao'] == 'acessar')) {
                if($_REQUEST['bt']=='Entrar'){
                    parent::acessar($_REQUEST['usuario'], $_REQUEST['senha']);
                }
                if($_REQUEST['bt']=='Registrar'){
                    if(parent::cadastro($_REQUEST['usuario'], $_REQUEST['senha'])==true){
                        echo "Usuario registrado com sucesso, agora e so utiliza-lo para acessar o sistema.";
                    }else{
                        echo "Este usuario ja se encontra cadastrado, utilize outro usuario";
                    }
                }
            } else if (@$_REQUEST['acao'] == 'sair') {
                parent::sair();
            }
        }
    }

?>
