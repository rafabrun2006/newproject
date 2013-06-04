<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Usuario
 *
 * @author Bruno
 */
require_once 'modelo/Acesso.php';

class ModeloUsuario extends ModeloAcesso {
    
    var $cod;
    var $usuario;
    var $senha;
    
    function getCod(){
        return $this->cod;
    }
    function setCod($cod){
        $this->cod = $cod;
    }
    function getUsuario(){
        return $this->usuario;
    }
    function setUsuario($usuario){
        $this->usuario = $usuario;
    }
    function getSenha(){
        return $this->senha;
    }
    function setSenha($senha){
        $this->senha = $senha;
    }
    
    function listarUsuario($usuario){
        $query = "SELECT * FROM usuarios WHERE nome_usuario='$usuario'";
        $result = mysql_query($query);
        
        while($res = mysql_fetch_array($result)){
            $usuario = new ModeloUsuario();
            $usuario->setCod($res['cod']);
            $usuario->setUsuario($res['nome_usuario']);
            $usuario->setSenha($res['senha']);
            $lista[] = $usuario;
        }
        return $lista;
    }
    
    function gravarUsuario($array){
        $query = "UPDATE usuarios SET nome_usuario='$array[usuario]', senha='$array[nova_senha]' WHERE cod='$array[cod]'";
        if(mysql_query($query)){
            $this->acessar($array[usuario], $array[nova_senha]);
            return true;
        }
    }
    
}

?>
