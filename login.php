<?php
    include "inc/header.php";
    Session::checkLogin();
?>
        <!--  Section -->
        <div class="top-section my-4">
            <div class="container-fluid">
                <div class="row">
        <!-- slider Section -->
                    <div class="col-md-5">
                        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img src="asset/image/online exam 1.jpg" class="d-block w-100" alt="online exam 1">
                                </div>
                                <div class="carousel-item">
                                    <img src="asset/image/online exam 2.webp" class="d-block w-100" alt="online exam 2">
                                </div>
                                <div class="carousel-item">
                                    <img src="asset/image/online exam 3.jpg" class="d-block w-100" alt="online exam 3">
                                </div>
                                <div class="carousel-item">
                                    <img src="asset/image/online exam 4.jpg" class="d-block w-100" alt="online exam 4">
                                </div>
                                <div class="carousel-item">
                                    <img src="asset/image/online exam 5.jpg" class="d-block w-100" alt="online exam 5">
                                </div>
                                <div class="carousel-item">
                                    <img src="asset/image/online exam 6.jpg" class="d-block w-100" alt="online exam 6">
                                </div>
                            </div>
                            <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
                    </div>
        <!-- register/login section -->
                    <div class="col-md-7">
                        <div class="log-reg">
                                <form action="" method="POST">
                                    <table class="tbl" >
                                        <tr>
                                            <th>EMAIL</th>
                                            <th>:</th>
                                            <td><input type="email" name="email" id="email" placeholder="Enter Your Email.."></td>
                                        </tr>
                                        <tr>
                                            <th>PASSWORD</th>
                                            <th>:</th>
                                            <td><input type="password" name="password" id="password" placeholder="Enter Your Password.."></td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td><input type="submit" id="logsubmit" name="logsubmit" value="Log In"></td>
                                        </tr>  
                                    </table>
                                </form> 
                                <div class="alrt">
                                    <p>
                                        New User ? <a href="register.php">Sign Up</a> Free .
                                   </p>
                                   <span class="empty" style="display:none">Fields Must Not Be Empty !</span>
                                   <span class="disable" style="display:none">User Id Disable ! Please Go To The <a href="helpline.php">Helpline</a>.</span>
                                   <span class="error" style="display:none">Email And Password Not Match !</span>
                           </div>
                    </div>
                    </div>
        <!-- end -->
                </div>
            </div>
        </div>     
<?php
    include "inc/footer.php";
?>
