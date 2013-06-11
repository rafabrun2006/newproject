<?php

/**
 * Description of Acesso
 *
 * author Administrador
 */
class ModeloAcesso {

    public $id;
    public $nome;
    public $email;
    public $senha;
    public $cpf;
    public $tipo_usuario;

    public function getSession($sessionId) {
        return @$_SESSION['auth'][$sessionId];
    }

    public function setSession($sessionId, $sessionValue) {
        $_SESSION['auth'][$sessionId] = $sessionValue;
    }

    public function getSessionUsuario() {
        $acesso = new ModeloAcesso();
        $acesso->id = $acesso->getSession('id');
        $acesso->nome = $acesso->getSession('nome');
        $acesso->email = $acesso->getSession('email');
        $acesso->senha = $acesso->getSession('senha');
        $acesso->cpf = $acesso->getSession('cpf');
        $acesso->tipo_usuario = $acesso->getSession('tipo_usuario');

        return $acesso;
    }

    public function acessar($usuario, $senha) {


        $query = "SELECT * FROM tb_usuario WHERE nome = '" . $usuario . "' and senha= '" . $senha . "'";
        $result = mysql_query($query);

        $res = mysql_fetch_object($result);

        if ($res) {
            $acesso = new ModeloAcesso();
            $acesso->setSession('nome', $res->nome);
            $acesso->setSession('id', $res->id);
            $acesso->setSession('email', $res->email);
            $acesso->setSession('senha', $res->senha);
            $acesso->setSession('cpf', $res->cpf);
            $acesso->setSession('tipo_usuario', $res->tipo_usuario);
        } else {
            ControleMensagem::setMensagem(array('danger', 'Usuário ou senha inválido'));
        }
    }

    public function cadastro($usuario, $senha) {
        $query = "INSERT INTO usuarios (nome_usuario, senha) VALUES ('$usuario', '$senha')";
        if ($result = mysql_query($query) == true) {
            return true;
        } else {
            return false;
        }
    }

    public function sair() {
        session_destroy();
        $_SESSION['id'] = null;
    }

}