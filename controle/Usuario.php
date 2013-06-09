<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Usuario
 *
 * @author Administrador
 */
require_once 'controle/Conexao.php';
require_once 'modelo/Usuario.php';

class ControleUsuario extends ModeloUsuario {

    var $usuarios;

    function acaoUsuarios($acao = null) {
        ControleConexao::conexao();
        $this->usuarios = new ModeloUsuario();

        if (method_exists($this, $acao)) {
            return $this->$acao();
        } else {
            return $this->usuarios = $this->usuarios->listarUsuario();
        }
    }

    public function gravar() {

        if ($_POST) {
            if ($this->usuarios->gravarUsuario($_REQUEST)) {
                ControleMensagem::setMensagem(array('success', 'Dados cadastrados com sucesso'));
                header('Location: index.php?url=usuarios/usuarios');
            } else {
                ControleMensagem::setMensagem(array('danger', 'Houve um erro na grava&ccedil;&atilde;o dos dados'));
                header('Location: index.php?url=usuarios/novo');
            }
        }
    }

    public function editar() {

        if ($_POST) {
            if ($this->editarUsuario($_REQUEST)) {
                ControleMensagem::setMensagem(array('success', 'Dados alterados com sucesso'));
                header('Location: index.php?url=usuarios/usuarios');
            }
        }

        return $this->getUsuario($_REQUEST['id']);
    }

    public function excluir() {
        if ($this->excluirUsuario('id = ' . $_REQUEST['id'])) {
            ControleMensagem::setMensagem(array('success', 'Dado excluido com sucesso'));
            header('Location: index.php?url=usuarios/usuarios');
        }
    }

}

?>
