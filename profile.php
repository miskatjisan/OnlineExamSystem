<?php
    include "inc/header.php";
    Session::checkSession();
    $userId = Session::get("userId");
    if ($_SERVER['REQUEST_METHOD']== 'POST') {
       $updateUser = $usr->updateUserProfile($userId,$_POST);
    }
?>
    <!--  Section -->
        <div class="top-section my-4">
            <div class="container-fluid">
                <div class="row">
        <!-- Profile section -->
                    <div class="col-md-12">
                        <div class="update-Pro">
                            <?php 
                                if (isset($updateUser)) {
                                    echo $updateUser;
                                }
                            ?>
                                <form action="" method="POST">
                                    <?php 
                                        $getUser = $usr->getUserById($userId);
                                        if ($getUser) {
                                            $result = $getUser->fetch_assoc();
                                        
                                    ?>
                                    <table class="tbl" >
                                        <tr >
                                            <th>NAME</th>
                                            <th>:</th>
                                            <td><input type="text" name="name" id="name" value="<?php echo $result['name']; ?>"></td>
                                        </tr>
                                        <tr>
                                            <th>USERNAME</th>
                                            <th>:</th>
                                            <td><input type="text" name="username" id="username" value="<?php echo $result['username']; ?>"></td>
                                        </tr>
                                        <tr>
                                            <th>EMAIL</th>
                                            <th>:</th>
                                            <td><input type="email" name="email" id="email" value="<?php echo $result['email']; ?>"></td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td><input type="submit" id="upSubmit" name="upSubmit" value="Update"></td>
                                        </tr>  
                                    </table>
                                <?php } ?>
                                </form>           
                    </div>
                    </div>
        <!-- end -->
                </div>
            </div>
        </div>
<?php
    include "inc/footer.php";
?>
