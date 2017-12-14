<?php

class Database
{
    private $_servername = "37.59.112.16";
    private $_username = "school";
    private $_password = "SK83sh29Ls";
    private $_database = "krashosting";
    private $_conn;

    public function __construct()
    {
        $this->_conn = @new mysqli($this->_servername, $this->_username, $this->_password, $this->_database);
        if ($this->_conn->connect_error) {
            printf("Connect Error: " . $this->_conn->connect_error);
            die();
        }
    }

    public function query($query)
    {
        $result = $this->_conn->query($query);
        if (!$result) {
            printf("Error: " . $this->_conn->error);
            die();
        }

        return $result;
    }

    public function escape($variable)
    {
        return mysqli_real_escape_string($this->_conn, $variable);
    }
}