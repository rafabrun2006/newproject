<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of URL
 *
 * @author Bruno
 */

class controleURL {
    
    var $end = 'html';
    
    function __construct() {
        $this->controleUrl(ControleAcesso::getUser()->getUsuario(), @$_REQUEST['url']);
    }

    public function controleUrl($usuario, $url = null) {
        if (isset($usuario)) {
            if (isset($url)) {
                include_once 'visao/' . $url . ".php";
            } else {
                include_once 'visao/despesas/despesas.php';
            }
        } else {
            include_once 'visao/login.php';
        }
    }

    function __criaObjeto($tarefa) {
        
        return $tarefa = new controleURL();
        
    }
}

?>
