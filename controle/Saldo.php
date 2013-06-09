<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Saldo
 *
 * @author Administrador
 */
require_once 'controle/Conexao.php';
require_once 'modelo/Saldo.php';

class ControleSaldo extends ModeloSaldo{
    
    function saldo(){
        ControleConexao::conexao();
        return parent::saldo();
    }
}

?>
