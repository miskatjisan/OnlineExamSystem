<?php
    include "inc/header.php";
    Session::checkSession();
    if (isset($_GET['QsNo'])) {
        $number = (int)$_GET['QsNo'];
    }else {
        header("Location:index.php");
    }
    $total = $qs->getTotalRow();
    $ques = $qs->getQuestionByid($number);
?>
<?php 
    if ($_SERVER['REQUEST_METHOD']== 'POST') {
    $process = $pr->getProcess($_POST);
    }
?>
        <!--  Section -->
        <div class="top-section my-4">
            <div class="container-fluid">
                <div class="row">
                    <!-- Exam Test-->
                    <div class="col-md-12">
                        <div class="test">
                        <h3><?php echo $number; ?> Of <?php echo $total; ?></h3>
                                <form action="" method="POST">
                                    <table class="tbl" >
                                        <tr>
                                            <td><h4>Ques No-<?php echo $ques['quesNo']; ?>: <?php echo $ques['ques']; ?></h4></td>
                                        </tr>
                                        <?php 
                                            $answer = $qs->getAnsById($number);
                                            if ($answer) {
                                                while ($result = $answer->fetch_assoc()) {
                                        ?>
                                        <tr>
                                            <td><input type="radio" name="ans" value="<?php echo $result['ansId']; ?>"><?php echo $result['ans']; ?></td>
                                        </tr>
                                        <?php } } ?>
                                        <tr>
                                            <td>
                                               <input type="submit" name="submit" value="Next Question">
                                               <input type="hidden" name="number" value="<?php echo $number ;?>">
                                            </td>
                                        </tr>
                                    </table>
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
