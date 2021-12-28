<?php 
    $filepath = realpath(dirname(__FILE__));
    include_once ($filepath.'/Classes/User.php');
    $usr = new User();
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $email      = $_POST['email'];
        $password   = $_POST['password'];
        $usrLog     = $usr->userLogin($email,$password);
        
    }
?>