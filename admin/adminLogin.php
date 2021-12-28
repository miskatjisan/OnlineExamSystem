<?php 
    
    $filepath = realpath(dirname(__FILE__));
    include ($filepath.'/inc/loginHeader.php');
    include_once ($filepath.'/../Classes/Admin.php');
    $ad = new Admin();
?>
<?php 
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $adminData = $ad->getAdminData($_POST);
    }

?>
<section class="login clear">
    <h2> Admin Login </h2>

    <form action="" method="post">
       <div>
        <lable> Username </lable>
        <input type="text" name="adminUser"  placeholder="Please Enter Your Username..">
        </div>
         <div>
             <lable> Password </lable>
         <input type="password" name="adminPass"   placeholder="Please Enter Your Password..">
        </div>
        <div>
            <input type="submit" name="login" value="Login">
        </div>
        <div>
        <?php 
            if (isset($adminData)) {
                echo $adminData;
            }
        ?>
        </div>
    </form>
  
</section>
  
</body>

</html>
