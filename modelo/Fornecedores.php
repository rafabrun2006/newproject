<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Fornecedores
 *
 * author Bruno
 */
class ModeloFornecedores {
    
    var $nome;
    var $cod;
    var $descricao;
    var $data_cadastro;
    var $cnpj;
    var $telefone;
    var $email;
    var $uf;
    
    function getNome(){
        return $this->nome;
    }
    function setNome($nome){
        $this->nome = $nome;
    }
    function getCod(){
        return $this->cod;
    }
    function setCod($codigo){
        $this->cod = $codigo;
    }
    function getDescricao(){
        return $this->descricao;
    }
    function setDescricao($descricao){
        $this->descricao = $descricao;
    }
    function getDataCad(){
        return $this->data_cadastro;
    }
    function setDataCad($data_cadastro){
        $this->data_cadastro = date('d/m/Y', strtotime($data_cadastro));
    }
    function getCNPJ(){
        return $this->cnpj;
    }
    function setCNPJ($cnpj){
        $this->cnpj = $cnpj;
    }
    function getTelefone(){
        return $this->telefone;
    }
    function setTelefone($telefone){
        $this->telefone = $telefone;
    }
    function getEmail(){
        return $this->email;
    }
    function setEmail($email){
        $this->email = $email;
    }
    function getUF(){
        return $this->uf;
    }
    function setUF($uf){
        $this->uf = $uf;
    }
    
    function listaFornecedores(){
        $query = "SELECT * FROM fornecedores WHERE cod_user = ".ControleAcesso::getUser()->codigo;
        $result = mysql_query($query);
        
        while($res = mysql_fetch_array($result)){
            $Forn = new ModeloFornecedores();
            $Forn->setNome($res['nome']);
            $Forn->setCod($res['cod']);
            $Forn->setCNPJ($res['cnpj']);
            $Forn->setEmail($res['email']);
            $Forn->setDataCad($res['data_cadastro']);
            $Forn->setDescricao($res['descricao']);
            $Forn->setTelefone($res['telefone']);
            $Forn->setUF($res['uf']);
            $lista[] = $Forn;
        }
        return $lista;
    }
    
    function excluirFornecedores($item){
        $query = "DELETE FROM fornecedores WHERE cod = $item";
        if(mysql_query($query)){
            return true;
        }
    }
    
    function editarFornecedores($array){
        $query = "UPDATE fornecedores SET nome='$array[nome]', descricao='$array[descricao]', data_cadastro='$array[data_cadastro]', cnpj='$array[cnpj]', telefone='$array[telefone]', email='$array[email]', uf='$array[uf]' WHERE cod = '$array[cod]'";
        if(mysql_query($query)){
            return true;
        }
    }
    
    function gravarFornecedores($array){
        echo $query = "INSERT INTO fornecedores (nome, descricao, data_cadastro, cnpj, telefone, email, uf, cod_user) 
        VALUES('$array[nome]', '$array[descricao]', '$array[data_cadastro]', '$array[cnpj]', '$array[telefone]', '$array[email]', '$array[uf]', '".ControleAcesso::getUser()->codigo."')";
        if(mysql_query($query)){
            return true;
        }
    }
    
}

?>
