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
require_once '/modelo/Modelo.php';

class ModeloReceitas extends Modelo {

    private $id;
    private $descricao;
    private $data;
    private $valor;
    private $tipo_id_lancamento;
    private $usuario_id;
    protected $_fields = array('id', 'descricao', 'data', 'valor', 'tipo_lancamento_id', 'usuario_id');
    protected $_table = 'tb_receita';
    protected $_primary = 'id';

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getDescricao() {
        return $this->descricao;
    }

    public function setDescricao($descricao) {
        $this->descricao = $descricao;
    }

    public function getData() {
        return $this->data;
    }

    public function setData($data) {
        $this->data = $data;
    }

    public function getValor() {
        return $this->valor;
    }

    public function setValor($valor) {
        $this->valor = $valor;
    }

    public function getTipo_id_lancamento() {
        return $this->tipo_id_lancamento;
    }

    public function setTipo_id_lancamento($tipo_id_lancamento) {
        $this->tipo_id_lancamento = $tipo_id_lancamento;
    }

    public function getUsuario_id() {
        return $this->usuario_id;
    }

    public function setUsuario_id($usuario_id) {
        $this->usuario_id = $usuario_id;
    }

    public function listarReceitas() {

        $query = "SELECT * FROM tb_receita WHERE usuario_id = " . ControleAcesso::getUsuario()->id;
        $result = mysql_query($query);

        $array = array();

        while ($res = mysql_fetch_array($result)) {
            $receitas = new ModeloReceitas();
            $receitas->setId($res['id']);
            $receitas->setDescricao($res['descricao']);
            $receitas->setValor($res['valor']);
            $receitas->setData($res['data']);
            $array[] = $receitas;
        }
        return $array;
    }

    public function gravarReceitas($array) {
        ControleConexao::conexao();

        if ($this->insert($array)) {
            return true;
        }
    }

    public function excluirReceitas($where) {
        return $this->delete($where);
    }

    public function editarReceitas($array) {
        return $this->update($array);
    }

    public function getReceita($idReceita) {
        $query = "SELECT * FROM tb_receita WHERE id = " . $idReceita;
        $result = mysql_query($query);

        $res = mysql_fetch_array($result);

        $this->setId($res['id']);
        $this->setDescricao($res['descricao']);
        $this->setValor($res['valor']);
        $this->setData($res['data']);
        $this->setUsuario_id($res['usuario_id']);

        return $this;
    }

}