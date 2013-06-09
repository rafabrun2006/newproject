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
    
    public function relatorioDespesa(){
        $this->_table = 'vw_despesa_fornecedor';
        
        return $this->findAll();
    }
    
}
