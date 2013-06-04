<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Receitas
 *
 * author Bruno
 */

class ModeloDespesas {
    
    var $cod;
    var $nome;
    var $data;
    var $fornecedor;
    var $valor;
    
    function getCod(){
        return $this->cod;
    }
    function setCod($cod){
        $this->cod = $cod;
    }
    function getNome(){
        return $this->nome;
    }
    function setNome($nome){
        $this->nome = $nome;
    }
    function getValor(){
        return $this->valor;
    }
    function setValor($valor){
        $this->valor = $valor;
    }
    function getData(){
        return $this->data;
    }
    function setData($data){
        $this->data = date('d/m/Y', strtotime($data));
    }
    function getFornecedor(){
        return $this->fornecedor;
    }
    function setFornecedor($fornecedor){
        $this->fornecedor = $fornecedor;
    }
    
    function listarDespesa(){
        $query = "SELECT * FROM despesas WHERE cod_user = ".ControleAcesso::getUser()->codigo;
        $result = mysql_query($query);
        
        while($res = mysql_fetch_array($result)){
            $receitas = new ModeloDespesas();
            $receitas->setCod($res['cod']);
            $receitas->setNome($res['nome']);
            $receitas->setValor($res['valor']);
            $receitas->setData($res['data']);
            $receitas->setFornecedor(($res['fornecedor']));
            $array[] = $receitas;
        }
        return $array;
    }
    
    function gravarDespesa($array){
        
        $query = "INSERT INTO despesas (nome, valor, data, fornecedor, cod_user) VALUES('$array[nome]', '$array[valor]', '$array[data]', '$array[fornecedor]', '".ControleAcesso::getUser()->codigo."')";
        $result = mysql_query($query);
        
        if($result){
            return true;
        }
    }
    
    function excluirDespesa($array){
        
        for($i=0;$i<count($array);$i++){
            $query = "DELETE FROM despesas WHERE cod=$array[$i]";
            mysql_query($query);
        }
    }
    
    function editarDespesas($array){
        $query = "UPDATE despesas SET nome='$array[1]', valor='$array[2]', data='$array[3]' WHERE cod='$array[0]'";
        $result = mysql_query($query);
    }
}

?>
