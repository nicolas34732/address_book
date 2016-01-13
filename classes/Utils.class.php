<?php

class Utils {

    var $connection = NULL;
    var $connectionSqlServer = NULL;
    var $hasError;
    var $error;
    var $session_name;

    function openConnection() {
        if ($this->connection == NULL) {
            require(DIR_FS_CONFIG . "inc/config.php");
            $this->session_name = SESSION_NAME;
            
            $connection = ADONewConnection($db_management_system);
            if ($connection->PConnect($db_host, $db_user, $db_password, $db_name)) {
                $connection->debug = $debug;
                $this->connection = $connection;
                return true;
            } else {
            	$this->setErrorMsg("DataBase connection error.");
                return false;
            }
            
        } else if (is_a($this->connection, '__PHP_Incomplete_Class')) {
            require(DIR_FS_CONFIG . "inc/config.php");
            $this->session_name = SESSION_NAME;
            $connection = ADONewConnection($db_management_system);
            
            if ($connection->PConnect($db_host, $db_user, $db_password, $db_name)) {
                $connection->debug = $debug;
                $this->connection = $connection;
                return true;
            } else {
                $this->setErrorMsg("DataBase connection error.");
                return false;
            }
        } else {
            return true;
        }
    }

    function closeConnection() {
        $this->connection->Close();
    }

    function setErrorMsg($msg) {
        $this->hasError = true;
        $this->error = $msg;
    }

    function getErrorMsg() {
        if ($this->hasError) {
            $this->hasError = false;
            return $this->error;
        }
    }

}

?>