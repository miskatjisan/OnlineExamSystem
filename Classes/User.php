<?php
    $filepath = realpath(dirname(__FILE__));
    include_once ($filepath.'/../lib/Session.php');
    include_once ($filepath.'/../lib/Database.php');
    include_once ($filepath.'/../helpers/Format.php');

    class User{
        private $db;
        private $fm;
        public function __construct(){
            $this->db = new Database();
            $this->fm = new Format();
        }
        public function userRegister($name,$username,$email,$password){
            $name = $this->fm->validation($name);
            $username = $this->fm->validation($username);
            $password = $this->fm->validation($password);
            $email = $this->fm->validation($email);
            $name = mysqli_real_escape_string($this->db->link, $name);
            $username = mysqli_real_escape_string($this->db->link, $username);
            $email = mysqli_real_escape_string($this->db->link, $email);
            if ($name == "" ||$username == "" ||$email == "" ||$password == "") {
                echo "<span class='error'>Fields Must Not Be Empty !</span>";
                exit(); 
            }elseif (filter_var($email, FILTER_VALIDATE_EMAIL)=== false) {
                echo "<span class='error'>Error..Invalide Email Address !</span>";
                exit(); 
            }else {
                $ckQuery = "SELECT * FROM tbl_user WHERE email = '$email'";
                $ckEmail = $this->db->select($ckQuery);
                if ($ckEmail != false) {
                    echo "<span class='error'>Email Adress Already Exist !</span>";
                    exit(); 
                }else {
                    $password = mysqli_real_escape_string($this->db->link, md5($password));
                    $query = "INSERT INTO tbl_user( name , username , email , password ) VALUES('$name','$username','$email','$password')";
                    $insertData = $this->db->insert($query);
                    if ($insertData) {
                        echo "<span class='success'>Registration Complete Successfully.</span>";
                        exit(); 
                    }else {
                        echo "<span class='error'>Error..Not Registered. Try Later !</span>";
                        exit();
                    }
                }
                
            }
        }
        public function userLogin($email,$password){
            $email = $this->fm->validation($email);
            $password = $this->fm->validation($password);
            $email = mysqli_real_escape_string($this->db->link, $email);
            if ($email == "" ||$password == "") {
                echo "empty";
                exit(); 
            }else{
                $password = mysqli_real_escape_string($this->db->link, md5($password));
                $query = "SELECT * FROM tbl_user WHERE email = '$email' AND password = '$password'";
                $result = $this->db->select($query);
                if ($result != false) {
                    $value = $result->fetch_assoc();
                    if ($value['status']== '1') {
                        echo "disable";
                        exit();
                    }else {
                        Session::init();
                        Session::set("login" , true);
                        Session::set("userId" , $value['userId']);
                        Session::set("name" , $value['name']);
                        Session::set("username" , $value['username']);
                    }
                }else {
                    echo "error";
                    exit();
                }
            }
        }
        public function getUserById($userId){
            $query = "SELECT * FROM tbl_user WHERE userId = '$userId'";
            $result = $this->db->select($query);
            return $result;
        }
        public function updateUserProfile($userId,$data){
            $name = $this->fm->validation($data['name']);
            $username = $this->fm->validation($data['username']);
            $email = $this->fm->validation($data['email']);
            $name = mysqli_real_escape_string($this->db->link, $name);
            $username = mysqli_real_escape_string($this->db->link, $username);
            $email = mysqli_real_escape_string($this->db->link, $email);
            $query = "UPDATE tbl_user
                            SET 
                        name        = '$name',
                        username    = '$username',
                        email       = '$email'
                        WHERE userId = '$userId'";
            $update_row  = $this->db->update($query);
            if ($update_row) {
                $msg = "<span class='success'>User Profile Updated Successfully.</span>";
                return $msg;
            }else {
                $msg = "<span class='error'>User Profile Not Updated !</span>";
                return $msg;
            }
        }
        public function getAllUser(){
            $query = "SELECT * FROM tbl_user ORDER BY userId DESC";
            $result = $this->db->select($query);
            return $result;
        }
        public function disableUser($userId){
            $query = "UPDATE tbl_user
                        SET status = '1'
                        WHERE userId = '$userId'";
            $update_row  = $this->db->update($query);
            if ($update_row) {
                $msg = "<span class='success'>User Disabled!</span>";
                return $msg;
            }else {
                $msg = "<span class='error'>User Not Disabled!</span>";
                return $msg;
            }
        }
        public function enableUser($userId){
            $query = "UPDATE tbl_user
                        SET status = '0'
                        WHERE userId = '$userId'";
            $update_row  = $this->db->update($query);
            if ($update_row) {
                $msg = "<span class='success'>User Enabled!</span>";
                return $msg;
            }else {
                $msg = "<span class='error'>User Not Enabled!</span>";
                return $msg;
            }
        }
        public function removeUser($userId){
            $query = "DELETE FROM tbl_user WHERE userId = '$userId'";
            $delUser = $this->db->delete($query);
            if ($delUser) {
                $msg = "<span class='success'>User Removed!</span>";
                return $msg;
            }else {
                $msg = "<span class='error'>User Not Removed!</span>";
                return $msg;
            }
        }
    }
?>