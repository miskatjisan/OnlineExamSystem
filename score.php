<?php
    include "inc/header.php";
    Session::checkSession();
    $question = $qs->getQuestion();
    $total = $qs->getTotalRow();
    
?>
    <!--  Section -->
        <div class="top-section my-4">
            <div class="container-fluid">
                <div class="row">
        <!-- Start Test section -->
                    <div class="col-md-12">
                        <div class="update-Pro">
                              <h3>You are Done</h3>
                              <ul>
                              <p class="success">Congratulation ! You Have Just Complete The Test.</p> 
                              <strong>Final Marks : <?php 
                                if (isset($_SESSION['score'])) {
                                    echo $_SESSION['score'];
                                    unset($_SESSION['score']);
                               }
                                ?>
                              </strong>
                              <li><strong><a href="viewAns.php">View Ans</a></strong></li>
                              <li><strong><a href="start.php">Start Again</a></strong></li>
                              </ul>
                    </div>
                    </div>
        <!-- end -->
                </div>
            </div>
        </div>
<?php
    include "inc/footer.php";
?>
