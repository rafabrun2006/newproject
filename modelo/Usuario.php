<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Usuario
 *
 * @author Administrador
 */
require_once 'modelo/Modelo.php';

class ModeloUsuario extends Modelo {

    private $id;
    private $senha;
    private $nome;
    private $cpf;
    private $email;
    protected $_table = 'tb_usuario';
    protected $_fields = array('id', 'senha', 'nome', 'cpf', 'email');
    protected $_primary = 'id';

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getSenha() {
        return $this->senha;
    }

    public function setSenha($senha) {
        $this->senha = $senha;
    }

    public function getNome() {
        return $this->nome;
    }

    public function setNome($nome) {
        $this->nome = $nome;
    }

    public function getCpf() {
        return $this->cpf;
    }

    public function setCpf($cpf) {
        $this->cpf = $cpf;
    }

    public function getEmail() {
        return $this->email;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    function listarUsuario() {
        $query = 'SELECT * FROM tb_usuario';
        $result = mysql_query($query);

        while ($res = mysql_fetch_array($result)) {
            $usuario = new ModeloUsuario();
            $usuario->setId($res['id']);
            $usuario->setNome($res['nome']);
            $usuario->setSenha($res['senha']);
            $usuario->setCpf($res['cpf']);
            $usuario->setEmail($res['email']);

            $lista[] = $usuario;
        }
        return $lista;
    }

    function gravarUsuario($array) {
        if($this->insert($array)){
            return true;
        }
    }

    public function editarUsuario($array) {
        return $this->update($array);
    }
    
    public function excluirUsuario($where){
        return $this->delete($where);
    }

    public function getUsuario($id) {
        $query = 'SELECT * FROM tb_usuario WHERE id = ' . $id;
        $result = mysql_query($query);

        $res = mysql_fetch_array($result);

        $usuario = new ModeloUsuario();
        $usuario->setId($res['id']);
        $usuario->setNome($res['nome']);
        $usuario->setSenha($res['senha']);
        $usuario->setEmail($res['email']);
        $usuario->setCpf($res['cpf']);

        return $usuario;
    }

}

?>
