<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Fornecedores
 *
 * author Administrador
 */
require_once '/modelo/Modelo.php';

class ModeloFornecedores extends Modelo {

    private $id;
    private $nome;
    private $descricao;
    private $data_cadastro;
    private $cnpj;
    private $telefone;
    private $email;
    private $endereco;
    private $cidade;
    protected $_table = 'tb_fornecedor';
    protected $_primary = 'id';
    protected $_fields = array('id', 'nome', 'descricao', 'data_cadastro', 'cnpj', 'telefone', 'email', 'endereco', 'cidade');

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getNome() {
        return $this->nome;
    }

    public function setNome($nome) {
        $this->nome = $nome;
    }

    public function getDescricao() {
        return $this->descricao;
    }

    public function setDescricao($descricao) {
        $this->descricao = $descricao;
    }

    public function getData_cadastro() {
        return $this->data_cadastro;
    }

    public function setData_cadastro($data_cadastro) {
        $this->data_cadastro = $data_cadastro;
    }

    public function getCnpj() {
        return $this->cnpj;
    }

    public function setCnpj($cnpj) {
        $this->cnpj = $cnpj;
    }

    public function getTelefone() {
        return $this->telefone;
    }

    public function setTelefone($telefone) {
        $this->telefone = $telefone;
    }

    public function getEmail() {
        return $this->email;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function getEndereco() {
        return $this->endereco;
    }

    public function setEndereco($endereco) {
        $this->endereco = $endereco;
    }

    public function getCidade() {
        return $this->cidade;
    }

    public function setCidade($cidade) {
        $this->cidade = $cidade;
    }

    function listaFornecedores() {
        $query = 'SELECT * FROM tb_fornecedor';
        $result = mysql_query($query);

        $lista = array();

        while ($res = mysql_fetch_array($result)) {
            $forn = new ModeloFornecedores();
            $forn->setNome($res['nome']);
            $forn->setId($res['id']);
            $forn->setCnpj($res['cnpj']);
            $forn->setEmail($res['email']);
            $forn->setData_cadastro($res['data_cadastro']);
            $forn->setDescricao($res['descricao']);
            $forn->setTelefone($res['telefone']);
            $forn->setCidade($res['cidade']);
            $forn->setEndereco($res['endereco']);
            
            $lista[] = $forn;
        }
        return $lista;
    }

    function excluirFornecedores($where) {
        return $this->delete($where);
    }

    function editarFornecedores($array) {
        if ($this->update($array)) {
            return true;
        }
    }

    function gravarFornecedores($array) {
        if ($this->insert($array)) {
            return true;
        }
    }

    public function getFornecedor($id) {
        $query = 'SELECT * FROM tb_fornecedor WHERE id = '.$id;
        
        $result = mysql_query($query);

        $res = mysql_fetch_array($result);
        
        $forn = new ModeloFornecedores();
        $forn->setNome($res['nome']);
        $forn->setId($res['id']);
        $forn->setCnpj($res['cnpj']);
        $forn->setEmail($res['email']);
        $forn->setData_cadastro($res['data_cadastro']);
        $forn->setDescricao($res['descricao']);
        $forn->setTelefone($res['telefone']);
        $forn->setCidade($res['cidade']);
        $forn->setEndereco($res['endereco']);

        return $forn;
    }

}