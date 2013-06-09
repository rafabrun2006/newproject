<?php

/*
 * Classe de controle de despesas
 */

/**
 * Description of receitas
 *
 * @author Bruno
 */
require_once 'controle/Conexao.php';
require_once 'modelo/Despesas.php';
require_once 'controle/Fornecedores.php';

class ControleDespesas extends ModeloDespesas {

    public $despesas;

    public function acaoDespesas($acao = null) {
        ControleConexao::conexao();
        $this->despesas = new ControleDespesas();

        if (method_exists($this, $acao)) {
            return $this->$acao();
        } else {
            $this->despesas = $this->listarDespesa();
            return $this->despesas;
        }
    }

    public static function fornecedores() {
        $fornecedor = new ControleFornecedores();
        return $fornecedor->acaoFornecedor(null);
    }

    public function editar() {

        if ($_POST) {
            $_REQUEST['data_despesa'] = date('Y-m-d', strtotime($_REQUEST['data_despesa']));
            $_REQUEST['data_pagamento'] = date('Y-m-d', strtotime($_REQUEST['data_pagamento']));

            if ($_REQUEST) {
                if ($this->despesas->editarDespesas($_REQUEST)) {

                    ControleMensagem::setMensagem(array('success', 'Dados gravados com sucesso'));
                    header('Location: index.php?url=despesas/despesas');
                }
            } else {
                ControleMensagem::setMensagem(array('danger', 'N&atilde;o s&atilde;o aceitos campos vazios'));
                header('Location: index.php?url=despesas/despesas');
            }
        }

        return $this->getDespesa($_REQUEST['id']);
    }

    public function gravar() {

        if ($_POST) {
            $_REQUEST['data_despesa'] = date('Y-m-d', strtotime($_REQUEST['data_despesa']));
            $_REQUEST['data_pagamento'] = date('Y-m-d', strtotime($_REQUEST['data_pagamento']));

            if ($_REQUEST) {
                if ($this->despesas->gravarDespesa($_REQUEST)) {
                    ControleMensagem::setMensagem(array('success', 'Dados gravados com sucesso'));
                    header('Location: index.php?url=despesas/despesas');
                }
            } else {
                ControleMensagem::setMensagem(array('danger', 'N&atilde;o s&atilde;o aceitos campos vazios'));
                header('Location: index.php?url=despesas/despesas');
            }
        }
    }

    public function excluir() {
        if ($this->excluirDespesa('id = ' . $_REQUEST['id'])) {
            ControleMensagem::setMensagem(array('success', 'Dados apagados com sucesso'));
            header('Location: index.php?url=despesas/despesas');
        }
    }

}