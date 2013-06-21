<?php

/**
 * Description of Modelo
 *
 * @author Administrador
 */
require_once '/controle/Conexao.php';

class Modelo extends ControleConexao {

    protected $_table;
    protected $_fields;
    protected $_primary;
    private $sql;

    public function __construct() {
        $this->sql;
    }

    public function insert(array $data) {

        ControleConexao::conexao();

        $fields = array();
        $values = array();

        foreach ($data as $key => $value) {
            if ($value) {
                if (in_array($key, $this->_fields)) {
                    $fields[] = $key;
                    $values[] = "'" . $value . "'";
                }
            }
        }

        $this->sql = 'INSERT INTO ' . $this->_table . ' (' . implode(', ', $fields) . ') 
                  VALUES (' . implode(", ", $values) . ')';
        
        return $result = mysql_query($this->sql);
    }

    public function update(array $data) {

        ControleConexao::conexao();

        $values = array();

        foreach ($data as $key => $value) {
            if (in_array($key, $this->_fields)) {
                $values[] = "{$key} = '{$value}'";
            }
        }

        $this->sql = 'UPDATE ' . $this->_table .
                ' SET ' . implode(', ', $values) .
                ' WHERE ' . $this->_primary . ' = ' . $data[$this->_primary];

        return $result = mysql_query($this->sql);
    }

    public function delete($where) {
        ControleConexao::conexao();

        $this->sql = 'DELETE FROM ' . $this->_table . ' WHERE ' . $where;
        return $result = mysql_query($this->sql);
    }

    public function findAll() {
        $this->sql = 'SELECT * FROM ' . $this->_table;
        $result = mysql_query($this->sql);

        while ($res = mysql_fetch_object($result)) {
            $array[] = $res;
        }

        return $array;
    }

    public function find($id) {
        $this->sql = 'SELECT * FROM ' . $this->_table . ' WHERE ' . $this->_primary . ' = ' . $id;
        $result = mysql_query($this->sql);

        return mysql_fetch_object($result);
    }

    public function montaWhereAnd($data) {
        $values = array();

        foreach ($data as $key => $value) {
            if (in_array($key, $this->_fields)) {
                $values[] = "{$key} = '{$value}'";
            }
        }

        return implode(', ', $values);
    }

}