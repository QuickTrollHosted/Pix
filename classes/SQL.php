<?php
require_once CLASSES . "MySQLinterpreter.php";
require_once CLASSES . "PSQLinterpreter.php";

class SQL {

    private $_interpreter;
    private $_db_type;

    public function __construct() {
        global $config;

        $this->_db_type = $config['sql_type'];

        switch($this->_db_type){
            case "postgresql":
                $this->_interpreter = new PSQLinterpreter();
                break;

            case "mysql":
            default:
                $this->_interpreter = new MySQLinterpreter();
                break;
        }
    }

    public function __destruct() {
        $this->free();
    }

    public function execute($query) {
        return $this->_interpreter->execute($query);
    }

    public function next() {
        return $this->_interpreter->next();
    }

    public function count() {
        return $this->_interpreter->count();
    }

    public function free() {
        $this->_interpreter->free();
    }

    public function escape($string) {
        return $this->_interpreter->escape($string);
    }

    public function begin_transaction() {
        return $this->_interpreter->begin_transaction();
    }

    public function commit() {
        return $this->_interpreter->commit();
    }

    public function rollback() {
        return $this->_interpreter->rollback();
    }

}
