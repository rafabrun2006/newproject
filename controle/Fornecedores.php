<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Fornecedores
 *
 * @author Bruno
 */
require_once 'modelo/Fornecedores.php';

class ControleFornecedores extends ModeloFornecedores {
    
    var $fornecedores;
    
    function __construct() {
        $this->acaoForn($_REQUEST['acao']);
    }
    
    function acaoForn($acao = null){
        $this->fornecedores = new ModeloFornecedores();
        
        if(empty($acao)){
            return $this->fornecedores = $this->fornecedores->listaFornecedores();
        }
        if($acao == 'excluir'){
            for($i=0;$i<count($_REQUEST['check']);$i++){
                $array = array($_REQUEST['check']);
            }
            
            if($this->excluirFornecedores($_REQUEST['cod'])==true){
                echo "Fornecedor de codigo $_REQUEST[cod] excluido com sucesso!";
            }
            return $this->acaoForn();
        }
        if($acao == 'editar'){
                $array = array('cod'=>$_REQUEST['cod'], 
                           'nome'=>$_REQUEST['nome'], 
                           'descricao'=>$_REQUEST['descricao'],
                           'data_cadastro'=>date('Y/m/d', strtotime($_REQUEST['data_cadastro'])),
                           'cnpj'=>$_REQUEST['cnpj'],
                           'telefone'=>$_REQUEST['telefone'],
                           'email'=>$_REQUEST['email'],
                           'uf'=>$_REQUEST['uf']);
                
                if($this->editarFornecedores($array)==true){
                    echo "Dados alterados com sucesso!";
                }
                return $this->acaoForn();
            //nome, descricao, data_cadastro, cnpj, telefone, email, uf
        }
        
        if($acao == 'gravar'){
            $array = array('cod'=>$_REQUEST['cod'], 
                           'nome'=>$_REQUEST['nome'], 
                           'descricao'=>$_REQUEST['descricao'],
                           'data_cadastro'=>date('Y/m/d', strtotime($_REQUEST['data_cadastro'])),
                           'cnpj'=>$_REQUEST['cnpj'],
                           'telefone'=>$_REQUEST['telefone'],
                           'email'=>$_REQUEST['email'],
                           'uf'=>$_REQUEST['uf']);
            if($this->gravarFornecedores($array)==true){
                echo "Fornecedor cadastrado com sucesso!";
            }
            return $this->acaoForn();
        }
        
    }
}

?>
