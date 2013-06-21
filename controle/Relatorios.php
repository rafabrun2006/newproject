<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Relatorios
 *
 * @author Administrador
 */
require_once '/modelo/Modelo.php';

class ControleRelatorios extends Modelo {

    public function relatorioDespesa($dtInicio, $dtFim) {
        $this->_table = 'vw_despesa_fornecedor';

        if ($dtFim and $dtInicio) {

            $this->conexao();

            $array = array();
            $where = null;

            $dtInicio = $dtInicio ? date('Y-m-d', strtotime($dtInicio)) : null;
            $dtFim = $dtFim ? date('Y-m-d', strtotime($dtFim)) : null;

            $where .= $dtInicio ? "'{$dtInicio}'" : '';
            $where .= $dtFim ? ' AND ' . "'{$dtFim}'" : '';

            $sql = 'SELECT * FROM vw_despesa_fornecedor 
                     WHERE data_despesa BETWEEN ' . $where;
            $result = mysql_query($sql);

            while ($res = mysql_fetch_object($result)) {
                $array[] = $res;
            }

            return $array;
        }else{
            ControleMensagem::setMensagem(array('danger', 'É necessario uma data inicial e uma data final'));
            header('Location: index.php?url=relatorios/despesas');
        }
    }

}
