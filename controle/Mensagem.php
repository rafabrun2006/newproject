<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Mensagem
 *
 * @author Administrador
 */
class ControleMensagem {

    public static function setMensagem(array $mensagem) {
        $_SESSION['mensagem'] = $mensagem;
    }

    public static function getMensagem() {
        if (@$_SESSION['mensagem']) {
            
            $html = "<div class='alert alert-{$_SESSION['mensagem'][0]}'>{$_SESSION['mensagem'][1]}</div>";
            
            unset($_SESSION['mensagem']);
            
            return $html;
        }
    }

}

?>
