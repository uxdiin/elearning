<?php
    require_once 'DAO.php';
    class DAO_Soal extends DAO
    {
        protected $conn;
        function __construct()
        {
            parent::__construct();   
        }
        function insert($nama){
            $stmt = $this->conn->prepare("INSERT INTO problems(nama) VALUES(?)");
            $stmt->bind_param('s',$nama);
            $result = $stmt->execute();
            $stmt->close();
    
            if ($result) {
                $stmt = $this->conn->prepare("SELECT * FROM problems WHERE nama = ?");
                $stmt->bind_param('s',$nama);
                $stmt->execute();
                $soal = $stmt->get_result()->fetch_assoc();
                $stmt->close();
    
                return $soal;
            } else {
                return false;
            }
        }
    }
    
?>