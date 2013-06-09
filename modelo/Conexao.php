<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Conexao
 *
 * author Administrador
 */
require_once 'config.php';

class ModeloConexao {
    
    function conexao(){
        $config = new config();
        
        $conexao = mysql_connect($config->servidor, $config->nomeusuario, $config->senhausuario);
        if($conexao){
            
            //echo "conectado";
        }else{
            return "Houve um erro no sistema";
        }
        $db = mysql_select_db($config->banco, $conexao);
        
        return $conexao;
    }
}

?>
