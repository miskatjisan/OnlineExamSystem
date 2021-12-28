<?php
    include "inc/header.php";
    Session::checkSession();
    $total = $qs->getTotalRow();  
?>

        <!--  Section -->
        <div class="top-section my-4">
            <div class="container-fluid">
                <div class="row">
                    <!-- Exam Test-->
                    <div class="col-md-12">
                        <div class="test">
                        <h3>All Questions & Answers : <?php echo $total; ?></h3>
                                
                                    <table class="tbl" >
                                        <?php 
                                            $getQues = $qs->getQuesByOrder();
                                            if ($getQues) {
                                               while ($ques = $getQues->fetch_assoc()) { 
                                        ?>
                                        <tr>
                                            <td><h4>Ques No-<?php echo $ques['quesNo']; ?>: <?php echo $ques['ques']; ?></h4></td>
                                        </tr>
                                        <?php 
                                            $number = $ques['quesNo'];
                                            $answer = $qs->getAnsById($number);
                                            if ($answer) {
                                                while ($result = $answer->fetch_assoc()) {
                                        ?>
                                        <tr>
                                            <td><input type="radio"><?php 
                                            if($result['rightAns'] == '1'){
                                                echo "<span class='success'>".$result['ans']."</span>";
                                            }  else {
                                                echo "<span class='error'>".$result['ans']."</span>";
                                            }
                                            ?></td>
                                        </tr>
                                        <?php } } ?>
                                        <?php } } ?>
                                     
                                    </table>       
                    </div>
                    </div>
        <!-- end -->
                </div>
            </div>
        </div>
<?php
    include "inc/footer.php";
?>
