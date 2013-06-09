<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of receitas
 *
 * @author Administrador
 */
require_once 'controle/Conexao.php';
require_once 'modelo/Receitas.php';

class ControleReceitas extends ModeloReceitas {

    public $receitas;

    public function acaoReceitas($acao = null) {
        $this->receitas = new ControleReceitas();

        if (method_exists($this, $acao)) {
            return $this->$acao();
        } else {
            return $this->receitas = $this->listarReceitas();
        }
    }

    public function gravar() {
        if ($_POST) {
            $_REQUEST['data'] = date('Y-m-d', strtotime($_REQUEST['data']));

            if ($_REQUEST) {
                $modelo = new ModeloReceitas();
                if ($modelo->gravarReceitas($_REQUEST)) {
                    ControleMensagem::setMensagem(array('success', 'Dados gravados com sucesso'));
                    header('Location: index.php?url=receitas/receitas');
                }
            } else {
                ControleMensagem::setMensagem(array('danger', 'Houve um problema na gravacao dos dados'));
            }
        }

        return $this->acaoReceitas();
    }

    public function excluir() {
        $this->excluirReceitas('id = ' . $_REQUEST['id']);
        return $this->acaoReceitas();
    }

    public function editar() {

        if ($_POST) {
            $$_REQUEST['data'] = date('Y-m-d', strtotime($_REQUEST['data']));

            if ($_REQUEST) {
                $modelo = new ModeloReceitas();
                if ($modelo->editarReceitas($_REQUEST)) {
                    ControleMensagem::setMensagem(array('success', 'Dados gravados com sucesso'));
                    header('Location: index.php?url=receitas/receitas');
                }
            } else {
                ControleMensagem::setMensagem(array('success', 'N&atilde;o s&atilde;o aceitos campos vazios'));
            }
        }

        return $this->getReceita($_REQUEST['id']);
    }

}