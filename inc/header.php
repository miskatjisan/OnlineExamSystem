<?php 
    $filepath = realpath(dirname(__FILE__));
    include_once ($filepath.'/../lib/Session.php');
    Session::init();
    include_once ($filepath.'/../lib/Database.php');
    include_once ($filepath.'/../helpers/Format.php'); 
    spl_autoload_register(function($class){
        include_once "Classes/".$class.".php";
    });
    $pr = new Process();  
    $db = new Database();
    $fm = new Format();
    $usr = new User();
    $qs = new Question();
  
   
    
?>
 <?php 
      if (isset($_GET['action']) && $_GET['action']=='logout') {
        Session::destroy();
        header("Location:Login.php");
        exit();
      }
    ?>


<?php
  //set headers to NOT cache a page
  header("Cache-Control: no-cache, must-revalidate"); //HTTP 1.1
  header("Pragma: no-cache"); //HTTP 1.0
  header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); 
  // Date in the past
  //or, if you DO want a file to cache, use:
  header("Cache-Control: max-age=2592000"); 
//30days (60sec * 60min * 24hours * 30days)
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Document</title>

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="asset/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">
    <link rel="stylesheet" href="asset/css/style.css">
    <script src="js/jquery.js"></script>
    <script src="js/main.js"></script>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
   <!-- <script src="asset/js/jquery-3.2.1.slim.min.js" type="text/javascript"></script>
    <script src="asset/js/popper.min.js" type="text/javascript"></script>
    <script src="asset/js/bootstrap.min.js" type="text/javascript"></script> -->
</head>

<body>
    <div class="container">
        <!-- navbar-1 -->
        <nav class="navbar navbar-1 navbar-expand-lg navbar-light bg-light">
            <div>
            <a class="navbar-brand" href="index.php">
                <img class="logo" src="asset/image/logo.png" alt="logo" />
            </a>
            <?php
                $login = Session::get("login");
                if($login == true){
            ?>
           <span>
            <h5 class="user">USER : <a href="profile.php"><?php echo Session::get('name'); ?></a><h5>
            </span>
                <?php } ?>
            <span>
                <h2 class="title-logo">ONLINE EXAM SYSTEM</h2>
                <P class="slogan">onlineeducation.com</P>
            </span>
               
        </div>
         

          
        </nav>
        <!--  navbar-2 -->
        <nav class="navbar navbar-2 navbar-expand-lg navbar-light bg-dark">
            <div class="container">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                        <?php
                        $login = Session::get("login");
                        if($login == true){
                        ?>
                        <li class="nav-item active">
                            <a class="nav-link" href="index.php">Home</a>
                        </li>
                    </ul>
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="profile.php">PROFILE</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="?action=logout">LOGOUT</a>
                        </li>
                        <?php }else{?>
                        <li class="nav-item">
                            <a class="nav-link" href="login.php">LOGIN</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="register.php">REGISTER</a>
                        </li>
                        <?php } ?>
                       
                    </ul>
                </div>
            </div>
        </nav>
        <!--  Navbar-3 -->
        <nav class="navbar navbar-3 navbar-expand-lg navbar-light bg-light">
        <div>
           <h2>WELCOME TO ONLINE EXAM SYSTEM</h2>
        </div>  
        </nav>
