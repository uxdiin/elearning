<?php
    require_once 'DAO.php';
    class DB_Functions extends DAO
    {
        protected $conn;
 
        function __construct() {
            parent::__construct();
        }
        public function simpanUser($username,$password,$nama,$role) {
            
            $stmt = $this->conn->prepare("INSERT INTO users(username,password,nama,role) VALUES(?, ?, ?, ?)");
            $stmt->bind_param('ssss',$username, $password, $nama, $role);
            $result = $stmt->execute();
            $stmt->close();
    
            // cek jika sudah sukses
            if ($result) {
                $stmt = $this->conn->prepare("SELECT * FROM users WHERE username = ?");
                $stmt->bind_param('s',$username);
                $stmt->execute();
                $user = $stmt->get_result()->fetch_assoc();
                $stmt->close();
    
                return $user;
            } else {
                return false;
            }
        }
 
        public function getUserByUsernameAndPassword($username, $password) {
 
            $stmt = $this->conn->prepare("SELECT * FROM users WHERE username = ?");
    
            $stmt->bind_param('s',$username);
    
            if ($stmt->execute()) {
                $user = $stmt->get_result()->fetch_assoc();
                $stmt->close();
    
                if ($password == $user['password']) {
                    // autentikasi user berhasil
                    return $user;
                }
            } else {
                return NULL;
            }
        }
 
        public function isUserExisted($username) {
            $stmt = $this->conn->prepare("SELECT username from users WHERE username = ?");
    
            $stmt->bind_param('s',$username);
    
            $stmt->execute();
    
            $stmt->store_result();
    
            if ($stmt->num_rows > 0) {
                $stmt->close();
                return true;
            } else {
                $stmt->close();
                return false;
            }
        }
    }   
    
    
?>