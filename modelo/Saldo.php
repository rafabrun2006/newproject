<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Saldo
 *
 * @author Bruno
 */
class ModeloSaldo {

    var $saldo;
    var $despesa;
    var $receita;

    function getDespesa() {
        return $this->despesa;
    }

    function setDespesa($despesa) {
        $this->despesa = $despesa;
    }

    function getReceita() {
        return $this->receita;
    }

    function setReceita($receita) {
        $this->receita = $receita;
    }

    function getSaldo() {
        return $this->saldo;
    }

    function setSaldo($saldo) {
        $this->saldo = $saldo;
    }

    function saldo() {
        $saldo = new ModeloSaldo();

        $query1 = "SELECT SUM(valor) FROM tb_receita WHERE usuario_id = " . ControleAcesso::getUsuario()->id;
        $result1 = mysql_query($query1);

        if ($result1) {
            while ($res1 = mysql_fetch_array($result1)) {
                $saldo->setReceita($res1['SUM(valor)']);
            }
        }

        $query2 = "SELECT SUM(valor) FROM tb_despesa WHERE usuario_id = " . ControleAcesso::getUsuario()->id;
        $result2 = mysql_query($query2);

        if ($result2) {
            while ($res2 = mysql_fetch_array($result2)) {
                $saldo->setDespesa($res2['SUM(valor)']);
            }
        }

        $total = ($saldo->getReceita() - $saldo->getDespesa());
        $saldo->setSaldo($total);
        return $saldo;
    }

}

?>
