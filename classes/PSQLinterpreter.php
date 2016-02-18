<?php

class PSQLinterpreter {

    private $_db;
    private $_result;

    public function __construct() {
        $this->_connect();
    }

    public function __destruct() {
        if ($this->_result) {
            $this->free();
        }
        $this->_disconnect();
    }

    public function execute($query) {
        $this->_result = pg_query($this->_db, $query);
        return $this->_result;
    }

    public function next() {
        return pg_fetch_array($this->_result);
    }

    public function count() {
        return pg_num_rows($this->_result);
    }

    public function free() {
        if ($this->_result) {
            @pg_free_result($this->_result);
        }
    }

    public function escape($string) {
        return pg_escape_string($this->_db, $string);
    }

    private function _connect() {
        global $config;

        $this->_db = pg_connect("host=".$config['sql_host']." dbname=".$config['sql_database']." user=".$config['sql_user']." password=".$config['sql_password']);
        if($this->_db == FALSE) {
            echo "Problem during psql connection";
        }
    }

    private function _disconnect() {
        pg_close($this->_db);
    }

    public function begin_transaction() {
        return pg_query($this->_db, 'BEGIN');
    }

    public function commit() {
        return pg_query($this->_db, 'COMMIT');
    }

    public function rollback() {
        return pg_query($this->_db, 'ROLLBACK');
    }

}
