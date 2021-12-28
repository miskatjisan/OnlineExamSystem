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
                              <h3>Start Test About General Knowladge</h3>
                              <p>This is Multiple Choice Quize.</p> 
                              <ul>
                                  <li><strong>Total Question : </strong><?php echo $total; ?></li>
                                  <li><strong>Total Number : </strong><?php echo $total; ?></li>
                                  <li><strong>Type of Question : </strong>MCQ</li>
                                  <li><strong><a href="test.php?QsNo=<?php echo $question['quesNo']; ?>">Start Test</a></strong></li>
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
