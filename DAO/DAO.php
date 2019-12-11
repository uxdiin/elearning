<?php
    class DAO 
    {
        protected $conn;

        function __construct() {
            require_once 'DB_Connect.php';
            $db = new Db_Connect();
            $this->conn = $db->connect();
        }   
    }
    
?>