<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Receitas
 *
 * @author Bruno
 */

class ModeloReceitas {
    
    var $cod;
    var $nome;
    var $data;
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
    function getData(){
        return $this->data;
    }
    function setData($data){
        $this->data = date('d/m/Y', strtotime($data));
    }
    function getValor(){
        return $this->valor;
    }
    function setValor($valor){
        $this->valor = "$valor,00";
    }
    
    function listarReceitas(){
        
        $query = "SELECT * FROM receitas WHERE cod_user = ".ControleAcesso::getUser()->codigo;
        $result = mysql_query($query);
        
        while($res = mysql_fetch_array($result)){
            $receitas = new ModeloReceitas();
            $receitas->setCod($res['cod']);
            $receitas->setNome($res['nome']);
            $receitas->setValor($res['valor']);
            $receitas->setData($res['data']);
            $array[] = $receitas;
        }
        return $array;
    }
    
    function gravarReceitas($array){
        
        $query = "INSERT INTO receitas (nome, valor, data, cod_user) VALUES('$array[0]', '$array[1]', '$array[2]', '".ControleAcesso::getUser()->codigo."')";
        $result = mysql_query($query);
        
        if($result){
            return true;
        }
    }
    
    function excluirReceitas($array){
        
        for($i=0;$i<count($array);$i++){
            $query = "DELETE FROM receitas WHERE cod=$array[$i]";
            mysql_query($query);
        }
    }
    
    function editarReceitas($array){
        $query = "UPDATE receitas SET nome='$array[1]', valor='$array[2]', data='$array[3]' WHERE cod='$array[0]'";
        $result = mysql_query($query);
    }
}

?>