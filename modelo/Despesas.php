<?php

/**
 * Description of Receitas
 *
 * author Administrador
 */
require_once '/modelo/Modelo.php';

class ModeloDespesas extends Modelo {

    private $id;
    private $fornecedor_id;
    private $usuario_id;
    private $tipo_lancamento_id;
    private $descricao;
    private $valor;
    private $data_despesa;
    private $data_pagamento;
    protected $_fields = array('id', 'fornecedor_id', 'usuario_id', 'tipo_lancamento_id', 'descricao', 'valor', 'data_despesa', 'data_pagamento');
    protected $_primary = 'id';
    protected $_table = 'tb_despesa';

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getFornecedor_id() {
        return $this->fornecedor_id;
    }

    public function setFornecedor_id($fornecedor_id) {
        $this->fornecedor_id = $fornecedor_id;
    }

    public function getUsuario_id() {
        return $this->usuario_id;
    }

    public function setUsuario_id($usuario_id) {
        $this->usuario_id = $usuario_id;
    }

    public function getTipo_lancamento_id() {
        return $this->tipo_lancamento_id;
    }

    public function setTipo_lancamento_id($tipo_lancamento_id) {
        $this->tipo_lancamento_id = $tipo_lancamento_id;
    }

    public function getDescricao() {
        return $this->descricao;
    }

    public function setDescricao($descricao) {
        $this->descricao = $descricao;
    }

    public function getValor() {
        return $this->valor;
    }

    public function setValor($valor) {
        $this->valor = $valor;
    }

    public function getData_despesa() {
        return $this->data_despesa ? date('d/m/Y', strtotime($this->data_despesa)) : '';
    }

    public function setData_despesa($data_despesa) {
        $this->data_despesa = $data_despesa;
    }

    public function getData_pagamento() {
        return $this->data_pagamento ? date('d/m/Y', strtotime($this->data_pagamento)) : '';
    }

    public function setData_pagamento($data_pagamento) {
        $this->data_pagamento = $data_pagamento;
    }

    public function listarDespesa() {
        $query = 'SELECT * FROM tb_despesa';
        $result = mysql_query($query);

        $array = array();

        while ($res = mysql_fetch_array($result)) {
            $receitas = new ModeloDespesas();
            $receitas->setId($res['id']);
            $receitas->setDescricao($res['descricao']);
            $receitas->setValor($res['valor']);
            $receitas->setData_despesa($res['data_despesa']);
            $receitas->setFornecedor_id(($res['fornecedor_id']));
            $array[] = $receitas;
        }
        return $array;
    }

    public function gravarDespesa($array) {
        if ($this->insert($array)) {
            return true;
        }
    }

    public function excluirDespesa($where) {
        if ($this->delete($where)) {
            return true;
        }
    }

    public function editarDespesas($array) {
        if ($this->update($array)) {
            return true;
        }
    }

    public function getDespesa($id) {
        $query = 'SELECT * FROM tb_despesa WHERE id = ' . $id;
        $result = mysql_query($query);

        $res = mysql_fetch_array($result);
        $receitas = new ModeloDespesas();
        
        $receitas->setId($res['id']);
        $receitas->setDescricao($res['descricao']);
        $receitas->setValor($res['valor']);
        $receitas->setData_despesa($res['data_despesa']);
        $receitas->setData_pagamento($res['data_pagamento']);
        $receitas->setFornecedor_id($res['fornecedor_id']);
        $receitas->setTipo_lancamento_id($res['tipo_lancamento_id']);

        return $receitas;
    }

}