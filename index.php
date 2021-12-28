<?php
    include "inc/header.php";
    Session::checkSession();
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
            
        <!-- Main section -->
                    <div class="col-md-7">
                        <div class="log-reg">
                                <form action="" method="POST">
                                    
                                        <div class="start-h2">
                                            <h2>START NOW</h2>
                                        </div>
                                        <div class="start-btn">
                                           <button class="btn" id="btn" name="btn"><a href="start.php">Start Now...</a></button>
                                        </div>
                                    
                                </form> 
                            
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
        
   
