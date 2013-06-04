<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of receitas
 *
 * @author Bruno
 */
require_once 'controle/Conexao.php';
require_once 'modelo/Receitas.php';

class ControleReceitas extends ModeloReceitas {

    var $receitas;

    function acaoReceitas($acao = null) {
        ControleConexao::conexao();
        $this->receitas = new ControleReceitas();

        if (empty($acao)) {
            $this->receitas = $this->listarReceitas();
            return $this->receitas;
        } else if ($acao == 'gravar') {
            $data = date('Y-m-d', strtotime($_REQUEST['data']));
            $array = array($_REQUEST['nome'], $_REQUEST['valor'], $data);

            if (!empty($array[0]) && (!empty($array[1])) && (!empty($array[2]))) {
                $this->receitas->gravarReceitas($array);
                echo 'Dados gravados com sucesso';
            } else {
                echo 'Houve um problema na gravacao dos dados';
            }

            return $this->acaoReceitas();
        } else if ($acao == 'excluir') {

            for ($i = 0; $i < count($_REQUEST['cod']); $i++) {
                $array[] = $_REQUEST['cod'][$i];
            }

            $this->excluirReceitas($array);

            return $this->acaoReceitas();
        } else if ($acao == 'editar') {
            $data = date('Y-m-d', strtotime($_REQUEST['data']));
            $array = array($_REQUEST['cod'], $_REQUEST['nome'], $_REQUEST['valor'], $data);
            
            if(!empty($array[0])&&(!empty($array[1]))&&(!empty($array[2]))&&(!empty($array[3]))){
                $this->receitas->editarReceitas($array);
                echo "Dados gravados com sucesso";
            }else{
                echo "N&atilde;o s&atilde;o aceitos campos vazios";
            }

            return $this->acaoReceitas();
        } else {
            return $this->acaoReceitas();
        }
    }

}

?>