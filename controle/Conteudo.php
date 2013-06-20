<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of URL
 *
 * @author Administrador
 */

class ControleConteudo {
    
    public function conteudo() {
        
        $url = @$_REQUEST['url'];

        if (isset(ControleAcesso::getUsuario()->id)) {
            if (isset($url)) {
                include_once 'visao/' . $url . ".php";
            } else {
                include_once 'visao/inicio.php';
            }
        } else {
            include_once 'visao/login.php';
        }
    }

}
