<?php
    include('connexion.php');
    class User {
        private $f_name;
        private $l_name;
        private $username;
        private $password;
        private $date_naiss;
        private $gender;
        private $role;
        private $conn ;
        public function __construct(){
            $this->conn = new Connexion();
        }
        public function User($f_name , $l_name ,$date_naiss , $gender, $username , $password  ){
            $this->f_name = $f_name;
            $this->l_name = $l_name;
            $this->username = $username;
            $this->password = $password;
            $this->date_naiss = $date_naiss;
            $this->gender = $gender;
            $this->role = 'USER';
        }
        public function valide($email, $Password){
            $sql = "SELECT * FROM user WHERE username='$email' AND password='$Password' limit 1 ";
            $req = $this->conn->getPDO()->query($sql);
            $user = $req->fetch();
            if ($user) {
                return true;
            } else {
                return false;
            }
        }
        public function get_role($email, $Password){
            $sql = "SELECT role FROM user WHERE username='$email' AND password='$Password' limit 1 ";
            $req = $this->conn->getPDO()->query($sql);
            $role = $req->fetch();
            return $role[0] ;
        }
        public function get_email($email) {
            $sql = "SELECT username FROM user WHERE username = ? LIMIT 1";
            $stmt = $this->conn->getPDO()->prepare($sql);
            $stmt->bindValue(1, $email);
            $stmt->execute();
            return  $stmt->fetch(PDO::FETCH_ASSOC);
        
        }
        public function flush_user($NewUser){
            $insert = "INSERT INTO user (first_name, last_name, date_naissance, gender, username, password,role) VALUES (?, ?, ?, ?, ?, ?, ?)";
            $stmt = $this->conn->getPDO()->prepare($insert);
            
            $stmt->bindValue(1, $NewUser->f_name);
            $stmt->bindValue(2, $NewUser->l_name);
            $stmt->bindValue(3, $NewUser->date_naiss);
            $stmt->bindValue(4, $NewUser->gender);
            $stmt->bindValue(5, $NewUser->username);
            $stmt->bindValue(6, $NewUser->password);
            $stmt->bindValue(7, $NewUser->role);
            
            $result = $stmt->execute();
            
            if ($result) {
                return true;
            } else {
                return false;
            }
        }
        
    }

?>