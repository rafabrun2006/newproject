<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Fornecedores
 *
 * @author Administrador
 */
require_once 'modelo/Fornecedores.php';

class ControleFornecedores extends ModeloFornecedores {

    public $fornecedores;

    public function acaoFornecedor($acao){
        
        $this->fornecedores = new ModeloFornecedores();

        if (method_exists($this, $acao)) {
            return $this->$acao();
        } else {
            return $this->fornecedores = $this->fornecedores->listaFornecedores();
        }
    }
    
    public function excluir() {
        if ($this->excluirFornecedores('id = ' . $_REQUEST['id'])) {
            ControleMensagem::setMensagem(array('success', 'Dados excluidos com sucesso'));
            header('Location: index.php?url=fornecedores/fornecedores');
        }
    }

    public function gravar() {

        $_REQUEST['data_cadastro'] = date('Y/m/d', strtotime($_REQUEST['data_cadastro']));

        if ($_POST) {
            if ($this->gravarFornecedores($_REQUEST)) {
                ControleMensagem::setMensagem(array('success', 'Dados gravados com sucesso'));
                header('Location: index.php?url=fornecedores/fornecedores');
            }
        }
    }

    public function editar() {

        if ($_POST) {
            $_REQUEST['data_cadastro'] = date('Y/m/d', strtotime($_REQUEST['data_cadastro']));

            if ($this->editarFornecedores($_REQUEST)) {
                ControleMensagem::setMensagem(array('success', 'Dados alterados com sucesso'));
                header('Location: index.php?url=fornecedores/fornecedores');
            }
        }

        return $this->getFornecedor($_REQUEST['id']);
    }

}

?>
