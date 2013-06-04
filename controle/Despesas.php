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

    var $despesas;

    function acaoDespesas($acao = null) {
        ControleConexao::conexao();
        $this->despesas = new ControleDespesas();

        if (empty($acao)) {
            $this->despesas = $this->listarDespesa();
            return $this->despesas;
        } else if ($acao == 'gravar') {

            $array = array('nome'=>$_REQUEST['nome'], 
                           'valor'=>$_REQUEST['valor'], 
                           'data'=>date('Y-m-d', strtotime($_REQUEST['data'])), 
                           'fornecedor'=>$_REQUEST['fornecedor']);

            if (!empty($array['nome']) && (!empty($array['valor'])) && (!empty($array['data']) && (isset($array['fornecedor'])))) {
                echo $this->despesas->gravarDespesa($array) == true ? 'Dados gravados com sucesso' : '';
            } else {
                echo 'Houve um problema na gravacao dos dados';
            }

        } else if ($acao == 'excluir') {

            for ($i = 0; $i < count($_REQUEST['cod']); $i++) {
                $array[] = $_REQUEST['cod'][$i];
            }

            $this->excluirDespesa($array);

        } else if ($acao == 'editar') {
            $data = date('Y-m-d', strtotime($_REQUEST['data']));
            $array = array($_REQUEST['cod'], $_REQUEST['nome'], $_REQUEST['valor'], $data);

            if (!empty($array[0]) && (!empty($array[1])) && (!empty($array[2])) && (!empty($array[3]))) {
                $this->despesas->editarDespesas($array);
                echo "Dados gravados com sucesso";
            } else {
                echo "N&atilde;o s&atilde;o aceitos campos vazios";
            }
        }
        
        return $this->acaoDespesas();
    }
    
    function fornecedores(){
        return $fornecedores = new ControleFornecedores();
    }

}

?>
